<?php

namespace App\Models;

use CodeIgniter\Model;

class MemberModel extends Model
{
    protected $table = 'member';
    protected $primaryKey = 'id_member';
    protected $useTimestamps = true;
    protected $allowedFields = ['nama', 'nama_lengkap', 'alamat', 'jenis_kelamin', 'email', 'username', 'no_hp', 'pict'];


    public function getMember($nama_lengkap = false)
    {
        if ($nama_lengkap == false) {
            return $this->findAll();
        }

        return $this->where(['nama_lengkap' => $nama_lengkap])->first();
    }
}
