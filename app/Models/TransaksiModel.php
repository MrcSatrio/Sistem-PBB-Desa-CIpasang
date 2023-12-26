<?php

namespace App\Models;

use CodeIgniter\Model;

class TransaksiModel extends Model
{
    protected $table      = 'transaksi'; // Mengacu pada tabel bangunan, sesuai dengan definisi tabel Anda
    protected $primaryKey = 'id_transaksi';
    protected $useTimestamps = true;

    protected $allowedFields = ['id_bangunan', 'kadus', 'tahun', 'jumlah_pembayaran', 'status', 'created_at', 'updated_at'];

}
