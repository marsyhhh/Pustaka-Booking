<?php 

namespace App\Controllers;

use App\Models\BukuModel;

class Buku extends BaseController
{
    protected $BukuModel;
    public function __construct()
    {
        $this->BukuModel = new BukuModel();
    }

    public function index()
    {
        $data = [
            'title' => 'Daftar Buku',
            'buku' => $this->BukuModel->getBuku()
        ];

        return view('buku/index', $data);
    }

    public function detail($idbuku)
    {
        $data = [
            'title' => 'Daftar Buku',
            'buku' => $this->BukuModel->getBuku($idbuku)
        ];

        return view('buku/detail', $data);
    }

    public function tambah()
    {
        $data = [
            'title' => 'Form Tambah Data Buku',
            'validation' => \Config\Services::validation()
        ];

        return view('buku/tambah', $data);
    }

    public function simpan()
    {
        // dd($this->request->getFile('sampul'));
        //validasi
        if(!$this->validate(
            [
                'judul' => [
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} judul harus diisi'
                    ]
                ],
                'sampul' => [
                    'rules' => 'uploaded[sampul]|max_size[sampul,10000]|is_image[sampul]|mime_in[sampul,image/jpg,image/jpeg,image/png]',
                    'errors' => [
                        'uploaded' => 'gambar wajib dipilih',
                        'max_size' => 'ukuran gambar terlalu besar',
                        'is_image' => 'file wajib gambar',
                        'mime_in' => 'tipe file gambar tidak sesuai'
                    ]
                ] 
            ]
        )) {
            // $validation = \Config\Services::validation();
            // dd($validation);
            // return redirect()->to('/buku/tambah')->withInput()->with('validation', $validation);
            return redirect()->to('/buku/tambah')->withInput();
        }

        //simpan
        $file = $this->request->getFile('sampul');
        $newName = $file->getRandomName();
        $file->move('img/', $newName);
        
        $this->BukuModel->save([
            'judul' =>$this->request->getPost('judul'),
            'pengarang' =>$this->request->getPost('pengarang'),
            'penerbit' =>$this->request->getPost('penerbit'),
            'tahun_terbit' =>$this->request->getPost('tahun'),
            'sampul' =>$newName,
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Ditambahkan.');
        return redirect()->to('/buku');
    }

    public function hapus($idbuku)
    {
        $this->BukuModel->delete($idbuku);

        session()->setFlashdata('pesan', 'Data Berhasil Dihapus');
        return redirect()->to('/buku');
    }

    public function ubah($idbuku)
    {
        $data = [
            'title' => 'Form Ubah Data Buku',
            'validation' => \Config\Services::validation(),
            'buku' => $this->BukuModel->getBuku($idbuku)
        ];

        return view('buku/ubah', $data);
    }

    public function update($idbuku)
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
        $filesampul = $this->request->getFile('sampul');
        //cek gambar kondisi sampul lama
        if ($filesampul->getError() == 4) {
            $nmsampul = $this->request->getVar('sampulLama');
        } else {
            $nmsampul = $filesampul->getname();
            $filesampul->move('img', $nmsampul);
        }
        
        $this->BukuModel->save([
            'id_buku' => $idbuku,
            'judul' =>$this->request->getPost('judul'),
            'pengarang' =>$this->request->getPost('pengarang'),
            'penerbit' =>$this->request->getPost('penerbit'),
            'tahun_terbit' =>$this->request->getPost('tahun'),
            'sampul' =>$nmsampul
        ]);

        session()->setFlashdata('pesan', 'Data Berhasil Diubah.');
        return redirect()->to('/buku');
    }
}