<?php

namespace App\Http\Controllers;

use App\Models\Kriteria;
use App\Models\MataPelajaran;
use App\Models\Rapot;
use Illuminate\Http\Request;

class MataPelajaranController extends Controller
{
    
    public function index()
    {
        $data['nama_mata_pelajarans'] = MataPelajaran::with('mapel')->get();
        $siswas=MataPelajaran::with('siswa')->get();
        return view('mapel.index', $data);
    }

    public function create()
    {
        $data['nama_mata_pelajarans'] = MataPelajaran::pluck('mapel', 'id');
        return view('mapel.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_rapot' => 'required|max:100',
            'nama_mata_pelajaran' => 'required|max:100',
            'nilai' => 'required|max:100',
            'huruf' => 'required|max:100',
        ]);

        $mapel = MataPelajaran::create([
            'id_rapot' => $validate['id_rapot'],
            'nama_mata_pelajaran' => $validate['nama_mata_pelajaran'],
            'nilai' => $validate['nilai'],
            'huruf' => $validate['huruf'],
        ]);

        $notificaton = array(
            'message' => 'Data mata pelajaran berhasil ditambahkan',
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('mapel.index')->with($notificaton);
        } else
            return redirect()->route('mapel.create')->with($notificaton);
    }

    public function edit(string $id)
    {
        $data['mapel'] = MataPelajaran::findOrFail($id);
        $data['kriteria'] = Kriteria::findOrFail($id);
        $data['rapot'] = Rapot::pluck('name', 'id');

        return view('nonakademik.edit', $data);
    }
    
    public function update(Request $request, string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $validate = $request->validate([
            'id_rapot' => 'required|max:100',
            'nama_mata_pelajaran' => 'required|max:100',
            'nilai' => 'required|max:100',
            'huruf' => 'required|max:100',
        ]);

        $mapel->update([
            'id_rapot' => $validate['id_rapot'],
            'nama_mata_pelajaran' => $validate['nama_mata_pelajaran'],
            'nilai' => $validate['nilai'],
            'huruf' => $validate['huruf'],
        ]);

        $notificaton = array(
            'message' => 'Data mata pelajaran berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('mapel.index')->with($notificaton);

    }
    public function destroy(string $id)
    {
        $mapel = MataPelajaran::findOrFail($id);

        $mapel->delete();

        $notificaton = array(
            'message' => 'Data mata pelajaran berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('mapel.index')->with($notificaton);
    }

    // public function print()
    // {
    //     $doktors = doktor::all();

    //     $pdf = Pdf::loadview('doktors.print', ['doktors' => $doktors]);
    //     return $pdf->download('data_doktor.pdf');
    // }

    // public function export()
    // {
    //     return Excel::download(new DoktorExport, 'doktors.xlsx');
    //}
}
