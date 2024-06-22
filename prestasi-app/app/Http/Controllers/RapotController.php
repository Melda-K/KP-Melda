<?php

namespace App\Http\Controllers;

use App\Models\Rapot;
use Illuminate\Http\Request;

class RapotController extends Controller
{  
    public function index()
    {
        $data['rapots'] = Rapot::with('rapot')->get();
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
            'id_kriteria' => 'required|max:100',
            
        ]);
    }

}
