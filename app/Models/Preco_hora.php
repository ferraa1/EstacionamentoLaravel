<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preco_hora extends Model
{
    use HasFactory;

    protected $fillable = ['preco'];

    public function operacoes()
    {
        return $this->hasMany('App\Models\Operacao');
    }
}
