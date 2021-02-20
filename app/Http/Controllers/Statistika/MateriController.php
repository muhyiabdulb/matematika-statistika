<?php

namespace App\Http\Controllers\Statistika;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Materi;

class MateriController extends Controller
{
    public function index()
    {
        {
            $materis = Materi::latest()->get();
            return view('admin.statistika.materi.materi', compact('materis'));
        }
    }

    public function create()
    {
        return view('admin.statistika.materi.createMateri');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_materi' => 'required',
            'materi' => 'required',
            'sub_materi' => 'required',
        ]);
  
        Materi::create($request->all());
   
        return redirect()->route('admin.statistika.materi.index')
                        ->with('success','Materi Berhasil di buat.');
    }

    public function edit($id)
    {
        $materis = Materi::findOrFail($id);
        return view('admin.statistika.materi.editMateri', compact('materis'));
    }

    public function update(Request $request, $id)
    {
        $materis = Materi::findOrFail($id);
        
        $kode_materi = $request->input('kode_materi');
        $sub_materi = $request->input('sub_materi');
        $materi = $request->input('materi');
        
        $materis->kode_materi = $kode_materi;
        $materis->sub_materi = $sub_materi;
        $materis->materi = $materi;

        $materis->save();
  
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.statistika.materi.index')
                        ->with('success','Materi berhasil di perbarui');
    }

    public function destroy($id)
    {
        $data = Materi::findOrFail($id);
        $data->delete();
        
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('admin.statistika.materi.index')
            ->with('success', 'Materi Berhasil Dihapus');
    }
}
