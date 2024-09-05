<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Akademik extends Model
{
    use HasFactory;
    protected $fillable = [
        "id_siswa",
        "jumlah_nilai_rapot",
        "ranking",
    ];
    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class,'id_siswa');
    }
    public function prestasi(): BelongsTo
    {
        return $this->belongsTo(prestasi::class);
    }

    // public function siswa()
    // {
    //     return $this->hasOne(Siswa::class, 'id');
    // }
}
