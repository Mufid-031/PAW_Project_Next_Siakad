<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JadwalMengajar;


class JadwalMengajarController extends Controller
{

public function index()
{
   
    $jadwal= JadwalMengajar::all();
    return view('dosen.dosen-jadwal', compact('jadwal'));
}

}
