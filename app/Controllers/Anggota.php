<?php

namespace App\Controllers;

use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    protected $AnggotaModel;
    public function __construct()
    {
        $this->AnggotaModel = new AnggotaModel();
    }
    
    public function index()
    {
        $data = [
            'title' => 'Daftar Anggota',
            'anggota' => $this->AnggotaModel->getAnggota()
        ];
        // dd($data);

        return view('anggota/index', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form Tambah Data Anggota',
            'validation' => \Config\Services::validation()
        ];

        return view('anggota/tambah', $data);
    }

    public function simpan()
    {
        // dd($this->request->getFile('sampul'));
        //validasi
        if(!$this->validate(
            [
                'nama' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} judul harus diisi'
                    ]
                ]
            ]
        )) {
            // $validation = \Config\Services::validation();
            // dd($validation);
            // return redirect()->to('/buku/tambah')->withInput()->with('validation', $validation);
            return redirect()->to('/anggota/tambah')->withInput();
        }

        //simpan
        $this->AnggotaModel->save([
            'nama' =>$this->request->getPost('nama'),
            'telp' =>$this->request->getPost('telp'),
            'alamat' =>$this->request->getPost('alamat')
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
        return redirect()->to('/anggota');
    }

    public function ubah($idanggota)
    {
        $data = [
            'title' => 'Form Ubah Data Anggota',
            'validation' => \Config\Services::validation(),
            'anggota' => $this->AnggotaModel->getAnggota($idanggota)
        ];

        return view('anggota/ubah', $data);
    }

    public function update($idanggota)
    {
        // dd();
        //validasi
        // if(!$this->validate(
        //     [
        //         'judul' => [
        //             'rules' => 'required',
        //             'errors' => [
        //                 'required' => '{field} judul harus diisi'
        //             ]
        //         ],
        //         'sampul' => [
        //             'rules' => 'uploaded[sampul]|max_size[sampul,10000]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
        //             'errors' => [
        //                 'uploaded' => 'gambar wajib dipilih',
        //                 'max_size' => 'ukuran gambar terlalu besar',
        //                 'is_image' => 'file wajib gambar',
        //                 'mime_in' => 'tipe file gambar tidak sesuai'
        //             ]
        //         ] 
        //     ]
        // )) {
        //     // $validation = \Config\Services::validation();
        //     // dd($validation);
        //     // return redirect()->to('/buku/tambah')->withInput()->with('validation', $validation);
        //     return redirect()->to('/buku/ubah')->withInput();
        // }

        //simpan
        $this->AnggotaModel->save([
            'id_anggota' => $idanggota,
            'nama' =>$this->request->getPost('nama'),
            'telp' =>$this->request->getPost('telp'),
            'alamat' =>$this->request->getPost('alamat'),
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return redirect()->to('/anggota');
    }

    public function hapus($idanggota)
    {
        $this->AnggotaModel->delete($idanggota);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/anggota');
    }
}