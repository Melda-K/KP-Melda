<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\MataPelajaran;
use App\Models\Rapot;
use App\Models\User;
use App\Models\Siswa;
use App\Models\WaliKelas;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class SiswaController extends Controller
{
    public function index()
    {
        // $data['siswas'] = Siswa::all();
        // return view('siswa.index', $data);
        if (Auth::check()) {
            foreach (Auth::user()->roles as $role) {
                if ($role->name == 'WaliKelas') {
                    $userId = Auth::id();

                    $wali_kelas = \App\Models\WaliKelas::where('id_user', $userId)->first();

                    if ($wali_kelas) {
                        $siswas = Siswa::where('id_wali_kelas', $wali_kelas->id)->get();
                    } else {
                        $siswas = collect();
                    }

                    return view('siswa.index', ['siswas' => $siswas]);
                } else {
                    $data['siswas'] = Siswa::get();

                    return view('siswa.index', $data);
                }
            }
        }
    }

    public function create()
    {
        $data['siswas'] = Siswa::pluck('name', 'id');
        return view(
            'siswa.create',
            $data
        );
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nama_siswa' => 'required|max:150',
            'nis' => 'required|max:255',
            'ttl' => 'required|max:150',
            'jenis_kelamin' => 'required|max:100',
            'agama' => 'required|max:100',
            'pendik_sebelumnya' => 'max:100',
            'jmlh_sodara' => 'max:100',
            'alamat' => 'required|max:100',
            'nama_ayah' => 'max:100',
            'nama_ibu' => 'max:100',
            'pekerjaan_ayah' => 'max:100',
            'pekerjaan_ibu' => 'max:100',
            'wali_siswa' => 'max:100',
            'kelas' => 'required|max:150',
            'tahun_pelajaran' => 'required|max:100',
            'id_wali_kelas' => 'required|max:100',
        ]);

        $siswa = Siswa::create([

            'nama_siswa' => $validate['nama_siswa'],
            'nis' => $validate['nis'],
            'ttl' => $validate['ttl'],
            'jenis_kelamin' => $validate['jenis_kelamin'],
            'agama' => $validate['agama'],
            'pendik_sebelumnya' => $validate['pendik_sebelumnya'],
            'jmlh_sodara' => $validate['jmlh_sodara'],
            'alamat' => $validate['alamat'],
            'nama_ayah' => $validate['nama_ayah'],
            'nama_ibu' => $validate['nama_ibu'],
            'pekerjaan_ayah' => $validate['pekerjaan_ayah'],
            'pekerjaan_ibu' => $validate['pekerjaan_ibu'],
            'wali_siswa' => $validate['wali_siswa'],
            'kelas' => $validate['kelas'],
            'tahun_pelajaran' => $validate['tahun_pelajaran'],
            'id_wali_kelas' => $validate['id_wali_kelas'],
        ]);


        $notificaton = array(
            'message' => 'Data siswa berhasil ditambahkan!',
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('siswa.index')->with($notificaton);
        } else
            return redirect()->route('siswa.create')->with($notificaton);
    }

    public function edit(string $id)
    // {
    //     $data['siswa'] = Siswa::findOrFail($id);
    //     $data['wali_kelas'] = Siswa::findOrFail($id);
    //     $data['rapot'] = Rapot::pluck('name', 'id');

    //     return view('siswa.edit', $data);
    // }
    {
        // Mengambil data siswa berdasarkan ID
        $data['siswa'] = Siswa::findOrFail($id);

        // Mengambil semua data siswa untuk digunakan dalam perulangan pada blade
        $data['siswas'] = Siswa::all();

        // Mengambil data wali kelas (asumsi mengambil wali_kelas dari model WaliKelas, sesuaikan jika berbeda)
        $data['wali_kelas'] = WaliKelas::pluck('name', 'id');

        // Mengambil data rapot
        $data['rapot'] = Rapot::pluck('name', 'id');

        return view('siswa.edit', $data);
    }

    public function update(Request $request, string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $validate = $request->validate([

            'nama_siswa' => 'required|max:150',
            'nis' => 'required|max:255',
            'ttl' => 'required|max:150',
            'jenis_kelamin' => 'required|max:100',
            'agama' => 'required|max:100',
            'pendik_sebelumnya' => 'max:100',
            'jmlh_sodara' => 'max:100',
            'alamat' => 'required|max:100',
            'nama_ayah' => 'max:100',
            'nama_ibu' => 'max:100',
            'pekerjaan_ayah' => 'max:100',
            'pekerjaan_ibu' => 'max:100',
            'wali_siswa' => 'max:100',
            'kelas' => 'required|max:150',
            'tahun_pelajaran' => 'required|max:100',
            'id_wali_kelas' => 'required|max:100',
        ]);

        $siswa->update([

            'nama_siswa' => $validate['nama_siswa'],
            'nis' => $validate['nis'],
            'ttl' => $validate['ttl'],
            'jenis_kelamin' => $validate['jenis_kelamin'],
            'agama' => $validate['agama'],
            'pendik_sebelumnya' => $validate['pendik_sebelumnya'],
            'jmlh_sodara' => $validate['jmlh_sodara'],
            'alamat' => $validate['alamat'],
            'nama_ayah' => $validate['nama_ayah'],
            'nama_ibu' => $validate['nama_ibu'],
            'pekerjaan_ayah' => $validate['pekerjaan_ayah'],
            'pekerjaan_ibu' => $validate['pekerjaan_ibu'],
            'wali_siswa' => $validate['wali_siswa'],
            'kelas' => $validate['kelas'],
            'tahun_pelajaran' => $validate['tahun_pelajaran'],
            'id_wali_kelas' => $validate['id_wali_kelas'],
        ]);

        $notificaton = array(
            'message' => 'Data siswa berhasil diperbaharui!',
            'alert-type' => 'success'
        );

        return redirect()->route('siswa.index')->with($notificaton);
    }
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        $notificaton = array(
            'message' => 'Data siswa berhasil dihapus!',
            'alert-type' => 'success'
        );

        return redirect()->route('siswa.index')->with($notificaton);
    }

    public function filter(Request $request)
    {
        $kelas = $request->input('kelas');
        $siswas = Siswa::where('kelas', $kelas)->get();

        return view('siswa.filter', compact('siswas'));
    }

    public function show($nis): JsonResponse
    {
        $siswa = Siswa::where('id', $nis)->first();

        if ($siswa) {
            return response()->json([
                'id' => $siswa->id,
                'nama_siswa' => $siswa->nama_siswa,
                'kelas' => $siswa->kelas,
                'tahun_pelajaran' => $siswa->tahun_pelajaran
            ]);
        } else {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
    }

    public function searchSiswa(Request $request)
    {
        $nis = $request->input('id_siswa');
        $siswa = Siswa::where('nis', $nis)->first();

        if ($siswa) {
            return response()->json([
                'nama_siswa' => $siswa->nama_siswa,
                'kelas' => $siswa->kelas,
                'tahun_pelajaran' => $siswa->tahun_pelajaran,
            ]);
        } else {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
    }
}
