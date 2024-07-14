<?php

namespace App\Http\Controllers;

use App\Models\Pasien;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PasienController extends Controller
{
    public function show()
    {
        $data_layout = [
            'title' => 'Halaman Pasien',
        ];
        $list_pasien = Pasien::all();
        View::share($data_layout);
        return view('pasien.show', ['list_pasien' => $list_pasien]);
    }
}
