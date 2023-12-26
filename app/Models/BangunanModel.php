<?php

namespace App\Models;

use CodeIgniter\Model;

class BangunanModel extends Model
{
    protected $table      = 'bangunan';
    protected $primaryKey = 'id_bangunan';
    protected $useTimestamps = true; // Aktifkan timestamp

    protected $allowedFields = ['id_warga','id_dusun','luas_tanah','luas_bangunan', 'alamat', 'njop', 'kadus', 'tahun', 'jumlah_pembayaran', 'status', 'created_at', 'updated_at'];

    // Metode atau fungsi lainnya sesuai kebutuhan Anda

    public function getBangunanByWarga($id_warga)
    {
        return $this->where('id_warga', $id_warga)->findAll();
    }
}
