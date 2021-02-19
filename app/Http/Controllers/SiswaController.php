<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materi;
use App\Soal;

class SiswaController extends Controller
{
    public function materi() {
        return view('siswa');
    }
    public function materiStatistika() {
        $materis = Materi::get();
      return view('statistika.materi', compact('materis'));
    }
    public function soalStatistika() {
        $soals = Soal::get();
        return view('statistika.soal', compact('soals'));
    }
}
