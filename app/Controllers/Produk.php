<?php

namespace App\Controllers;

use App\Models\ProdukModel;

class Produk extends BaseController
{
    public function index()
    {
        $model = new ProdukModel();
        $data['produk'] = $model->findAll();

        return view('produk_view', $data);
    }
}