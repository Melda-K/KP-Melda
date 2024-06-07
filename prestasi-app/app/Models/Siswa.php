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
        'nip',
        'nama_guru',
        'guru_kelas',
        'jenis_kelamin',
        'tahun_pelajaran',
        'id_user'
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(WaliKelas::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_wali_kelas');
    }
}
