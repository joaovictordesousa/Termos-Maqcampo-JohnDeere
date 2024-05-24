<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anexotermo extends Model
{
    use HasFactory;


    protected $table = 'anexotermo';

    protected $fillable = [
        'arquivo'
    ];

    // public function Anexo(): BelongsTo {
    //     return $this->belongsTo(Termos::class, 'termos', 'id');
    // }
}
