<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalMengajar extends Model
{
    protected $fillable = ['kode_kelas', 'mata_kuliah', 'jadwal', 'ruangan'];

}
