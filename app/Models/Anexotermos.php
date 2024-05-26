<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anexotermos extends Model
{
    use HasFactory;


    protected $table = 'anexotermos';

    protected $fillable = [
        'arquivo'
    ];

    // public function Anexo(): BelongsTo {
    //     return $this->belongsTo(Termos::class, 'termos', 'id');
    // }
    public function termo()
    {
        return $this->belongsTo(Termos::class, 'termos_id'); // Especifique o nome da coluna do relacionamento
    }
    
}
