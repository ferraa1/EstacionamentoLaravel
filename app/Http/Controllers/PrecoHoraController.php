<?php

namespace App\Http\Controllers;

use App\Models\Preco_hora;
use Illuminate\Http\Request;

class PrecoHoraController extends Controller
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
        //    $dados = Preco_hora::where('preco', 'like', "$busca%")->get();
        //} else {
        //    $dados = Preco_hora::all();
        //}
        //return view("preco_hora.index", ['dados' => $dados]);
        $filtro = request()->input('find');
        $dados = Preco_hora::where('preco','LIKE',$filtro.'%')->orderBy('preco')->paginate(5);
        return view('preco_hora/index')->with('dados',$dados);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('preco_hora.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Preco_hora::create($request->all());
        return redirect()->route('preco_hora.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Preco_hora  $preco_hora
     * @return \Illuminate\Http\Response
     */
    public function show(Preco_hora $preco_hora)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Preco_hora  $preco_hora
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Preco_hora::find($id);
        return view("preco_hora.edit", ['dados' => $dados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Preco_hora  $preco_hora
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Preco_hora::find($id)->update($request->all());
        return redirect()->route('preco_hora.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Preco_hora  $preco_hora
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Preco_hora::destroy($id);
        return redirect()->route('preco_hora.index');
    }
}
