<?php

namespace App\Http\Controllers;

use App\Models\Operacao;
use Illuminate\Http\Request;
use App\Models\Vaga;
use App\Models\Veiculo;
use App\Models\Funcionario;
use App\Models\Preco_hora;

class OperacaoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!isset($_SESSION))
            session_start();
        //$dados = array();
        //if (request('find') != null) {
        //    $busca = request('find');
        //    $dados = Operacao::where('data_entrada', 'like', "$busca%")->get();
        //} else {
        //    $dados = Operacao::all();
        //}
        $vagas = Vaga::all();
        $veiculos = Veiculo::all();
        $funcionarios = Funcionario::all();
        $preco_horas = Preco_hora::all();
        //return view("operacao.index", ['dados' => $dados, 'vagas' => $vagas, 'veiculos' => $veiculos, 'funcionarios' => $funcionarios, 'preco_horas' => $preco_horas]);
        $filtro = request()->input('filtro');
        $dados = Operacao::where('data_entrada','LIKE',$filtro.'%')->orderBy('data_entrada')->paginate(5);
        return view('operacao/index')->with('dados',$dados)->with('vagas',$vagas)->with('veiculos',$veiculos)->with('funcionarios',$funcionarios)->with('preco_horas',$preco_horas)->with('filtro',$filtro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $operacao = Operacao::select('vaga_id')->where('data_saida', 'is null')->get();
        $vagas = Vaga::whereNotIn('id', $operacao)->get();
        $operacao = Operacao::select('veiculo_id')->where('data_saida', 'is null')->get();
        $veiculos = Veiculo::whereNotIn('id', $operacao)->get();
        return view('operacao.create', ['vagas' => $vagas, 'veiculos' => $veiculos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (!isset($_SESSION))
            session_start();
        $request['data_entrada'] = date('Y-m-d H:i:s');
        $request['data_saida'] = null;
        $request['funcionario_id'] = $_SESSION['id'];
        $preco_hora = Preco_hora::orderBy('id', 'desc')->first();
        $request['preco_hora_id'] = $preco_hora->id;
        Operacao::create($request->all());
        return redirect()->route('operacao.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Operacao  $operacao
     * @return \Illuminate\Http\Response
     */
    public function show(Operacao $operacao)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Operacao  $operacao
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (!isset($_SESSION))
            session_start();
        $dados = Operacao::find($id);
        $operacao = Operacao::select('vaga_id')->where('data_saida', 'is null')->get();
        $vagas = Vaga::whereNotIn('id', $operacao)->get();
        $operacao = Operacao::select('veiculo_id')->where('data_saida', 'is null')->get();
        $veiculos = Veiculo::whereNotIn('id', $operacao)->get();
        return view("operacao.edit", ['dados' => $dados, 'vagas' => $vagas, 'veiculos' => $veiculos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Operacao  $operacao
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        if (!isset($_SESSION))
            session_start();
        $request['funcionario_id'] = $_SESSION['id'];
        $preco_hora = Preco_hora::orderBy('id', 'desc')->first();
        $request['preco_hora_id'] = $preco_hora->id;
        Operacao::find($id)->update($request->all());
        return redirect()->route('operacao.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Operacao  $operacao
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //if (isset($_POST['_method'])) {
            //if ($_POST['_method'] == "DELETE") {
        $operacao = Operacao::find($id);
        if ($operacao['data_saida'] != null) {
                Operacao::destroy($id);
        } else {
            //} else if ($_POST['_method'] == "PATCH") {
                //$operacao = Operacao::find($id);
                $dataSaida = date('Y-m-d H:i:s');
                $operacao->update(['data_saida' => $dataSaida]);
            //}
        //}
        }
        return redirect()->route('operacao.index');
    }
/*
    public function sair($id)
    {
        $dados = Operacao::find($id);
        $vagas = Vaga::all();
        $veiculos = Veiculo::all();
        return view("operacao.exit", ['dados' => $dados, 'vagas' => $vagas, 'veiculos' => $veiculos]);
    }

    public function finish(Request $request, $id)
    {
        $operacao = Operacao::find($id);
        $preco_hora = Preco_hora::orderBy('id', 'desc')->first();
        $dataSaida = date('Y-m-d H:i:s');
        $entrada = date('Y-m-d H:i:s', strtotime($operacao->data_entrada));
        $horas = ($dataSaida - $entrada) / (60*60*1000);
        $total = $horas * $preco_hora['preco'];
        $operacao->update(['data_saida' => $dataSaida, 'preco' => $total]);
        return redirect()->route('operacao.index');
    }
    */
}