<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class KategoriController extends Controller
{
    public function show()
    {
        $data_layout = [
            'title' => 'Halaman Kategori',
        ];
        $list_kategori = Kategori::all();
        View::share($data_layout);
        return view('kategori.show', ['list_kategori' => $list_kategori]);
    }
}
