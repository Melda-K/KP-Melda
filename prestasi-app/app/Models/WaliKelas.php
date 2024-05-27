<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WaliKelas extends Model
{
    use HasFactory;

    public function DataWaliKelas(): BelongsTo
    {
        return $this->belongsTo(DataWaliKelas::class);
    }
}
