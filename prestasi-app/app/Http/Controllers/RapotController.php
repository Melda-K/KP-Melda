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
            'id_rapot' => 'required|max:100',
            'id_wali_kelas' => 'required|max:100',
            'id_siswa' => 'required|max:100',
            'id_mata_pelajaran' => 'required|max:100',

        ]);

        $rapot = Rapot::create([
            'id_rapot' => $validate['id_rapot'],
            'id_wali_kelas' => $validate['id_wali_kelas'],
            'id_siswa' => $validate['id_siswa'],
            'id_mata_pelajaran' => $validate['id_mata_pelajaran'],
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
