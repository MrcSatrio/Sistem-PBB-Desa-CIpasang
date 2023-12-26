<?php

namespace App\Controllers\Admin;

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
        return view('admin/dashboard', $data);
    }

    public function read_warga()
    {
        $data = [
        'title' => 'SPBB - Data Warga',
        'warga' => $this->wargaModel->findAll(),
    ];
        return view('admin/warga/read', $data);
    }

    public function create_warga()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        $nama = $_POST['nama'];
        $nik = $_POST['nik'];
        $no_hp = $_POST['no_hp'];
        $alamat = $_POST['alamat'];
        $existingData = $this->wargaModel->where('nik', $nik)->findAll();

        if (empty($existingData)) {
            $this->wargaModel->insert([
                'nama' => $nama,
                'nik' => $nik,
                'no_hp' => $no_hp,
                'alamat' => $alamat,
            ]);

            session()->setFlashdata('success', 'Tambah Warga Berhasil');
            return redirect()->to('/admin/read_warga');
        } else {
            $error_message = "Data with NIK $nik already exists!";
            session()->setFlashdata('error', $error_message);
            return redirect()->to('/admin/create_warga');
        }
    } else {
        $data = [
            'title' => 'SPBB - Tambah Warga',
            'warga' => $this->wargaModel->findAll(),
        ];
        return view('admin/warga/create', $data);
    }
}

public function delete_warga($id)
{
    $warga = $this->wargaModel->find($id);

    if ($warga) {
        $this->wargaModel->delete($id);

        session()->setFlashdata('success', 'Hapus Warga Berhasil');
        return redirect()->to('/admin/read_warga');
    } else {
        $error_message = "Data with NIK $id not found!";
        session()->setFlashdata('error', $error_message);
        return redirect()->to('/admin/read_warga');
    }
}



public function update_warga($id)
{

        $existingWarga = $this->wargaModel->find($id);

        if ($existingWarga) {
            $data = [
                'title' => 'SPBB - Update Warga',
                'warga' => $existingWarga,
            ];
            return view('admin/warga/update', $data);
        } else {
            $error_message = "Data with NIK $id not found!";
            session()->setFlashdata('error', $error_message);
            return redirect()->to('/admin/read_warga');
        }
    }

    public function action_update_warga()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
            $nama = $_POST['nama'];
            $nik = $_POST['nik'];
            $no_telepon = $_POST['no_hp'];
            $alamat = $_POST['alamat'];
            $id_warga = $_POST['id_warga'];
    
            $existingWargaWithSameNik = $this->wargaModel
                ->where('nik', $nik)
                ->where('id_warga !=', $id_warga) 
                ->first();
    
            if ($existingWargaWithSameNik) {
                $error_message = "Data with NIK $nik already exists!";
                session()->setFlashdata('error', $error_message);
                return redirect()->to('/admin/read_warga');
            }
    
            $existingWarga = $this->wargaModel->find($id_warga);
    
            if ($existingWarga) {
                $this->wargaModel->update($id_warga, [
                    'nama' => $nama,
                    'nik' => $nik,
                    'no_telepon' => $no_telepon,
                    'alamat' => $alamat,
                ]);
    
                session()->setFlashdata('success', 'Update Warga Berhasil');
                return redirect()->to('/admin/read_warga');
            } else {
                $error_message = "Data with ID $id_warga not found!";
                session()->setFlashdata('error', $error_message);
                return redirect()->to('/admin/read_warga');
            }
        }
    }
    


    public function read_bangunan()
    {
        $bangunan =  $this->bangunanModel
        ->select('bangunan.*, warga.id_warga, warga.nama, warga.nik, warga.no_telepon, dusun.nama_dusun')
        ->join('warga', 'warga.id_warga = bangunan.id_warga')
        ->join('dusun', 'dusun.id_dusun = bangunan.id_dusun' )
        ->findAll();
        $data = [
        'title' => 'SPBB - Data Bangunan',
        'bangunan' => $bangunan
    ];
        return view('admin/bangunan/read', $data);
    }

    public function create_bangunan()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $nik = $_POST['nik'];
        $njop = $_POST['njop'];
        $alamat = $_POST['alamat'];
        $luas_tanah = $_POST['luas_tanah'];
        $luas_bangunan = $_POST['luas_bangunan'];
        $id_dusun = $_POST['id_dusun'];
        
        $existingData = $this->wargaModel->where('nik', $nik)->where('nama', $nama)->first();
        $id_warga = $this->wargaModel->select('id_warga')->where('nik', $nik)->where('nama', $nama)->first();

        if ($existingData) {
            $this->bangunanModel->insert([
                'id_warga' => $id_warga,
                'alamat' => $alamat,
                'njop' => $njop,
                'id_dusun' => $id_dusun,
                'luas_tanah' => $luas_tanah,
                'luas_bangunan' => $luas_bangunan,
            ]);

            session()->setFlashdata('success', 'Tambah Bangunan Berhasil');
            return redirect()->to('/admin/create_bangunan');
        } else {
            session()->setFlashdata('error', 'Data tidak tersedia');
            return redirect()->to('/admin/create_bangunan');
        }
    } else {
        $data = [
            'title' => 'SPBB - Tambah Bangunan',
            'warga' => $this->wargaModel->findAll(),
            'bangunan' => $this->bangunanModel->findAll(),
            'dusun' => $this->dusunModel->findAll(),
        ];
        return view('admin/bangunan/create', $data);
    }
}

