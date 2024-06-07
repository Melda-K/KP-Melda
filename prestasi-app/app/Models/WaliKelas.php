<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\User;

class WaliKelas extends Model
{
    use HasFactory;
    protected $table='wali_kelas';
    
    protected $fillable = [
        'nip',
        'nama_guru',
        'guru_kelas',
        'jenis_kelamin',
        'id_user'
    ];

    public function walikelas(): BelongsTo
    {
        return $this->belongsTo(DataWaliKelas::class);
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'id_user');
    }
}
