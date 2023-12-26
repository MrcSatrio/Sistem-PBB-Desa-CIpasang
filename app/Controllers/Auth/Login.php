<?php

namespace App\Controllers\Auth;

use \App\Controllers\BaseController;
use App\Models\AkunModel;

class Login extends BaseController
{
    protected $akunModel;
    public function __construct()
    {
        $this->akunModel = new AkunModel();
    }
    

    public function index()
    {  $data = [
        'title' => 'SPBB - SELAMAT DATANG',
    ];
        return view('auth/login', $data);
    }

    public function login()
    {
        $username = $this->request->getVar('username');
        $password = $this->request->getVar('password');
        $user = $this->akunModel->where('username', $username)->first();
    
        if ($user) {
    
            if (md5($password) == $user['password']) {
                $session = session();
                $sessionData = [
                    'username' => $user['username'],
                    'id_role' => $user['id_role'],
                    'id_user' => $user['id_user'],
                ];
                $session->set($sessionData);
                switch ($user['id_user']) {
                    case 1:
                        return redirect()->to(base_url('admin/dashboard'));
                            case 2:
                                return redirect()->to(base_url('user/dashboard'));
                    default:
                        session()->setFlashdata('error', 'Username atau Password Salah');
                        return redirect()->to(base_url('/'));
                }
            } else {
                session()->setFlashdata('error', 'Username atau Password Salah');
                return redirect()->to(base_url('/'));
            }
        } else {
            session()->setFlashdata('error', 'Username atau Password Salah');
            return redirect()->to(base_url('/'));
        }
    }

    public function logout()
    {
        $session = session();
        $session->destroy();
        session_write_close();
        return redirect()->to('/');
    }
}