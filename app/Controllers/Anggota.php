<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AnggotaModel;

class Anggota extends BaseController
{
    protected $am;
    private $menu;
    private $rules;
    public function __construct()
    {
        $this->am = new AnggotaModel();

        $this->menu =[
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
                'aktif'=>'active',
            ],
            'peminjaman' => [
                'title' => 'Peminjaman',
                'link' => base_url() . '/peminjaman',
                'icon' => 'fa-solid fa-book',
                'aktif'=>'',
            ],
        ];

        $this->rules = [
            'id_anggota' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Id anggota tidak boleh kosong',
                ]
            ],
            'nama' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Nama tidak boleh kosong',
                ]
            ],
            'prodi' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Prodi tidak boleh kosong',
                ]
            ],
            'fakulltas' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Fakultas tidak boleh kosong',
                ]
            ],
            'password' => [
                'rules' => 'required',
                'errors' => [
                    'required' => 'Password tidak boleh kosong',
                ]
            ],
        ];
    }

    public function index()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Anggota</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href ="' . base_url() . '">Beranda</a></li>
                            <li class="breadcrumb-item active">Anggota</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumn'] = $breadcrumb;
        $data['title_card'] = "Data Anggota";

        $query = $this->am->find();
        $data ['data_anggota'] = $query;
        return view('anggota/content', $data);
    }

    public function tambah()
    {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Anggota</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href ="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="' . base_url() . '/anggota">Anggota</a></li>
                                <li class="breadcrumb-item active">Tambah Anggota</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Tambah Anggota';
        $data['action'] = base_url() . '/anggota/simpan';
        return view('anggota/input', $data);
    }

    public function simpan()
    {
        
        if (! $this->request->is('post')) {
            
            return redirect()->back()->withInput();
        }

        if (! $this->validate($this->rules)) {
            return redirect()->back()->withInput();
        }
        $dt = $this->request->getPost();
        try {
            $simpan = $this->am->insert($dt);
            return redirect()->to('anggota')->with('success', 'Data berhasil disimpan');

        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            
            session()->setFlashdata('error', $e->getMessage());
            return redirect()->back()->withInput();
        }    
    }

    public function hapus($id) 
    {
        if(empty($id)) {
            return redirect()->back()->with('error', 'Hapus data gagal dilakukan');
        }

        try {
            $this->am->delete($id);
            return redirect()->to('anggota')->with('success', 'Data anggota dengan kode '.$id.'berhasil dihapus');

        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {

            return redirect()->to('anggota')->with('error', $e->getMessage());
        }
    }

    public function edit($id) {
        $breadcrumb = '<div class="col-sm-6">
                            <h1 class="m-0">Anggota</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href ="' . base_url() . '">Beranda</a></li>
                                <li class="breadcrumb-item"><a href="' . base_url() . '/anggota">Anggota</a></li>
                                <li class="breadcrumb-item active">Edit Anggota</li>
                            </ol>
                        </div>';
        $data['menu'] = $this->menu;
        $data['breadcrumb'] = $breadcrumb;
        $data['title_card'] = 'Edit Anggota';
        $data['action'] = base_url() . '/anggota/update';

        $data['edit_data'] =$this->am->find($id);
        return view('anggota/input', $data);
    }

    public function update() {
        $dtEdit = $this->request->getPost();
        $param = $dtEdit['param'];
        unset($dtEdit['param']);
        unset($this->rules['password']);

        if (!$this->validate($this->rules)) {

            return redirect()->back()->withinput();
        }

        if (empty($dtEdit['password'])) {
            unset($dtEdit['password']);
        }

        try {
            $this->am->update($param, $dtEdit);
            return redirect()->to('anggota')->with('success', 'Data berhasil di Update');
        } catch (\CodeIgniter\Database\Exceptions\DatabaseException $e) {
            session()->setFlashdata('error', $e->getMessage());
            return redirec()->back()->withInput();
        }
    }
}
