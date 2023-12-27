<?php

namespace App\Models;

use CodeIgniter\Model;

class WargaModel extends Model
{
    protected $table      = 'warga';
    protected $primaryKey = 'id_warga';
    protected $useTimestamps = true;

    protected $allowedFields = ['nama', 'alamat', 'created_at', 'updated_at'];
}
