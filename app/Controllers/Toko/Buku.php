<?php

namespace App\Controllers\Toko;

use App\Controllers\BaseController;
use App\Libraries\Profilelib;

class Buku extends BaseController
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
        $cat = htmlspecialchars($this->request->getGet('categori'), true) ?? "";
        $keyword = htmlspecialchars($this->request->getGet('keyword'), true) ?? "";
        $data = [];

        if ($cat !== "" || $keyword !== "") {
            if ($keyword !== "") {
                $bukus = $this->_db->table('_tb_buku a')
                    ->select("a.*, b.kategori")
                    ->join('_tb_kategori_buku b', 'a.k_id = b.kid')
                    ->where("a.nama_buku LIKE '%$keyword%' OR a.pengarang LIKE '%$keyword%'")
                    ->orderBy('nama_buku', 'asc')
                    ->get()->getResult();

                if (count($bukus) > 0) {
                    $data['bukus'] = $bukus;
                }
            } else {
                $bukus = $this->_db->table('_tb_buku a')
                    ->select("a.*, b.kategori")
                    ->join('_tb_kategori_buku b', 'a.k_id = b.kid')
                    ->where('a.k_id', $cat)
                    ->orderBy('nama_buku', 'asc')
                    ->get()->getResult();

                if (count($bukus) > 0) {
                    $data['bukus'] = $bukus;
                }
            }
        } else {
            $bukus = $this->_db->table('_tb_buku a')
                ->select("a.*, b.kategori")
                ->join('_tb_kategori_buku b', 'a.k_id = b.kid')
                ->orderBy('nama_buku', 'asc')
                ->get()->getResult();

            if (count($bukus) > 0) {
                $data['bukus'] = $bukus;
            }
        }
        $kategoris = $this->_db->table('_tb_kategori_buku')
            ->orderBy('kategori', 'asc')
            ->get()->getResult();

        if (count($kategoris) > 0) {
            $data['kategories'] = $kategoris;
        }
        $data['title'] = 'Koleksi Buku';
        $data['admin'] = true;
        $Profilelib = new Profilelib();
        $user = $Profilelib->user();
        if ($user->code == 200) {
            $data['user_login'] = $user->data;
        }

        return view('toko/buku', $data);
    }

    public function addtocart()
    {
        if ($this->request->getMethod() != 'post') {
            $response = new \stdClass;
            $response->status = 400;
            $response->message = "Permintaan tidak diizinkan";
            return json_encode($response);
        }

        $rules = [
            'id' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Id tidak boleh kosong. ',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $response = new \stdClass;
            $response->status = 400;
            $response->message = $this->validator->getError('id');
            return json_encode($response);
        } else {
            $id = htmlspecialchars($this->request->getVar('id'), true);

            $Profilelib = new Profilelib();
            $user = $Profilelib->user();
            if ($user->code != 200) {
                delete_cookie('jwt');
                session()->destroy();
                $response = new \stdClass;
                $response->status = 401;
                $response->message = "Permintaan diizinkan";
                $response->redirect = base_url('auth');
                return json_encode($response);
            }

            $cekOldData = $this->_db->table('_tb_buku')->where('bid', $id)->get()->getRowObject();

            if (!$cekOldData) {
                $response = new \stdClass;
                $response->status = 400;
                $response->message = "Data tidak ditemukan.";
                return json_encode($response);
            }


            $data = [
                'p_id' => $cekOldData->bid,
                'quantiti' => 1,
                'harga' => $cekOldData->harga,
                'u_id' => $user->data->uid,
            ];

            $anyCart = $this->_db->table('_tb_cart')->where(['p_id' => $cekOldData->bid, 'u_id' => $user->data->uid])->get()->getRowObject();

            $this->_db->transBegin();

            try {
                if ($anyCart) {
                    $data['updated_at'] = date('Y-m-d H:i:s');
                    $this->_db->table('_tb_cart')->where('cid', $anyCart->cid)->update($data);
                } else {
                    $data['created_at'] = date('Y-m-d H:i:s');
                    $this->_db->table('_tb_cart')->insert($data);
                }
                if ($this->_db->affectedRows() > 0) {
                    $this->_db->transCommit();

                    $response = new \stdClass;
                    $response->status = 200;
                    $response->message = "Buku berhasil ditambahkan ke keranjang.";
                    $response->data = $data;
                    $response->redirect = base_url('toko/cart');
                    return json_encode($response);
                } else {
                    $this->_db->transRollback();
                    $response = new \stdClass;
                    $response->status = 400;
                    $response->message = "Gagal menambahkan ke keranjang.";
                    return json_encode($response);
                }
            } catch (\Throwable $th) {
                $this->_db->transRollback();
                $response = new \stdClass;
                $response->status = 400;
                $response->message = "Gagal menambahkan ke keranjang.";
                return json_encode($response);
            }
        }
    }

    public function ubahitemcart()
    {
        if ($this->request->getMethod() != 'post') {
            $response = new \stdClass;
            $response->status = 400;
            $response->message = "Permintaan tidak diizinkan";
            return json_encode($response);
        }

        $rules = [
            'id' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Id tidak boleh kosong. ',
                ]
            ],
            'aksi' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Aksi tidak boleh kosong. ',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $response = new \stdClass;
            $response->status = 400;
            $response->message = $this->validator->getError('id') . $this->validator->getError('aksi');
            return json_encode($response);
        } else {
            $id = htmlspecialchars($this->request->getVar('id'), true);
            $aksi = htmlspecialchars($this->request->getVar('aksi'), true);

            $Profilelib = new Profilelib();
            $user = $Profilelib->user();
            if ($user->code != 200) {
                delete_cookie('jwt');
                session()->destroy();
                $response = new \stdClass;
                $response->status = 401;
                $response->message = "Permintaan diizinkan";
                return json_encode($response);
            }

            $cekOldData = $this->_db->table('_tb_cart')->where('cid', $id)->get()->getRowObject();

            if (!$cekOldData) {
                $response = new \stdClass;
                $response->status = 400;
                $response->message = "Data tidak ditemukan.";
                return json_encode($response);
            }

            if ($aksi === "kurang") {
                $nilaiUbah = (int)$cekOldData->quantiti - 1;
            } else if ($aksi === "tambah") {
                $nilaiUbah = (int)$cekOldData->quantiti + 1;
            } else {
                $nilaiUbah = (int)$cekOldData->quantiti;
            }


            $data = [
                'quantiti' => $nilaiUbah,
                'updated_at' => date('Y-m-d H:i:s'),
            ];

            $this->_db->transBegin();

            try {
                $this->_db->table('_tb_cart')->where('cid', $cekOldData->cid)->update($data);
                if ($this->_db->affectedRows() > 0) {
                    $this->_db->transCommit();

                    $response = new \stdClass;
                    $response->status = 200;
                    $response->message = "Buku berhasil ditambahkan ke keranjang.";
                    $response->data = $data;
                    return json_encode($response);
                } else {
                    $this->_db->transRollback();
                    $response = new \stdClass;
                    $response->status = 400;
                    $response->message = "Gagal menambahkan ke keranjang.";
                    return json_encode($response);
                }
            } catch (\Throwable $th) {
                $this->_db->transRollback();
                $response = new \stdClass;
                $response->status = 400;
                $response->message = "Gagal menambahkan ke keranjang.";
                return json_encode($response);
            }
        }
    }
}
