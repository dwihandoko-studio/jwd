<?php

namespace App\Controllers\Toko;

use App\Controllers\BaseController;
use App\Libraries\Profilelib;

class About extends BaseController
{
    var $folderImage = 'masterdata';
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
        $data['toko'] = $this->_db->table('_profil_toko')->limit(1)->orderBy('id', 'desc')->get()->getRowObject();
        $data['title'] = 'Koleksi Buku';
        $data['admin'] = true;

        $Profilelib = new Profilelib();
        $user = $Profilelib->user();
        if ($user->code == 200) {
            $data['user_login'] = $user->data;
        }

        return view('toko/about', $data);
    }
}
