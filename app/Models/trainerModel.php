<?php

namespace App\Models;

use CodeIgniter\Model;

class trainerModel extends Model
{
    protected $table = 'trainer';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'alamat', 'jenis_kelamin'];

    public function search($keyword)
    {
        // $builder = $this->table('trainer');
        // $builder->like('nama', 'keywoard');
        // return $builder;

        return $this->table('trainer')->like('nama', $keyword);
    }
}
