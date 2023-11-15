<?php

namespace App\Controllers;

use App\Models\BukuModel;

class Pages extends BaseController
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

        return view('layout/home', $data);
    }
}