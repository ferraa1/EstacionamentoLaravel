<?php

namespace App\Http\Controllers;

use App\Models\Veiculo;
use Illuminate\Http\Request;

class VeiculoController extends Controller
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
        //    $dados = Veiculo::where('placa', 'like', "$busca%")->get();
        //} else {
        //    $dados = Veiculo::all();
        //}
        //return view("veiculo.index", ['dados' => $dados]);
        $filtro = request()->input('filtro');
        $dados = Veiculo::where('placa','LIKE',$filtro.'%')->orderBy('placa')->paginate(5);
        return view('veiculo/index')->with('dados',$dados)->with('filtro',$filtro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('veiculo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Veiculo::create($request->all());
        return redirect()->route('veiculo.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function show(Veiculo $veiculo)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Veiculo::find($id);
        return view("veiculo.edit", ['dados' => $dados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Veiculo::find($id)->update($request->all());
        return redirect()->route('veiculo.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Veiculo  $veiculo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Veiculo::destroy($id);
        return redirect()->route('veiculo.index');
    }
}
