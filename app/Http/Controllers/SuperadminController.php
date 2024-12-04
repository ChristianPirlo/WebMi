<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class SuperadminController extends Controller
{
    public function home()
    {
        return view('superadmin/home');
    }
    public function pendaftaran()
    {
        return view('superadmin/pendaftaran');
    }
    public function daftarImprovementSA()
    {
        return view('superadmin/daftarImprovementSA');
    }
    public function arsip()
    {
        return view('superadmin/arsip');

    }
    public function report()
    {
        return view('superadmin/report');

    }
}

