<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
    use HasFactory;

    protected $fillable = ['data_entrada','data_saida','funcionario_id','vaga_id','preco_hora_id','veiculo_id'];

    public function funcionario() {
        return $this->belongsTo('App\Models\Funcionario');
    }

    public function vaga() {
        return $this->belongsTo('App\Models\Vaga');
    }
    public function preco_hora() {
        return $this->belongsTo('App\Models\Preco_hora');
    }

    public function veiculo() {
        return $this->belongsTo('App\Models\Veiculo');
    }
}
