@extends('operacao.layout')

@section('titulo','Operacao')

@section('conteudo')
<form action="{{ route('operacao.store')}}" method="post">
    <fieldset>
        <legend>Cadastrar Operacao</legend>
        @method("POST")
        @csrf

        @include('operacao.form')
    </fieldset>
</form>
@endsection