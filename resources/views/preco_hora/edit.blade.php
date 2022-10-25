@extends('preco_hora.layout')

@section('titulo','Editar Preço/hora')

@section('conteudo')
<form action="{{ route('preco_hora.update',$dados['id']) }}" method="post">
    <fieldset>
        <legend>Editar Preço/hora</legend>
        @method("PATCH")
        @csrf

        @include('preco_hora.form')
    </fieldset>
</form>
@endsection