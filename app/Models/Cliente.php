<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'usuario', 'senha', 'email', 'telefone', 'ativado'];

    public function endereco()
    {
        return $this->hasOne('App\Models\Endereco');
    }

    public function veiculos()
    {
        return $this->belongsToMany('App\Models\Veiculo', 'clientes_veiculos', 'cliente_id', 'veiculo_id')->withTimestamps();
    }
}
//https://laravel.com/docs/9.x/eloquent-relationships#many-to-many
//https://medium.com/@afrazahmad090/laravel-many-to-many-relationship-explained-822b554c1973
