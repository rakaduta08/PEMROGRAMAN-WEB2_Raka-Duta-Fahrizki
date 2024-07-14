<?php

namespace App\Http\Controllers;

use App\Models\UnitKerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class UnitKerjaController extends Controller
{
    public function show()
    {
        $data_layout = [
            'title' => 'Halaman Unit Kerja',
        ];
        $list_unit_kerja = UnitKerja::all();
        View::share($data_layout);
        return view('unitkerja.show', ['list_unit_kerja' => $list_unit_kerja]);
    }
}
