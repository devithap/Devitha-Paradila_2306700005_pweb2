<?php

namespace App\Controllers;

class Pesanan extends BaseController
{
    public function index()
    {
        $db = \Config\Database::connect();

        $data['pesanan'] =
            $db->table('pesanan')->get()->getResult();

        return view('pesanan', $data);
    }
}