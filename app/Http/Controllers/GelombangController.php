<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Gelombang;

class GelombangController extends Controller
{
    public function index()
    {
        //  asc naik (dari tanggal paling lama ke paling baru)
        // OrderBy = Mengurutkan data
        $gelombang = Gelombang::orderBy('tanggal_mulai', 'asc')->get();
        return view('gelombang', compact('gelombang'));
    }
}
