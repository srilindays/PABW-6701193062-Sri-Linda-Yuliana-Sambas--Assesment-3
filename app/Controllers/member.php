<?php

namespace App\Controllers;

use App\Models\MemberModel;
use CodeIgniter\HTTP\Request;
use CodeIgniter\Throttle\ThrottlerInterface;

class member extends BaseController
{
    protected $memberModel;


    public function __construct()
    {
        $this->memberModel = new MemberModel();
    }

    public function index()
    {
        //$member = $this->memberModel->findAll();

        $data = [
            'title' => 'Data Member',
            'member' => $this->memberModel->getMember()
        ];

        //$memberModel = new \App\Models\MemberModel();

        return view('member/index', $data);
    }



    public function detail($nama_lengkap)
    {
        $data = [
            'title' => 'Detail Member',
            'member' => $this->memberModel->getMember($nama_lengkap)
        ];

        //jika tidak ada
        if (empty($data['member'])) {
            throw new \Codeigniter\Exceptions\PageNotFoundException('Data Member' . $nama_lengkap . 'Tidak Ditemukan');
        }

        return view('member/detail', $data);
    }

    public function create()
    {
        $data = [
            'title' => 'Form Tambah Data Member',
            'validation' => \Config\Services::validation()
        ];
        return view('Member/create', $data);
    }

    public function save()
    {

        //validasi input
        if (!$this->validate([
            'nama' => [
                'rules' => 'required|is_unique[member.nama]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} yang anda masukan sudah terdaftar'
                ]
            ],

            //buat validasi
            //'pict' => [
            //     'rules' => 'uploaded[pict]|mas_size[pict,1024]|is_image[pict]|mime_in[pict,image/jpg,image/jpeg.image/png]',
            //     'errors' => [
            //         'uploaded' => 'Pilih gambar terlebih dahulu',
            //         'max_size' => 'Ukeran gambar terlalu besar',
            //         'is_image' => 'Yang anda pilih bukan gambar',
            //         'mime_in' => 'Yang anda pilih bukan gambar'
            //     ]
            // ]
        ])) {
            // $valdation = \Config\Services::validation();
            // return redirect()->to('/Member/create')->withInput()->with('validation', $valdation);
            return redirect()->to('/Member/create')->withInput();
        }

        // ambil gambar
        $filePict = $this->request->getFile('pict');
        // apakah tidak ada gambar yang diupload
        if ($filePict->getError() == 4) {
            $namaPict = 'user.jpg';
        } else {
            // generate nama gambar random
            $namaPict = $filePict->getRandomName();
            // pindah file ke folder img
            $filePict->move('img', $namaPict);
        }


        $nama_lengkap = url_title($this->request->getVar('nama'), '', true);

        $this->memberModel->save([
            'nama' => $this->request->getVar('nama'),
            'nama_lengkap' => $nama_lengkap,
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'no_hp' => $this->request->getVar('no_hp'),
            'pict' => $namaPict
        ]);

        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');


        return redirect()->to('/member');
    }

    public function delete($id)
    {
        // cari gambar berdasarkan id
        $member = $this->memberModel->find($id);

        // cek jika gambarnya default
        if ($member['pict'] != 'user.jpg') {

            // hapus gambar
            unlink('img/' . $member['pict']);
        }




        $this->memberModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/member');
    }

    public function edit($nama_lengkap)
    {
        $data = [
            'title' => 'Form Ubah Data Member',
            'validation' => \Config\Services::validation(),
            'member' => $this->memberModel->getMember($nama_lengkap)
        ];
        return view('Member/edit', $data);
    }

    public function update($id_member)
    {
        //cek nama
        $namalama = $this->memberModel->getMember($this->request->getVar('nama_lengkap'));
        if ($namalama['nama'] == $this->request->getVar('nama')) {
            $rule_nama = 'required';
        } else {
            $rule_nama = 'required|is_unique[member.nama]';
        }

        if (!$this->validate([
            'nama' => [
                'rules' => $rule_nama,
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'is_unique' => '{field} yang anda masukan sudah terdaftar'
                ]
            ]
        ])) {
            // $valdation = \Config\Services::validation();
            return redirect()->to('/Member/edit/' . $this->request->getVar('nama_lengkap'))->withInput();
        }


        $filePict = $this->request->getFile('pict');

        // cek gambar, apakah tetap gambar lama
        if ($filePict->getError() == 4) {
            $namaPict = $this->request->getVar('pictLama');
        } else {
            // generate nama file ramdom
            $namaPict = $filePict->getRandomName();
            // pindahkan gambar
            $filePict->move('img', $namaPict);
            // hapus file
            unlink('img/' . $this->request->getVar('pictLama'));
        }

        $nama_lengkap = url_title($this->request->getVar('nama'), '', true);

        $this->memberModel->save([
            'id_member' => $id_member,
            'nama' => $this->request->getVar('nama'),
            'nama_lengkap' => $nama_lengkap,
            'jenis_kelamin' => $this->request->getVar('jenis_kelamin'),
            'alamat' => $this->request->getVar('alamat'),
            'email' => $this->request->getVar('email'),
            'username' => $this->request->getVar('username'),
            'no_hp' => $this->request->getVar('no_hp'),
            'pict' => $namaPict
        ]);

        session()->setFlashdata('pesan', 'Data berhasil diubah');


        return redirect()->to('/member');
    }
}
