<?php

namespace App\Controllers;

use App\Libraries\Profilelib;

class Home extends BaseController
{
    private $_db;

    function __construct()
    {
        helper(['text', 'file', 'form', 'session', 'array', 'imageurl', 'web', 'filesystem']);
        $this->_db      = \Config\Database::connect();
    }
    public function index()
    {
        $data = [];
        $kategoris = $this->_db->table('_tb_kategori_buku')
            ->orderBy('kategori', 'asc')
            ->get()->getResult();

        if (count($kategoris) > 0) {
            $data['kategories'] = $kategoris;
        }
        $bukus = $this->_db->table('_tb_buku a')
            ->select("a.*, b.kategori")
            ->join('_tb_kategori_buku b', 'a.k_id = b.kid')
            ->orderBy('nama_buku', 'asc')
            ->get()->getResult();

        if (count($bukus) > 0) {
            $data['bukus'] = $bukus;
        }

        $Profilelib = new Profilelib();
        $user = $Profilelib->user();
        if ($user->code == 200) {
            $data['user_login'] = $user->data;
        }

        return view('toko/home', $data);
    }
}
