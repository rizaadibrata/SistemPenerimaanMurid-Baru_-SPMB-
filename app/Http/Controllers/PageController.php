<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about()
    {
        return view('about');
    }

    public function fasilitas()
    {
        return view('fasilitas');
    }

    public function prestasi()
    {
        return view('prestasi');
    }

    public function departments()
    {
        return view('departments');
    }

    public function services()
    {
        return view('services');
    }

    public function contact()
    {
        return view('contact');
    }
}