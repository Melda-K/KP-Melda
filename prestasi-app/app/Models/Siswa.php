<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Siswa extends Model
{
    use HasFactory;
    protected $table='siswas';
    
    protected $fillable = [
        'nis',
        'nama_siswa',
        'kelas',
        'jenis_kelamin',
        'tahun_pelajaran',
        'id_wali_kelas',
    ];

    public function walikelas(): BelongsTo
    {
        return $this->belongsTo(WaliKelas::class, 'id_wali_kelas');
    }
}
