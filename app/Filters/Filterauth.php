<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class Filterauth implements FilterInterface
{
    function __construct()
    {
        helper(['cookie']);
        $this->_db      = \Config\Database::connect();
    }

    public function before(RequestInterface $request, $arguments = null)
    {
        $jwt = get_cookie('jwt');
        $token_jwt = getenv('token_jwt.default.key');
        if ($jwt) {
            try {
                $decoded = JWT::decode($jwt, new Key($token_jwt, 'HS256'));
                if ($decoded) {
                    $userId = $decoded->data->id;
                    $level = $decoded->data->role;

                    $uri = current_url(true);
                    $totalSegment = $uri->getTotalSegments();
                    if ($totalSegment > 0) {
                        $uriMain = $uri->getSegment(1);

                        if ($uriMain === "" || $uriMain === "home" || $uriMain === "toko" || $uriMain === "auth") {
                        } else {
                            if ($level == 1) {
                                if ($uriMain != "admin") {
                                    return redirect()->to(base_url('admin/home'));
                                }
                            } else {
                                // if ($uriMain != "p") {
                                return redirect()->to(base_url('home'));
                                // }
                            }
                        }
                    }
                } else {
                    $uri = current_url(true);
                    $totalSegment = $uri->getTotalSegments();
                    if ($totalSegment > 0) {
                        $uriMain = $uri->getSegment(1);

                        if ($uriMain == "" || $uriMain == "home" || $uriMain === "toko" || $uriMain == "auth") {
                        } else {
                            return redirect()->to(base_url('auth'));
                        }
                    }
                }
            } catch (\Exception $e) {
                $uri = current_url(true);
                $totalSegment = $uri->getTotalSegments();
                if ($totalSegment > 0) {

                    $uriMain = $uri->getSegment(1);

                    if ($uriMain == "" || $uriMain == "home" || $uriMain === "toko" || $uriMain == "auth") {
                    } else {
                        return redirect()->to(base_url('auth'));
                    }
                }
            }
        } else {
            $uri = current_url(true);
            $totalSegment = $uri->getTotalSegments();
            if ($totalSegment > 0) {

                $uriMain = $uri->getSegment(1);

                if ($uriMain == "auth") {
                } else {
                    return redirect()->to(base_url('auth'));
                }
            }
        }
    }

    //--------------------------------------------------------------------

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $jwt = get_cookie('jwt');
        $token_jwt = getenv('token_jwt.default.key');
        if ($jwt) {
            try {
                $decoded = JWT::decode($jwt, new Key($token_jwt, 'HS256'));
                if ($decoded) {
                    $userId = $decoded->data->id;
                    $level = $decoded->data->role;
                    $uri = current_url(true);
                    $totalSegment = $uri->getTotalSegments();
                    if ($totalSegment == 0) {

                        $uriMain = $uri->getSegment(1);
                        if ($uriMain === "" || $uriMain === "toko") {
                        } else {
                            if ($level == 1) {
                                return redirect()->to(base_url('admin/home'));
                            } else {
                                return redirect()->to(base_url('home'));
                            }
                        }
                    } else {
                        return redirect()->to(base_url('home'));
                    }
                } else {
                    $uri = current_url(true);
                    $totalSegment = $uri->getTotalSegments();
                    if ($totalSegment > 0) {

                        $uriMain = $uri->getSegment(1);
                        if ($uriMain != 'auth') {
                            return redirect()->to(base_url('auth'));
                        }
                    }
                }
            } catch (\Exception $e) {
                $uri = current_url(true);
                $totalSegment = $uri->getTotalSegments();
                if ($totalSegment > 0) {

                    $uriMain = $uri->getSegment(1);
                    if ($uriMain != 'auth') {
                        return redirect()->to(base_url('auth'));
                    }
                }
            }
        } else {
            $uri = current_url(true);
            $totalSegment = $uri->getTotalSegments();
            if ($totalSegment > 0) {
                $uriMain = $uri->getSegment(1);
                if ($uriMain != 'auth') {
                    return redirect()->to(base_url('auth'));
                }
            }
        }
    }
}
