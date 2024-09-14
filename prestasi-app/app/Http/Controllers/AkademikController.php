<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\Akademik;
use App\Models\Rapot;
use App\Models\User;
use App\Models\Siswa;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AkademikController extends Controller
{
    public function index()
    {
        $akademiks = Akademik::orderBy('jumlah_nilai_rapot', 'desc')->get();
        return view('akademik.index', compact('akademiks'));
    }

    public function create()
    {
        // $data['siswas'] = Siswa::all();
        $data = Siswa::has('rapot')->with('rapot.mapel')->get();
        return view('akademik.create', $data);
    }

    public function store(Request $request)
    {
        // Validasi input
        $validate = $request->validate([
            'id_siswa' => 'required|max:100',
            'jumlah_nilai_rapot' => 'required|max:100',
        ]);

        // Simpan data akademik tanpa ranking
        $akademik = Akademik::create([
            'id_siswa' => $validate['id_siswa'],
            'jumlah_nilai_rapot' => $validate['jumlah_nilai_rapot'],
            // Ranking tidak diisi dulu, akan dihitung nanti
        ]);

        // Ambil semua data akademik yang sudah ada, urutkan berdasarkan jumlah_nilai_rapot (nilai rapot) dari yang terbesar ke terkecil
        $akademiks = Akademik::orderBy('jumlah_nilai_rapot', 'desc')->get();

        // Inisialisasi variabel ranking
        $ranking = 1;

        // Loop untuk memberikan ranking baru pada setiap data akademik berdasarkan urutan nilai
        foreach ($akademiks as $data) {
            // Update kolom ranking sesuai urutan nilai
            $data->ranking = $ranking;
            $data->save();

            // Naikkan ranking untuk iterasi berikutnya
            $ranking++;
        }

        // Notifikasi untuk pemberitahuan berhasil
        $notification = array(
            'message' => 'Data akademik berhasil ditambahkan!',
            'alert-type' => 'success'
        );

        // Redirect berdasarkan kondisi
        if ($request->save == true) {
            return redirect()->route('akademik.index')->with($notification);
        } else {
            return redirect()->route('akademik.create')->with($notification);
        }
    }


    public function edit(string $id)
    {
        $data['akademiks'] = Akademik::findOrFail($id);
        $data['prestasi'] = Akademik::findOrFail($id);
        $data['rapot'] = Rapot::pluck('name', 'id');

        return view('akademik.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $akademik = Akademik::findOrFail($id);

        $validate = $request->validate([
            'id_siswa' => 'required|max:100',
            'jumlah_nilai_rapot' => 'required|max:100',
            'ranking' => 'max:100',
        ]);

        $akademik->update([
            'id_siswa' => $validate['id_siswa'],
            'jumlah_nilai_rapot' => $validate['jumlah_nilai_rapot'],
            'ranking' => $validate['ranking'],
        ]);

        $notificaton = array(
            'message' => 'Data akademik berhasil diperbaharui!',
            'alert-type' => 'success'
        );

        return redirect()->route('akademik.index')->with($notificaton);
    }
    public function destroy(string $id)
    {
        $akademik = Akademik::findOrFail($id);

        $akademik->delete();

        $notificaton = array(
            'message' => 'Data akademik berhasil dihapus!',
            'alert-type' => 'success'
        );

        return redirect()->route('akademik.index')->with($notificaton);
    }

    public function print()
    {
        $akademik = Akademik::all();

        $pdf = Pdf::loadview('akademik.print', ['akademik' => $akademik]);
        return $pdf->download('data_prestasi_akademik.pdf');
    }
}
