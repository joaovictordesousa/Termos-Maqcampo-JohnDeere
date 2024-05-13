<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Auxaparelho extends Model
{
    use HasFactory;

    protected $table = 'auxaparelho';

    protected $fillable = [
        'aparelho'
    ];

    public function Termos(): BelongsTo {
        return $this->belongsTo(Termos::class, 'termos', 'id');
    }
}