public function delete_bangunan($id)
{
    $bangunan = $this->bangunanModel->find($id);

    if ($bangunan) {
        $this->bangunanModel->delete($id);

        session()->setFlashdata('success', 'Hapus Bangunan Berhasil');
        return redirect()->to('/admin/read_warga');
    } else {
        session()->setFlashdata('error', 'Data Bangunan Tidak Ada');
        return redirect()->to('/admin/read_warga');
    }
}

public function update_bangunan($id)
{
    $bangunan = $this->bangunanModel
        ->select('bangunan.*, warga.id_warga, warga.nama, warga.nik, warga.no_telepon') // Include only the desired columns
        ->join('warga', 'warga.id_warga = bangunan.id_warga')
        ->where('id_bangunan', $id)
        ->first();

    if ($bangunan) {
        $data = [
            'title' => 'SPBB - Update Bangunan',
            'bangunan' => $bangunan,
            'dusun' => $this->dusunModel->findAll(),
        ];
        return view('admin/bangunan/update', $data);
    } else {
        $error_message = "Data tidak ditemukan";
        session()->setFlashdata('error', $error_message);
        return redirect()->to('/admin/read_bangunan');
    }
}

public function action_update_bangunan()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $njop = $_POST['njop'];
        $alamat = $_POST['alamat'];
        $id_bangunan = $_POST['id_bangunan'];
        $id_dusun = $_POST['id_dusun'];
        $luas_tanah = $_POST['luas_tanah'];
        $luas_bangunan = $_POST['luas_bangunan'];

        $updateData = [
            'njop' => $njop,
            'alamat' => $alamat,
            'id_dusun' => $id_dusun,
            'luas_tanah' => $luas_tanah,
            'luas_bangunan' => $luas_bangunan,
        ];

        // Melakukan update berdasarkan ID
        $updateResult = $this->bangunanModel->update($id_bangunan, $updateData);

        if ($updateResult) {
            // Jika berhasil, set pesan sukses dan redirect
            session()->setFlashdata('success', 'Update Bangunan Berhasil');
            return redirect()->to('/admin/read_bangunan');
        } else {
            // Jika ID tidak ditemukan, set pesan error dan redirect
            $error_message = "Data with ID $id_bangunan not found!";
            session()->setFlashdata('error', $error_message);
            return redirect()->to('/admin/read_bangunan');
        }
    }
}

public function transaksi()
{
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nama = $_POST['nama'];
        $nik = $_POST['nik'];
        $njop = $_POST['njop'];
        $kadus = $_POST['kadus'];
        $bayar = $_POST['bayar'];
        $tahun = $_POST['tahun'];
        $status = $_POST['status'];
        
        // Mencari id_warga berdasarkan nik dan nama
        $warga = $this->wargaModel->select('id_warga')->where('nik', $nik)->where('nama', $nama)->first();

        if ($warga) {
            // Mencari id_bangunan berdasarkan id_warga dan njop
            $bangunan = $this->bangunanModel->select('id_bangunan')->where('id_warga', $warga['id_warga'])->where('njop', $njop)->first();

            if ($bangunan) {
                // Melanjutkan transaksi jika id_bangunan ditemukan
                $this->transaksiModel->insert([
                    'id_bangunan' => $bangunan['id_bangunan'],
                    'kadus' => $kadus,
                    'tahun' => $tahun,
                    'jumlah_pembayaran' => $bayar,
                    'status' => $status
                ]);

                // Mendapatkan data bangunan untuk ditampilkan di view
                $bangunanList = $this->bangunanModel
                    ->select('bangunan.*, warga.id_warga, warga.nama, warga.nik, warga.no_telepon') // Include only the desired columns
                    ->join('warga', 'warga.id_warga = bangunan.id_warga')
                    ->findAll();

                $data = [
                    'title' => 'SPBB - Update Bangunan',
                    'warga' => $this->wargaModel->findAll(),
                    'bangunan' => $bangunanList,
                ];
                session()->setFlashdata('success', 'Transaksi Berhasil Ditambahkan');
                return view('admin/transaksi/create', $data);
            } else {
                // Tampilkan pesan error jika id_bangunan tidak ditemukan
                $error_message = "ID Bangunan tidak ditemukan!";
            }
        } else {
            // Tampilkan pesan error jika id_warga tidak ditemukan
            $error_message = "ID Warga tidak ditemukan!";
        }

        // Set pesan error dan redirect
        session()->setFlashdata('error', $error_message);
        return redirect()->to('/admin/transaksi/create');
    } else {
        // Tindakan jika bukan metode POST (optional)
        $bangunanList = $this->bangunanModel
            ->select('bangunan.*, warga.id_warga, warga.nama, warga.nik, warga.no_telepon') // Include only the desired columns
            ->join('warga', 'warga.id_warga = bangunan.id_warga')
            ->findAll();
    
        $data = [
            'title' => 'SPBB - Update Bangunan',
            'warga' => $this->wargaModel->findAll(),
            'bangunan' => $bangunanList,
        ];
        return view('admin/transaksi/create', $data);
    }
}

public function read_transaksi()
{
    $bangunan =  $this->bangunanModel
    ->select('bangunan.*, warga.id_warga, warga.nama, warga.nik, warga.no_telepon') // Include only the desired columns
    ->join('warga', 'warga.id_warga = bangunan.id_warga')
    ->findAll();

    $transaksi = $this->transaksiModel
    ->join('bangunan', 'bangunan.id_bangunan = transaksi.id_bangunan')
    ->findAll();
    $data = [
    'title' => 'SPBB - Data Transaksi',
    'transaksi' => $transaksi,
];
    return view('admin/transaksi/read', $data);
}


}
