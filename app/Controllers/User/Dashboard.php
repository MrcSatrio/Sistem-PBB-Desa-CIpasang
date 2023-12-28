<?php

namespace App\Controllers\User;

use App\Controllers\BaseController;
use App\Models\AkunModel;
use App\Models\WargaModel;
use App\Models\BangunanModel;
use App\Models\TransaksiModel;
use App\Models\DusunModel;

class Dashboard extends BaseController
{
protected $wargaModel;
protected $akunModel;
protected $bangunanModel;
protected $transaksiModel;
protected $dusunModel;

    public function __construct()
    {
        $this->akunModel = new AkunModel();
        $this->wargaModel = new WargaModel();
        $this->bangunanModel = new BangunanModel();
        $this->transaksiModel = new TransaksiModel();
        $this->dusunModel = new DusunModel();
    }

    public function index()
    {
        $currentYear = date('Y');
        $lastYear = $currentYear - 1;
        $transactionsGroupedByDusun = $this->transaksiModel
        ->select('dusun.nama_dusun as dusun_name, COUNT(DISTINCT bangunan.id_bangunan) as total_bangunan')
        ->join('bangunan', 'bangunan.id_bangunan = transaksi.id_bangunan')
        ->join('dusun', 'dusun.id_dusun = bangunan.id_dusun')
        ->where('YEAR(transaksi.created_at)', $currentYear)
        ->groupBy('dusun.nama_dusun')
        ->findAll();
        $totalbangunan = $this->bangunanModel
        ->select('COUNT(DISTINCT id_bangunan) as total_bangunan')
        ->findAll();
        $totalwarga = $this->wargaModel
        ->select('COUNT(DISTINCT id_warga) as total_warga')
        ->findAll();
        $totalpembayaran = $this->transaksiModel
        ->select('SUM(jumlah_pembayaran) as total_pembayaran')
        ->where('YEAR(transaksi.created_at)', $currentYear)
        ->findAll();
        $transaksitahunlalu = $this->transaksiModel
        ->select('SUM(jumlah_pembayaran) as transaksitahunlalu')
        ->where('YEAR(transaksi.created_at)', $lastYear)
        ->findAll();
        
        $jumlahTransaksi = $this->transaksiModel
        ->select('COUNT(DISTINCT id_bangunan) as jumlah_bangunan')
        ->findAll();
        $persentaseTransaksi = 0;
    if ($jumlahTransaksi[0]['jumlah_bangunan'] > 0) {
        $persentaseTransaksi = $jumlahTransaksi[0]['jumlah_bangunan'];
    }
        $data = [
            'title' => 'SPBB - Dashboard',
            'transactionsGroupedByDusun' => $transactionsGroupedByDusun,
            'transaksitahunlalu' => $transaksitahunlalu,
            'totalbangunan' => $totalbangunan,
            'totalwarga' => $totalwarga,
            'totalpembayaran' => $totalpembayaran,
            'persentasePembayaran' => $persentaseTransaksi
        ];
        return view('user/dashboard', $data);
    }

    public function read_warga()
    {
        $data = [
        'title' => 'SPBB - Data Warga',
        'warga' => $this->wargaModel->findAll(),
    ];
        return view('user/read_warga', $data);
    }

    public function read_bangunan()
    {
        $bangunan =  $this->bangunanModel
        ->select('bangunan.*, warga.id_warga, warga.nama, dusun.nama_dusun')
        ->join('warga', 'warga.id_warga = bangunan.id_warga')
        ->join('dusun', 'dusun.id_dusun = bangunan.id_dusun' )
        ->findAll();
        $data = [
        'title' => 'SPBB - Data Bangunan',
        'bangunan' => $bangunan
    ];
        return view('user/read_bangunan', $data);
    }

    public function read_transaksi()
    {
        $transaksi = $this->transaksiModel
        ->join('bangunan', 'bangunan.id_bangunan = transaksi.id_bangunan')
        ->findAll();
        $data = [
        'title' => 'SPBB - Data Transaksi',
        'transaksi' => $transaksi,
        ];
        return view('user/read_transaksi', $data);
    }
    
}