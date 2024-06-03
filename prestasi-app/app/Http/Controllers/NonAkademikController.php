<?php

namespace App\Http\Controllers;

use App\Models\NonAkademik;
use App\Models\Prestasi;
use Illuminate\Http\Request;

class NonAkademikController extends Controller
{
    public function index()
    {
        $data['non_akademiks'] = NonAkademik::with('nonakademik')->get();
        return view('nonakademik.index', $data);
    }

    public function create()
    {
        $data['non_akademiks'] = NonAkademik::pluck('name', 'id');
        return view('nonakademik.create', $data);
    }

    public function store(Request $request)
    {
        $valiated = $request->validate([
            'nama' => 'required|max:150',
            'kelas' => 'required|max:150',
            'tanggal' => 'required|max:150',
            'kategori_lomba' => 'required|max:100',
            'tingkat_lomba' => 'required|max:100',
        ]);

       
        NonAkademik::create($valiated);

        $notificaton = array(
            'message' => 'Data Non Akademik berhasil ditambahkan!',
            'allert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('nonakademik')->with($notificaton);
        } else
            return redirect()->route('nonakademik.create')->with($notificaton);
    }

    public function edit(string $id)
    {
        $data['nonakademik'] = NonAkademik::findOrFail($id);
        $data['prestasi'] = Prestasi::pluck('kategori_prestasi', 'id');

        return view('doktors.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $nonakademik = NonAkademik::findOrFail($id);

        $valiated = $request->validate([
            'nama' => 'required|max:150',
            'kelas' => 'required|max:150',
            'tanggal' => 'required|max:150',
            'kategori_lomba' => 'required|max:100',
            'tingkat_lomba' => 'required|max:100',
        ]);

        NonAkademik::where('id', $id)->update($valiated);

        $notificaton = array(
            'message' => 'Data non akademik berhasil diperbahharui',
            'alert-type' => 'success'
        );

        return redirect()->route('nonakademik')->with($notificaton);
    }

    public function destroy(string $id)
    {
        $doktor = NonAkademik::findOrFail($id);

        $doktor->delete();

        $notificaton = array(
            'message' => 'Data non akademik telah berhasil dihapus',
            'alert-type' => 'warning'
        );

        return redirect()->route('nonakademik')->with($notificaton);
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
    // }
}
