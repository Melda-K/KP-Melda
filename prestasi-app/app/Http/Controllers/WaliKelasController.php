<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\WaliKelas;
use Illuminate\Http\Request;

class WaliKelasController extends Controller
{
    public function index()
    {
        $data['wali_kelass'] = WaliKelas::with('walikelas')->get();
        return view('walikelas.index', $data);
    }

    public function create()
    {
        $data['walikelass'] = User::pluck('name', 'id');
        return view('walikelas.create', $data);
    }

    public function store(Request $request)
    {
        $valiated = $request->validate([
            'nip' => 'required|max:255',
            'nama_guru' => 'required|max:150',
            'guru_kelas' => 'required|max:150',
            'jenis_kelamin' => 'required|max:100',
        ]);

       
    //     Doktor::create($valiated);

    //     $notificaton = array(
    //         'message' => 'Data Doktor berhasil ditambahkan! :D',
    //         'allert-type' => 'success'
    //     );

    //     if ($request->save == true) {
    //         return redirect()->route('doktor')->with($notificaton);
    //     } else
    //         return redirect()->route('doktor.create')->with($notificaton);
    // }

    // public function edit(string $id)
    // {
    //     $data['doktor'] = Doktor::findOrFail($id);
    //     $data['praktek'] = Praktek::pluck('name', 'id');

    //     return view('doktors.edit', $data);
    // }

    // public function update(Request $request, string $id)
    // {
    //     $doktor = Dokter::findOrFail($id);

    //     $valiated = $request->validate([
    //         'nip' => 'required|max:255',
    //         'nama_dokter' => 'required|max:150',
    //         'spesialis' => 'required|digits:4|integer|min:1900|max:' . (date('Y')),
    //         'jenis_kelamin' => 'required|max:100',
    //     ]);


    //     Doktor::where('id', $id)->update($valiated);

    //     $notificaton = array(
    //         'message' => 'Data Doktor berhasil diperbahharui',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('doktor')->with($notificaton);
    // }

    // public function destroy(string $id)
    // {
    //     $doktor = Dokter::findOrFail($id);

    //     $doktor->delete();

    //     $notificaton = array(
    //         'message' => 'Data Dokter telah berhasil dihapus',
    //         'alert-type' => 'warning'
    //     );

    //     return redirect()->route('doktor')->with($notificaton);
    // }

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
}
