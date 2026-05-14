<?php

namespace App\Controllers;

use CodeIgniter\Controller;

class Checkout extends Controller
{
    public function simpan()
    {
        $db = \Config\Database::connect();

        $nama = $this->request->getPost('nama');
        $alamat = $this->request->getPost('alamat');
        $produk = $this->request->getPost('produk');
        $total = $this->request->getPost('total');

        $db->table('pesanan')->insert([
            'nama' => $nama,
            'alamat' => $alamat,
            'produk' => $produk,
            'total' => $total
        ]);

        return $this->response->setJSON([
            'status' => 'success'
        ]);
    }
}