<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\NonAkademik;
use App\Models\Rapot;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class NonAkademikController extends Controller
{
    public function index()
    {
        $data['nonakademiks'] = NonAkademik::with('siswa')->get();
        return view('nonakademik.index', $data);
    }

    public function create()
    {
        $data['siswas'] = Siswa::all();
        return view('nonakademik.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_siswa' => 'required|max:100',
            'tanggal' => 'required|max:100',
            'kategori_lomba' => 'required|max:100',
            'juara_lomba' => 'required|max:100',
            'tingkat_lomba' => 'required|max:100',
        ]);

        $nonakademik = NonAkademik::create([
            'id_siswa' => $validate['id_siswa'],
            'tanggal' => $validate['tanggal'],
            'kategori_lomba' => $validate['kategori_lomba'],
            'juara_lomba' => $validate['juara_lomba'],
            'tingkat_lomba' => $validate['tingkat_lomba'],
        ]);

        $notificaton = array(
            'message' => 'Data non akademik berhasil ditambahkan!',
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('nonakademik.index')->with($notificaton);
        } else
            return redirect()->route('nonakademik.create')->with($notificaton);
    }

    public function edit(string $id)
    {
        $data['nonakademiks'] = NonAkademik::findOrFail($id);
        $data['prestasi'] = NonAkademik::findOrFail($id);
        $data['rapot'] = Rapot::pluck('name', 'id');

        return view('nonakademik.edit', $data);
    }
    
    public function update(Request $request, string $id)
    {
        $nonakademik = NonAkademik::findOrFail($id);

        $validate = $request->validate([
            'id_siswa' => 'required|max:150',
            'tanggal' => 'required|max:100',
            'kategori_lomba' => 'required|max:100',
            'juara_lomba' => 'required|max:100',
            'tingkat_lomba' => 'required|max:100',
        ]);

        $nonakademik->update([
            'id_siswa' => $validate['id_siswa'],
            'tanggal' => $validate['tanggal'],
            'kategori_lomba' => $validate['kategori_lomba'],
            'juara_lomba' => $validate['juara_lomba'],
            'tingkat_lomba' => $validate['tingkat_lomba'],
        ]);

        $notificaton = array(
            'message' => 'Data non akademik berhasil ditambahkan',
            'alert-type' => 'success'
        );

        return redirect()->route('nonakademik.index')->with($notificaton);

    }
    public function destroy(string $id)
    {
        $nonakademik = NonAkademik::findOrFail($id);

        $nonakademik->delete();

        $notificaton = array(
            'message' => 'Data non akademik berhasil dihapus',
            'alert-type' => 'success'
        );

        return redirect()->route('nonakademik.index')->with($notificaton);
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


