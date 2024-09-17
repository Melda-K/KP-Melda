<?php

namespace App\Http\Controllers;

use App\Models\MataPelajaran;
use App\Models\Rapot;
use App\Models\Siswa;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Auth;

class RapotController extends Controller
{
    public function index()
    {
        $siswa = collect();
        $rapot = collect();

        if (Auth::check()) {
            $userId = Auth::id();
            $wali_kelas = \App\Models\WaliKelas::where('id_user', $userId)->first();

            if ($wali_kelas) {
                $rapot = Rapot::get();
                $siswa = Siswa::has('rapot')
                    ->with('rapot.mapel')
                    ->where('id_wali_kelas', $wali_kelas->id)
                    ->get();
            } elseif (Auth::user()) {
                $rapot = Rapot::get();
                $siswa = Siswa::has('rapot')
                    ->with('rapot.mapel')
                    ->get();
            }
        }

        return view('rapot.index', compact('siswa', 'rapot'));
    }

    public function create()
    {
        $data['Rapot'] = Rapot::pluck('rapot', 'id');
        $mapel = MataPelajaran::pluck('id', 'nama_mapel');
        return view('rapot.create', compact('data', 'mapel'));
    }

    public function store(Request $request)
    {
        // Mengumpulkan semua 'id_mapel' yang diinputkan ke dalam array
        $mapelIds = array_column($request->form, 'id_mapel');

        // Memeriksa apakah ada duplikasi di dalam array 'id_mapel' pada input
        if (count($mapelIds) !== count(array_unique($mapelIds))) {
            // Jika ada duplikasi, kembalikan notifikasi error
            $notification = array(
                'message' => 'Data mapel sama, ulang kembali data inputan',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification); // Kembali ke halaman sebelumnya dengan notifikasi
        }

        // Loop melalui inputan form untuk menyimpan nilai rapot
        foreach ($request->form as $key => $value) {
            // Cek apakah id_mapel sudah ada untuk siswa tersebut
            $existingRecord = Rapot::where('id_siswa', $request['id_siswa'])
                ->where('id_mapel', $value['id_mapel'])
                ->first();

            if ($existingRecord) {
                // Jika data rapot untuk siswa dan mapel ini sudah ada, lewati penyimpanan
                continue;
            }

            // Tentukan huruf nilai pengetahuan dan keterampilan
            $hurufP = $this->getGradeLetter($value['nilai_pengetahuan']);
            $hurufK = $this->getGradeLetter($value['nilai_keterampilan']);

            // Simpan data rapot
            Rapot::create([
                'id_siswa' => $request['id_siswa'],
                'id_mapel' => $value['id_mapel'],
                'id_wali_kelas' => Auth::id(),
                'nilai_pengetahuan' => $value['nilai_pengetahuan'],
                'huruf_pengetahuan' => $hurufP,
                'nilai_keterampilan' => $value['nilai_keterampilan'],
                'huruf_keterampilan' => $hurufK,
            ]);
        }

        // Notifikasi sukses
        $notification = array(
            'message' => 'Data rapot berhasil ditambahkan',
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('rapot.index')->with($notification);
        } else {
            return redirect()->route('rapot.create')->with($notification);
        }
    }

    // Fungsi untuk menentukan huruf nilai
    private function getGradeLetter($nilai)
    {
        if ($nilai >= 85) {
            return 'A';
        } else if ($nilai >= 75) {
            return 'B';
        } else {
            return 'C';
        }
    }


    // public function destroy(string $id)
    // {
    //     $rapot = Rapot::findOrFail($id);

    //     $rapot->delete();

    //     $notification = array(
    //         'message' => 'Data rapot berhasil dihapus!',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('rapot.index')->with($notification);
    // }

    public function destroy(string $id)
    {
        $rapot = Rapot::findOrFail($id);

        $rapot->delete();

        $notification = array(
            'message' => 'Data rapot berhasil dihapus!',
            'alert-type' => 'success'
        );

        return redirect()->route('rapot.index')->with($notification);
    }
}
