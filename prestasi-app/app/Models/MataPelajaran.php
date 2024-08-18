<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MataPelajaran extends Model
{
    use HasFactory;

    protected $table='mapels';
    
    protected $fillable = [
    
        'pai',
        'pkn',
        'indo',
        'mtk',
        'ipa',
        'ips',
        'pjok',
        'senbud',
        'sunda',
    ];
}
