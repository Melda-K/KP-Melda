<?php

namespace App\Http\Controllers;

use App\Models\Rapot;
use Illuminate\Http\Request;

class RapotController extends Controller
{
    public function index()
    {
        $data['rapots'] = Rapot::get();
        return view('rapot.index', $data);
    }

    public function create()
    {
        $data['Rapot'] = Rapot::pluck('rapot', 'id');
        return view('rapot.create', $data);
    }

    public function store(Request $request)
    {
        $validate = $request->validate([
            'id_siswa' => 'required|max:100',
            'id_wali_kelas' => 'required|max:100',
            'pai' => 'required|max:100',
            'pkn' => 'required|max:100',
            'indo' => 'required|max:100',
            'mtk' => 'required|max:100',
            'ipa' => 'required|max:100',
            'ips' => 'required|max:100',
            'pjok' => 'required|max:100',
            'senbud' => 'required|max:100',
            'sunda' => 'required|max:100',
            'nilai_pengetahuan' => 'required|max:100',
            'huruf_pengetahuan' => 'required|max:100',
            'nilai_keterampilan' => 'required|max:100',
            'huruf_keterampilan' => 'required|max:100',
        ]);
        dd($validate);

        $rapot = Rapot::create([
            'id_siswa' => $validate['id_siswa'],
            'id_wali_kelas' => $validate['id_wali_kelas'],
            'pai' => $validate['pai'],
            'pkn' => $validate['pkn'],
            'indo' => $validate['indo'],
            'mtk' => $validate['mtk'],
            'ipa' => $validate['ipa'],
            'ips' => $validate['ips'],
            'pjok' => $validate['pjok'],
            'senbud' => $validate['senbud'],
            'sunda' => $validate['sunda'],
            'nilai_pengetahuan' => $validate['nilai_pengetahuan'],
            'huruf_pengetahuan' => $validate['nilai_pengetahuan'],
            'nilai_keterampilan' => $validate['nilai_keterampilan'],
            'huruf_keterampilan' => $validate['nilai_keterampilan'],
        ]);


        $notificaton = array(
            'message' => 'Data siswa berhasil ditambahkan',
            'alert-type' => 'success'
        );

        if ($request->save == true) {
            return redirect()->route('rapot.index')->with($notificaton);
        } else
            return redirect()->route('rapot.create')->with($notificaton);
    }
}
