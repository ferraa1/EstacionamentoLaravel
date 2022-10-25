@extends('preco_hora.layout')

@section('titulo','Preço/hora')

@section('conteudo')
<form action="{{ route('preco_hora.store')}}" method="post">
    <fieldset>
        <legend>Cadastrar Preço/hora</legend>
        @method("POST")
        @csrf

        @include('preco_hora.form')
    </fieldset>
</form>
@endsection