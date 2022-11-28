<?php

namespace App\Http\Controllers;

use App\Models\Vaga;
use Illuminate\Http\Request;

class VagaController extends Controller
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
        //    $dados = Vaga::where('numero', 'like', "$busca%")->get();
        //} else {
        //    $dados = Vaga::all();
        //}
        //Vaga::paginate(5);
        //return view("vaga.index", ['dados' => $dados]);
        $filtro = request()->input('filtro');
        $dados = Vaga::where('numero','LIKE',$filtro.'%')->orderBy('numero')->paginate(5);
        return view('vaga/index')->with('dados',$dados)->with('filtro',$filtro);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vaga.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Vaga::create($request->all());
        return redirect()->route('vaga.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function show(Vaga $vaga)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Vaga::find($id);
        return view("vaga.edit", ['dados' => $dados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Vaga::find($id)->update($request->all());
        return redirect()->route('vaga.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Vaga  $vaga
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Vaga::destroy($id);
        //var_dump($_POST);
        return redirect()->route('vaga.index');
    }
}
