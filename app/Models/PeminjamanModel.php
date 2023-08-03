<?php

namespace App\Models;

use CodeIgniter\Model;

class PeminjamanModel extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'peminjaman';
    protected $primaryKey       = 'Id_anggota';
    protected $useAutoIncrement = false;
    protected $allowedFields    = ['Id_anggota', 'Nama_Buku', 'Tanggal Peminjaman', 'Tanggal Pengembalian'];

}
