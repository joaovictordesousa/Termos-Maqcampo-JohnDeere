<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SituacaoTermo extends Model
{
    use HasFactory;

    protected $table = "situacao_termo";

    protected $fillable = [
        "name"
    ];

    public function termos() {
        return $this->hasMany(Termos::class, 'situacao_termo_id', 'id');
    }
    
}
