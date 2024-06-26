<?php

namespace App\Models;

use CodeIgniter\Model;

class M_buku extends Model
{
    protected $table = 'tb_buku';
    protected $useTimestamps = true;
    protected $allowedFields = ['judul', 'slug', 'penulis', 'penerbit', 'sampul'];

    public function getBuku($slug = false)
    {
        if ($slug == false) {
            return $this->findAll();
        }
        return $this->where(['slug' => $slug])->first();
    }
}
