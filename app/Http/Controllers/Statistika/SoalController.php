<?php

namespace App\Http\Controllers\Statistika;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Soal;

class SoalController extends Controller
{
    public function index()
    {
        $soals = Soal::latest()->get();
        return view('admin.statistika.soal.soal', compact('soals'));
    }

    public function create()
    {
        return view('admin.statistika.soal.createSoal');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_soal' => 'required',
            'soal' => 'required',
            'pilihan_a' => 'required',
            'pilihan_b' => 'required',
            'pilihan_c' => 'required',
            'pilihan_d' => 'required',
            'pilihan_e' => 'required',
            'jawaban_benar' => 'required',
        ]);
  
        Soal::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.statistika.soal.index')
                        ->with('success','Soal Berhasil di buat.');
    }

    public function edit($id)
    {
        $soals = Soal::findOrFail($id);
        return view('admin.statistika.soal.editSoal', compact('soals'));
    }

    public function update(Request $request, $id)
    {
        $soals = Soal::findOrFail($id);
        
        $kode_soal = $request->input('kode_soal');
        $soal = $request->input('soal');  
        $pilihan_a = $request->input('pilihan_a'); 
        $pilihan_b = $request->input('pilihan_b');
        $pilihan_c = $request->input('pilihan_c'); 
        $pilihan_d = $request->input('pilihan_d');
        $pilihan_e = $request->input('pilihan_e');
        $jawaban_benar = $request->input('jawaban_benar');
        
        $soals->kode_soal = $kode_soal;
        $soals->soal = $soal;
        $soals->pilihan_a = $pilihan_a;
        $soals->pilihan_b = $pilihan_b;
        $soals->pilihan_c = $pilihan_c;
        $soals->pilihan_d = $pilihan_d;
        $soals->pilihan_e = $pilihan_e;
        $soals->jawaban_benar = $jawaban_benar;

        $soals->save();
  
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.statistika.soal.index')
                        ->with('success','Soal berhasil di perbarui');
    }

    public function destroy($id)
    {
        $data = Soal::findOrFail($id);
        $data->delete();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.statistika.soal.index')
            ->with('success', 'Soal Berhasil Dihapus');
    }
}
