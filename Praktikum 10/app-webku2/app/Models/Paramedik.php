<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paramedik extends Model
{
    use HasFactory;

    protected $table = 'paramedik';
    protected $fillable = ['id', 'nama', 'gender', 'tmp_lahir', 'tgl_lahir', 'telpon', 'alamat', 'kategori_id', 'unit_kerja_id'];
}
