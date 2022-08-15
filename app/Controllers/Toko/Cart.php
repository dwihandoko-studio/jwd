<?php

namespace App\Controllers\Toko;

use App\Controllers\BaseController;
use App\Libraries\Profilelib;

class Cart extends BaseController
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

        $carts = $this->_db->table('_tb_cart a')
            ->select("c.*, a.cid, a.p_id, a.u_id, a.quantiti, b.kategori")
            ->join('_tb_buku c', 'a.p_id = c.bid')
            ->join('_tb_kategori_buku b', 'c.k_id = b.kid')
            ->where('a.u_id', $user->data->uid)
            ->orderBy('c.nama_buku', 'asc')
            ->get()->getResult();

        if (count($carts) > 0) {
            $data['pesanans'] = $carts;
        }

        $kategoris = $this->_db->table('_tb_kategori_buku')
            ->orderBy('kategori', 'asc')
            ->get()->getResult();

        if (count($kategoris) > 0) {
            $data['kategories'] = $kategoris;
        }
        $data['title'] = 'Koleksi Buku';
        $data['admin'] = true;

        if ($user->code == 200) {
            $data['user_login'] = $user->data;
        }

        return view('toko/cart', $data);
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
                'u_id' => $user->code->uid,
            ];

            $anyCart = $this->_db->table('_tb_cart')->where(['p_id' => $cekOldData->p_id, 'u_id' => $user->code->uid])->get()->getRowObject();

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


    public function hapus()
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
            'title' => [
                'rules' => 'required|trim',
                'errors' => [
                    'required' => 'Title tidak boleh kosong. ',
                ]
            ],
        ];

        if (!$this->validate($rules)) {
            $response = new \stdClass;
            $response->status = 400;
            $response->message = $this->validator->getError('id') . $this->validator->getError('title');
            return json_encode($response);
        } else {
            $id = htmlspecialchars($this->request->getVar('id'), true);
            $title = htmlspecialchars($this->request->getVar('title'), true);

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
            $this->_db->table('_tb_cart')->where('cid', $id)->delete();

            if ($this->_db->affectedRows() > 0) {

                $response = new \stdClass;
                $response->status = 200;
                $response->message = "Data berhasil dihapus.";
                return json_encode($response);
            } else {
                $response = new \stdClass;
                $response->status = 400;
                $response->message = "Data gagal dihapus.";
                return json_encode($response);
            }
        }
    }
}
