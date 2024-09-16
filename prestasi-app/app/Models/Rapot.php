<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Rapot extends Model
{
    use HasFactory;
    protected $tabel="rapots";

    protected $fillable = [
        'id_siswa',
        'id_wali_kelas',
        'id_mapel',
        'nilai_pengetahuan',
        'huruf_pengetahuan',
        'nilai_keterampilan',
        'huruf_keterampilan',
    ];

    public function siswa(): BelongsTo
    {
        return $this->belongsTo(Siswa::class, "id_siswa", "id");

    }
    // public function walikelas(): BelongsTo
    // {
    //     return $this->belongsTo(WaliKelas::class, "id_wali_kelas");
    // }
    /**
     * Get all of the mapel for the Rapot
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mapel()
    {
        return $this->hasMany(MataPelajaran::class, 'id', 'id_mapel');
    }
}
