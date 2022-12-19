<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes_veiculos extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'veiculo_id'];
}
