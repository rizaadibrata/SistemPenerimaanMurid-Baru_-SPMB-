<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/berkas/view/{filename}', function ($filename) {
    $path = storage_path('app/public/uploads/berkas/' . $filename);
    
    if (!file_exists($path)) {
        abort(404);
    }
    
    return response()->file($path);
})->name('berkas.view');