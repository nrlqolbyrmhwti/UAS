<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        $menu = [
            'beranda' => [
                'title' => 'Beranda',
                'link' => base_url(),
                'icon' => 'fa-solid fa-house',
                'aktif'=>'active',
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
                'aktif'=>'',
            ],
        ];

        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Beranda</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item active">Beranda</li>
                            </ol>
                        </div>';
        $data['menu'] = $menu;
        $data['breadcrumn'] = $breadcrumb;
        $data['title_card'] = "Welcome to Perpustakaan";
        $data['Selamat_datang'] = "Selamat Datang di Aplikasi Perpustakaan";
        return view('template/content', $data);
    }
    
}
