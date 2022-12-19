<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Operacao extends Model
{
    use HasFactory;

    protected $fillable = ['data_entrada', 'data_saida', 'funcionario_id', 'vaga_id', 'preco_hora_id', 'veiculo_id'];

    public function funcionario()
    {
        return $this->belongsTo('App\Models\Funcionario');
    }

    public function vaga()
    {
        return $this->belongsTo('App\Models\Vaga');
    }

    public function preco_hora()
    {
        return $this->belongsTo('App\Models\Preco_hora');
    }

    public function veiculo()
    {
        return $this->belongsTo('App\Models\Veiculo');
    }

    /*
    public function sair($id) {
        $operacao = Operacao::find($id);
        $operacao->update(['data_saida' => date('Y-m-d H:i:s')]);
        //$stmt = $pdo->prepare('UPDATE operacao SET data_saida = :dataSaida WHERE id = :id');
        //$stmt->bindParam(':dataSaida', $dataSaida, PDO::PARAM_STR);
        //$stmt->bindParam(':id', $id, PDO::PARAM_INT);
        //$dataSaida = date('Y-m-d H:i:s');
        //$stmt->execute();
        header("location:../index.php?selectedClass=operacao");
    }
    */
}
