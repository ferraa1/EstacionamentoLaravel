<?php

namespace App\Http\Controllers;

use App\Models\Cidade;
use App\Models\Endereco;
use App\Models\Estado;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! isset($_SESSION)) {
            session_start();
        }
        $dados = [];
        if (request('find') != null) {
            $busca = request('find');
            $dados = Endereco::where('endereco', 'like', "$busca%")->get();
        } else {
            $dados = Endereco::all();
        }
        $cidades = Cidade::all();
        $estados = Estado::all();

        return view('endereco.index', ['dados' => $dados, 'cidades' => $cidades, 'estados' => $estados]);
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

        return view('endereco.create', ['cidades' => $cidades, 'estados' => $estados]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Endereco::create($request->all());

        return redirect()->route('endereco.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function show(Endereco $endereco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dados = Endereco::find($id);
        $cidades = Cidade::all();
        $estados = Estado::all();

        return view('endereco.edit', ['dados' => $dados, 'cidades' => $cidades, 'estados' => $estados]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        Endereco::find($id)->update($request->all());

        return redirect()->route('endereco.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Endereco::destroy($id);

        return redirect()->route('endereco.index');
    }
}
