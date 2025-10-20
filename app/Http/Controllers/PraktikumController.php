<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PraktikumController extends Controller
{
    public function home(){
        return view('layouts.home.home');
    }

    public function product(){
        returnview ('layouts.produk');
    }
    public function transaction(){
        return view('layouts.transaksi');
    }
    public function report(){
        return view('layouts.laporan');
    }
}
