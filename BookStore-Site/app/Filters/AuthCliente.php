<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class AuthCliente implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        if (session('id_perfil') != 2) {
            return redirect()->to(base_url('/inicioSession'));
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do something here
    }
}
