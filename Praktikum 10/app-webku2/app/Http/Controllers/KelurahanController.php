<?php

namespace App\Http\Controllers;

use App\Models\Kelurahan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class KelurahanController extends Controller
{
    public function show()
    {
        $data_layout = [
            'title' => 'Halaman Kelurahan',
        ];
        $list_kelurahan = Kelurahan::all();
        View::share($data_layout);
        return view('kelurahan.show', ['list_kelurahan' => $list_kelurahan]);
    }
}
