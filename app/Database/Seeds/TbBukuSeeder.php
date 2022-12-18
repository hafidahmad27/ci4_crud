<?php

namespace App\Database\Seeds;

use CodeIgniter\Database\Seeder;
use CodeIgniter\I18n\Time;

class TbBukuSeeder extends Seeder
{
    public function run()
    {
        $data = [
            [
                'judul'      => 'Analisa dan Perancangan Sistem',
                'slug'       => 'analisa-dan-perancangan-sistem',
                'penulis'    => 'Eva Mei Sutrisno',
                'penerbit'   => 'INFORMATIKA',
                'sampul'     => 'analisa-perancangan-sistem.jpg',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'judul'      => 'Desain dan Pemrograman Website',
                'slug'       => 'desain-dan-pemrograman-website',
                'penulis'    => 'Dr. Deni Darmawan',
                'penerbit'   => 'ROSDA',
                'sampul'     => 'dpw.jpg',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'judul'      => 'Komputer dan Masyarakat',
                'slug'       => 'komputer-dan-masyarakat',
                'penulis'    => 'Prof. Dr. Munir, M.IT.',
                'penerbit'   => 'Alfabeta',
                'sampul'     => 'komdanmas.jpg',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'judul'      => 'Menulis Karya Ilmiah',
                'slug'       => 'menulis-karya-ilmiah',
                'penulis'    => 'Prof. Dr. Marsudi',
                'penerbit'   => 'INFORMATIKA',
                'sampul'     => 'kti.jpg',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'judul'      => 'Metode Penelitian Bisnis',
                'slug'       => 'metode-penelitian-bisnis',
                'penulis'    => 'Prof. Dr. Sugiyono',
                'penerbit'   => 'Alfabeta',
                'sampul'     => 'metopen.jpg',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'judul'      => 'Belajar Otodidak MySQL',
                'slug'       => 'belajar-otodidak-mysql',
                'penulis'    => 'Dodi Trianto',
                'penerbit'   => 'INFORMATIKA',
                'sampul'     => 'mysql.jpg',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'judul'      => 'Pemrograman Mobile',
                'slug'       => 'pemrograman-mobile',
                'penulis'    => 'Khairul Ummi, M.Kom',
                'penerbit'   => 'The Future Technology',
                'sampul'     => 'pw.jpg',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'judul'      => 'Rekayasa Perangkat Lunak',
                'slug'       => 'rekayasa-perangkat-lunak',
                'penulis'    => 'Rosa AS & M. Shalahudin',
                'penerbit'   => 'INFORMATIKA',
                'sampul'     => 'rpl.jpg',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'judul'      => 'Otomatisasi Pengujian Perangkat Lunak',
                'slug'       => 'otomatisasi-pengujian-perangkat-lunak',
                'penulis'    => 'Lamhot JM Siagian',
                'penerbit'   => 'Andi Offset',
                'sampul'     => 'testing-auto.jpg',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
            [
                'judul'      => 'Analisis Perancangan Sistem Berorientasi Objek dengan UML',
                'slug'       => 'analisis-perancangan-sistem-berorientasi-objek-dengan-uml',
                'penulis'    => 'Ir. Munawar, MMSI, M.Com, PhD',
                'penerbit'   => 'INFORMATIKA',
                'sampul'     => 'uml-munawar.png',
                'created_at' => Time::now(),
                'updated_at' => Time::now()
            ],
        ];

        // Using Query Builder
        // $this->db->table('tb_buku')->insert($data);
        $this->db->table('tb_buku')->insertBatch($data);
    }
}
