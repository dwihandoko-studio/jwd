<?php

namespace App\Libraries;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Profilelib
{
    private $_db;
    function __construct()
    {
        helper(['text', 'session', 'cookie', 'array', 'filesystem']);
        $this->_db      = \Config\Database::connect();
    }

    public function user()
    {
        $jwt = get_cookie('jwt');
        $token_jwt = getenv('token_jwt.default.key');
        if ($jwt) {
            try {
                $decoded = JWT::decode($jwt, new Key($token_jwt, 'HS256'));
                if ($decoded) {
                    $userId = $decoded->data->id;
                    $user = $this->_db->table('_users_tb')
                        ->where('uid', $userId)
                        ->get()->getRowObject();
                    if ($user) {
                        $response = new \stdClass;
                        $response->code = 200;
                        $response->data = $user;
                    } else {
                        $response = new \stdClass;
                        $response->code = 401;
                        $response->message = "User tidak ditemukan.";
                    }
                } else {
                    $response = new \stdClass;
                    $response->code = 401;
                    $response->message = "Session telah habis.";
                }
            } catch (\Exception $e) {

                $response = new \stdClass;
                $response->code = 401;
                $response->message = "Session telah habis.";
            }
        } else {
            $response = new \stdClass;
            $response->code = 401;
            $response->message = "Session telah habis.";
        }

        return $response;
    }
}
