<?php

namespace App\Http\Controllers;

use App\Models\DataSiswa;
use App\Models\Rapot;
use App\Models\User;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SiswaController extends Controller
{
    public function index()
    {
        $data['siswas'] = Siswa::with('siswa')->get();
        return view('siswa.index', $data);
    }

    public function create()
    {
        $data['siswas'] = User::pluck('name', 'id');
        return view('siswa.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'nis' => 'required|max:255',
            'nama' => 'required|max:150',
            'kelas' => 'required|max:150',
            'jenis_kelamin' => 'required|max:100',
            'tahun_pelajaran' => 'required|max:100',
        ]);
        

        // $user = new User();
        // $user->name = $validate['nama_guru'];
        // $user->email = $validate['email'];
        // $user->password = Hash::make('Password2024');
        // $user->save();

        $siswa = Siswa::create([

            'nis' => $validate['nis'],
            'nama' => $validate['nama'],
            'kelas' => $validate['kelas'],
            'jenis_kelamin' => $validate['jenis_kelamin'],
            'tahun_pelajaran' => $validate['tahun_pelajaran'],
            // 'id_wali_kelas' => $wali_kelas->id,
        ]);

        // $wali_kelas->assignRole('Siswa');


        $notificaton = array(
            'message' => 'Data wali kelas berhasil ditambahkan!',
            'allert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('siswa.index')->with($notificaton);
        } else
            return redirect()->route('siswa.create')->with($notificaton);
    }

    public function edit(string $id)
    {
        $data['siswa'] = Siswa::findOrFail($id);
        $data['wali_kelas'] = Siswa::findOrFail($id);
        $data['rapot'] = Rapot::pluck('name', 'id');

        return view('siswa.edit', $data);
    }
    
    public function update(Request $request, string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $validate = $request->validate([
            'nis' => 'required|max:255',
            'nama' => 'required|max:255',
            'kelas' => 'required|max:150',
            'jenis_kelamin' => 'required|max:150',
            'tahun_pelajaran' => 'required|max:100',
        ]);

        // $user = new User();
        // $dataUpdateWaliKelas = [
        //     'nip' => $validate['nip'],
        //     'nama_guru' => $validate['nama_guru'],
        //     'guru_kelas' => $validate['guru_kelas'],
        //     'jenis_kelamin' => $validate['jenis_kelamin'],
        //     'id_user' => $user->id,
        // ];

        // $siswa = Siswa::findOrFail($id);
        // $user = User::find($siswa->id_user);

        // $user->name = $validate['nama'];
        // $user->email = $validate['email'];
        // $user->save();

        // $user->update([
        //     'email' => $validate['email'],
        //     'name' => $validate['nama_guru'],
        // ]);

        $siswa->update([
            'nis' => $validate['nis'],
            'nama' => $validate['nama'],
            'kelas' => $validate['kelas'],
            'jenis_kelamin' => $validate['jenis_kelamin'],
            'tahun_pelajaran' => $validate['tahun_pelajaran'],
            // 'id_wali_kelas' => $wali_kelas->id,
        ]);

        $notificaton = array(
            'message' => 'Data siswa berhasil ditambahkan!',
            'allert-type' => 'success'
        );

        return redirect()->route('siswa.index')->with($notificaton);
    }
    public function destroy(string $id)
    {
        $siswa = Siswa::findOrFail($id);

        $siswa->delete();

        $notificaton = array(
            'message' => 'Data siswa berhasil dihapus',
            'alert-type' => 'warning'
        );

        return redirect()->route('siswa')->with($notificaton);
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


