<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Veiculo extends Model
{
    use HasFactory;

    protected $fillable = ['placa'];

    public function operacoes() {
        return $this->hasMany('App\Models\Operacao');
    }

    public function clientes() {
    	return $this->belongsToMany('App\Models\Cliente','clientes_veiculos','veiculo_id','cliente_id')->withTimestamps();
    }
}
//https://laravel.com/docs/9.x/eloquent-relationships#many-to-many
//https://medium.com/@afrazahmad090/laravel-many-to-many-relationship-explained-822b554c1973