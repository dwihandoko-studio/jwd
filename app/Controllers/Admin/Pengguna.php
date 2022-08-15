<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use App\Models\Admin\PenggunaModel;
use Config\Services;
use App\Libraries\Profilelib;

class Pengguna extends BaseController
{
    var $folderImage = 'masterdata';
    private $_db;
    private $model;

    function __construct()
    {
        helper(['text', 'file', 'form', 'session', 'array', 'imageurl', 'web', 'filesystem']);
        $this->_db      = \Config\Database::connect();
    }

    public function getAll()
    {
        $request = Services::request();
        $datamodel = new PenggunaModel($request);


        $lists = $datamodel->get_datatables();
        // $lists = [];
        $data = [];
        $no = $request->getPost("start");
        foreach ($lists as $list) {
            $no++;
            $row = [];

            $row[] = $no;
            $action = '<div class="dropup">
                        <div class="btn btn-primary btn-sm" href="javascript:;" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span>&nbsp;&nbsp;Aksi&nbsp;&nbsp;</span>
                        </div>
                        <div class="dropdown-menu">
                            <button onclick="actionReset(\'' . $list->uid . '\', \' ' . $list->fullname . '\')" type="button" class="dropdown-item">
                                <i class="ni ni-lock-circle-open"></i>
                                <span>Reset Password</span>
                            </button>
                            <button onclick="actionHapus(\'' . $list->uid . '\', \' ' . $list->fullname . '\')" type="button" class="dropdown-item">
                                <i class="fa fa-trash"></i>
                                <span>Hapus</span>
                            </button>
                        </div>
                    </div>';
            if ($list->image !== null) {
                $image = '<img alt="Image placeholder" src="' . base_url() . '/uploads/buku/' . $list->image . '" width="60px" height="60px">';
            } else {
                $image = "-";
            }
            $row[] = $action;
            $row[] = $image;
            $row[] = $list->fullname;
            $row[] = $list->email;
            $row[] = $list->no_hp;
            $row[] = $list->alamat;
            $row[] = $list->kode_pos;

            $data[] = $row;
        }
        $output = [
            "draw" => $request->getPost('draw'),
            // "recordsTotal" => 0,
            // "recordsFiltered" => 0,
            "recordsTotal" => $datamodel->count_all(),
            "recordsFiltered" => $datamodel->count_filtered(),
            "data" => $data
        ];
        echo json_encode($output);
    }

    public function index()
    {
        $data['title'] = 'Penggua';
        $Profilelib = new Profilelib();
        $user = $Profilelib->user();
        if ($user->code != 200) {
            delete_cookie('jwt');
            session()->destroy();
            return redirect()->to(base_url('auth'));
        }

        $data['user'] = $user->data;
        $data['userMenu'] = true;

        return view('admin/pengguna/index', $data);
    }

    public function reset()
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

            $current = $this->_db->table('_users_tb')
                ->where('kid', $id)->get()->getRowObject();

            if ($current) {
                $this->_db->table('_users_tb')->where('uid', $current->uid)->update(['password' => password_hash('123456', PASSWORD_BCRYPT), 'updated_at' => date('Y-m-d H:i:s')]);
                if ($this->_db->affectedRows() > 0) {
                    $response = new \stdClass;
                    $response->status = 200;
                    $response->message = "Password user berhasil direset.";
                    return json_encode($response);
                } else {
                    $response = new \stdClass;
                    $response->status = 400;
                    $response->message = "Gagal mereset password user.";
                    return json_encode($response);
                }
            } else {
                $response = new \stdClass;
                $response->status = 400;
                $response->message = "Data tidak ditemukan";
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
            $this->_db->table('_users_tb')->where('uid', $id)->delete();

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
