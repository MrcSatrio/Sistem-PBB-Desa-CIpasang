<?php

namespace App\Models;

use CodeIgniter\Model;

class BangunanModel extends Model
{
    protected $table      = 'bangunan';
    protected $primaryKey = 'id_bangunan';
    protected $useTimestamps = true; // Aktifkan timestamp

    protected $allowedFields = ['id_warga','id_dusun', 'alamat', 'njop','tahun', 'jumlah_pembayaran', 'status', 'created_at', 'updated_at'];

    // Metode atau fungsi lainnya sesuai kebutuhan Anda

    public function getBangunanByWarga($id_warga)
    {
        return $this->where('id_warga', $id_warga)->findAll();
    }
    public function cekNOP($nop)
    {
        // Melakukan pencarian berdasarkan NOP
        $result = $this->where('njop', $nop)->first();

        if ($result) {
            return $result;
        } else {
            // Jika data tidak ditemukan, Anda dapat mengembalikan nilai null atau pesan lainnya
            return null;
        }
    }
}
