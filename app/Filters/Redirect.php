<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class Redirect implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        // Tidak perlu tindakan sebelum request
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        $session = session();

        // Ambil URI sekarang
        $currentURI = service('uri')->getPath();

        // Cek apakah user login dan URI saat ini adalah 'login'
        if ($session->get('isLoggedIn') && $currentURI === 'login') {
            return redirect()->to('/keranjang');
        }
    }
}
