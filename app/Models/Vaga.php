<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vaga extends Model
{
    use HasFactory;

    protected $fillable = ['numero'];

    public function operacoes()
    {
        return $this->hasMany('App\Models\Operacao');
    }
}
