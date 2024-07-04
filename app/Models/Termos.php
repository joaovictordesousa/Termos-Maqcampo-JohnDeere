<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Termos extends Model
{
    use HasFactory;

    protected $table = 'termos';

    protected $fillable = [
        'usuario',
        'filial',
        'cpf',
        'serie',
        'auxaparelho',
        'modelo',
        'anexo'
    ];

    public function Aparelho(): BelongsTo  {
        return $this->belongsTo(Auxaparelho::class, 'auxaparelho', 'id');
    }

    public function situacaoTermo(): BelongsTo {
        return $this->belongsTo(SituacaoTermo::class, 'situacao_termo_id', 'id');
    }
    
 

}
