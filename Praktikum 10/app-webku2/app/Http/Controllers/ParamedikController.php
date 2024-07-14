<?php

namespace App\Http\Controllers;

use App\Models\Paramedik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class ParamedikController extends Controller
{
    public function show()
    {
        $data_layout = [
            'title' => 'Halaman Paramedik',
        ];
        $list_paramedik = Paramedik::all();
        View::share($data_layout);
        return view('paramedik.show', ['list_paramedik' => $list_paramedik]);
    }
}
