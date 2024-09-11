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
        // $data['rapots'] = Rapot::get();
        $rapot = Rapot::get();
        $siswa = Siswa::has('rapot')->with('rapot.mapel')->get();
        // return response()->json($siswa, 200);
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
        foreach ($request->form as $key => $value) {
            $hurufP = '';
            $hurufK = '';

            if ($value['nilai_pengetahuan'] >= 85) {
                $hurufP = 'A';
            } else if ($value['nilai_pengetahuan'] >= 75) {
                $hurufP = 'B';
            } else {
                $hurufP = 'C';
            };

            if ($value['nilai_pengetahuan'] >= 85) {
                $hurufK = 'A';
            } else if ($value['nilai_pengetahuan'] >= 75) {
                $hurufK = 'B';
            } else {
                $hurufK = 'C';
            };

            $rapot =  Rapot::create([
                'id_siswa' => $request['id_siswa'],
                'id_mapel' => $value['id_mapel'],
                'id_wali_kelas' => Auth::id(),
                'nilai_pengetahuan' => $value['nilai_pengetahuan'],
                'huruf_pengetahuan' => $hurufP,
                'nilai_keterampilan' => $value['nilai_keterampilan'],
                'huruf_keterampilan' => $hurufK,

            ]);
        }

        $notificaton = array(
            'message' => 'Data siswa berhasil ditambahkan',
            'alert-type' => 'success'
        );
        if ($request->save == true) {
            return redirect()->route('rapot.index')->with($notificaton);
        } else
            return redirect()->route('rapot.create')->with($notificaton);
    }

    // public function destroy(string $id)
    // {
    //     $rapot = Rapot::findOrFail($id);

    //     $rapot->delete();

    //     $notificaton = array(
    //         'message' => 'Data siswa berhasil dihapus!',
    //         'alert-type' => 'success'
    //     );

    //     return redirect()->route('rapot.index', $rapot)->with($notificaton);
    // }
    public function destroy(string $id)
    {
        $rapot = Rapot::findOrFail($id);

        $rapot->delete();

        $notification = array(
            'message' => 'Data siswa berhasil dihapus!',
            'alert-type' => 'success'
        );

        return redirect()->route('rapot.index')->with($notification);
    }
}
