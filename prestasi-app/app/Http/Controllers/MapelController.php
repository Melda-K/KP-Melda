<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\MataPelajaran;

class MapelController extends Controller
{
    
    public function index()
    {
        $mapel = MataPelajaran::get();
        return view('mapel.index', compact('mapel'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_mapel' => 'required',
        ]);

        $mapel = MataPelajaran::create([
            'nama_mapel' => $validate['nama_mapel'],
        ]);

        $notificaton = array(
            'message' => 'Data berhasil ditambahkan',
            'alert-type' => 'success'
        );

        if ($mapel->save == true) {
            return redirect()->route('mapel.index')->with($notificaton);
        } else
            return redirect()->route('mapel.index')->with($notificaton);
    }

    public function edit(string $id)
    {
        //
    }

    public function update(Request $request, string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $validate = $request->validate([

            'nama_mapel' => 'required',
        ]);

        $mapel->update([

            'nama_mapel' => $validate['nama_mapel'],
        ]);

        $notificaton = array(
            'message' => 'Data berhasil diperbaharui',
            'alert-type' => 'success'
        );

        return redirect()->route('mapel.index')->with($notificaton);
    }

    public function destroy(string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $mapel->delete();

        $notificaton = array(
            'message' => 'Data berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('mapel.index')->with($notificaton);
    }
}
