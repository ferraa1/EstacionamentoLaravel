<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;
use App\Models\Endereco;
use App\Models\Cidade;
use App\Models\Estado;
use App\Models\Veiculo;

class ClienteController extends Controller
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
        //    $dados = Cliente::where('nome', 'like', "$busca%")->get();
        //} else {
        //    $dados = Cliente::all();
        //}
        $enderecos = Endereco::all();
        $cidades = Cidade::all();
        $estados = Estado::all();
        //return view("cliente.index", ['dados' => $dados, 'cidades' => $cidades, 'estados' => $estados, 'enderecos' => $enderecos]);
        $filtro = request()->input('filtro');
        $dados = Cliente::where('nome','LIKE',$filtro.'%')->orderBy('nome')->paginate(5);
        return view('cliente/index')->with('dados',$dados)->with('cidades',$cidades)->with('estados',$estados)->with('enderecos',$enderecos)->with('filtro',$filtro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cidades = Cidade::all();
        $estados = Estado::all();
        $veiculos = Veiculo::all();
        return view('cliente.create', ['cidades' => $cidades, 'estados' => $estados, 'veiculos' => $veiculos]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request['senha'] = sha1($request['senha']);
        $request['ativado'] = 1;
        Cliente::create($request->all());
        $cliente = Cliente::orderBy('id', 'desc')->first();
        //$request['cliente_id'] = $cliente['id'];

        //Endereco::create(['cliente_id' => $cliente['id'], 'endereco' => $request['endereco'], 'numero' => $request['numero'], 'cep' => $request['cep'], 'bairro' => $request['bairro'], 'complemento' => $request['complemento'], 'cidade_id' => $request['cidade_id']]);

        $endereco = new Endereco;
        $endereco->cliente_id = $cliente->id;
        $endereco->endereco = $request->endereco;
        $endereco->numero = $request->numero;
        $endereco->cep = $request->cep;
        $endereco->bairro = $request->bairro;
        $endereco->complemento = $request->complemento;
        $endereco->cidade_id = $request->cidade_id;
        $endereco->save();

        if (isset($request['veiculoscb'])) {
            $veiculos[] = $request['veiculoscb'];
            //TODO:detach all
            foreach ($veiculos as $item) {
                $cliente->veiculos()->attach($item);
            }
        }

        return redirect()->route('cliente.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function show(Cliente $cliente)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //if (isset($_POST['_method']) && ($_POST['_method'] == "ADD" || $_POST['_method'] == "SUB")) {
            //$veiculos = Veiculo::all();
            //return view("cliente.editvei", ['id' => $id, "method" => $_POST['_method'], 'veiculos' => $veiculos]);
        //}
        $dados = Cliente::find($id);
        $enderecos = Endereco::where('cliente_id', $id)->first();
        $cidades = Cidade::all();
        $estados = Estado::all();
        $veiculos = Veiculo::all();
        return view("cliente.edit", ['dados' => $dados, 'cidades' => $cidades, 'estados' => $estados, 'enderecos' => $enderecos, 'veiculos' => $veiculos]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //if (isset($request['method'])) {
            //if ($request['method'] == "ADD") {
                //$cliente = Cliente::find($id);
                //$cliente->veiculos()->attach($request['veiculo_id']);
            //} elseif ($request['method'] == "SUB") {
                //$cliente = Cliente::find($id);
                //$cliente->veiculos()->detach($request['veiculo_id']);
            //}
        //} else {
            $request['senha'] = sha1($request['senha']);
            Cliente::find($id)->update($request->all());
            Endereco::where('cliente_id', $id)->update(['endereco' => $request['endereco'], 'numero' => $request['numero'], 'cep' => $request['cep'], 'bairro' => $request['bairro'], 'complemento' => $request['complemento'], 'cidade_id' => $request['cidade_id']]);
        //}
        return redirect()->route('cliente.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cliente  $cliente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //if (isset($_POST['_method'])) {
            //if ($_POST['_method'] == "DELETE") {
                Endereco::where('cliente_id', $id)->delete();
                Cliente::find($id)->delete();
                return redirect()->route('cliente.index');
            //} else {
                //$veiculos = Veiculo::all();
                //return view("cliente.editvei", ['id' => $id, "method" => $_POST['_method'], 'veiculos' => $veiculos]);
            //}
        //}
    }
    /*
    public static function login($usuario, $senha)
    {
        foreach (Cliente::all() as $target) {
            if ($target['usuario'] == $usuario && $target['senha'] == sha1($senha)){
                return $target;
                break;
            }
        }
    }
    */
}
