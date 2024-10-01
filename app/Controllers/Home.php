<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index()
    {
        // Contoh penggunaan showErrorPage
        if (true) { // Ubah kondisi sesuai dengan logika kamu
            return $this->showErrorPage('Halaman tidak ditemukan', 404);
        }

        return view('welcome_message');
    }
}
