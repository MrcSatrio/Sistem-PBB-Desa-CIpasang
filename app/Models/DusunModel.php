<?php

namespace App\Models;

use CodeIgniter\Model;

class DusunModel extends Model
{
    protected $table      = 'dusun';
    protected $primaryKey = 'id_dusun';

    protected $useAutoIncrement = true;

    protected $allowedFields = ['id_dusun','nama_dusun'];
}