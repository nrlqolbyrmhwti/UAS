<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use \App\Models\PeminjamanModel;

class Peminjaman extends BaseController
{
    protected $pm;
    private $menu;
    public function __construct()
    {
        $this->pm = new PeminjamanModel();

        $this->menu = [
            'beranda' => [
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif'=>'',
            ],
            'anggota' => [
                'title' => 'Anggota',
                'link' => base_url() . '/anggota',
                'icon' => 'fa-solid fa-person',
                'aktif'=>'',
            ],
            'peminjaman' => [
                'title' => 'Peminjaman',
                'link' => base_url() . '/peminjaman',
                'icon' => 'fa-solid fa-book',
                'aktif'=>'active',
            ],
        ];    
    }

    public function index()
    {
        

        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Peminjaman</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href ="' . base_url() . '">Peminjaman</a></li>
                            <li class="breadcrumb-item active">Peminjaman</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumn'] = $breadcrumb;
        $data['title_card'] = "Data Peminjaman";

        $query = $this->pm->find();
        $data['Data_Peminjaman'] = $query;
        return view('Peminjaman/content', $data);
    }

    function tambah()
    { 
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Peminjaman</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href ="' . base_url() . '">Peminjaman</a></li>
                            <li class="breadcrumb-item">< a href="' . base_url() . '">Peminjaman</a></li>
                            <li class="breadcrumb-item active">Tambah Peminjaman</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah Peminjaman';
        $data['action'] = base_url() . '/peminjaman/simpan';
        return view('peminjaman/input', $data);
    }

    public function simpan()
    {
        $dt = $this->request->getPost();
        dd($dt);
    }
}
