<?php

namespace App\Controllers;

use App\Models\M_buku;

class Buku extends BaseController
{
    protected $M_buku;

    public function __construct()
    {
        $this->M_buku = new M_buku();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Buku',
            'buku' => $this->M_buku->getBuku()
        ];
        return view('buku/index', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Buku',
            'validation' => \Config\Services::validation()
        ];
        return view('buku/create', $data);
    }

    public function save()
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[tb_buku.judul]',
                'errors' => [
                    'required' => '{field} buku wajib di-isi !',
                    'is_unique' => '{field} buku yang anda inputkan sudah ada, mohon inputkan judul buku lainnya'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to(base_url() . '/buku/create')->withInput();
        }
        // ambil gambar
        $fileSampul = $this->request->getFile('sampul');

        // apakah tidak ada gambar yang di-upload
        if ($fileSampul->getError() == 4) {
            $namaSampul = 'default-gambar.png';
        } else {
            // generate nama file sampul random
            $namaSampul = $fileSampul->getRandomName();

            // pindahkan gambar ke folder img
            $fileSampul->move('img', $namaSampul);
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->M_buku->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to(base_url() . '/buku');
    }

    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Buku',
            'buku' => $this->M_buku->getBuku($slug)
        ];

        if (empty($data['buku'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Judul buku" . $slug . "tidak ditemukan.");
        }
        return view('buku/detail', $data);
    }

    public function edit($slug)
    {
        $data = [
            'title' => 'Form Ubah Buku',
            'validation' => \Config\Services::validation(),
            'buku' => $this->M_buku->getBuku($slug)
        ];
        return view('buku/edit', $data);
    }

    public function update($id)
    {
        if (!$this->validate([
            'judul' => [
                'rules' => 'required|is_unique[tb_buku.judul,id,' . $id . ']',
                'errors' => [
                    'required' => '{field} buku wajib di-isi !',
                    'is_unique' => '{field} buku yang anda inputkan sudah ada, mohon inputkan judul buku lainnya'
                ]
            ],
            'sampul' => [
                'rules' => 'max_size[sampul,1024]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                'errors' => [
                    'max_size' => 'Ukuran gambar terlalu besar',
                    'is_image' => 'Yang anda pilih bukan gambar',
                    'mime_in' => 'Yang anda pilih bukan gambar'
                ]
            ]
        ])) {
            return redirect()->to(base_url() . '/buku/edit/' . $this->request->getVar('slug'))->withInput();
        }
        // ambil gambar
        $fileSampul = $this->request->getFile('sampul');

        // cek apakah tetap gambar lama ?
        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('sampulLama');
        } else {
            // generate nama file sampul random
            $namaSampul = $fileSampul->getRandomName();

            // pindahkan gambar ke folder img
            $fileSampul->move('img', $namaSampul);

            // hapus file yang lama
            if ($this->request->getVar('sampulLama') != 'default-gambar.png') {
                unlink('img/' . $this->request->getVar('sampulLama'));
            }
        }

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->M_buku->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'Data berhasil di-ubah');
        return redirect()->to(base_url() . '/buku');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $buku = $this->M_buku->find($id);

        // cek jika file gambarnya default-gambar.png
        if ($buku['sampul'] != 'default-gambar.png') {
            unlink('img/' . $buku['sampul']);
        }

        $this->M_buku->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil di-hapus !');
        return redirect()->to(base_url() . '/buku');
    }
}
