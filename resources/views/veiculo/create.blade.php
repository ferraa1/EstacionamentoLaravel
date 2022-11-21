@extends('veiculo.layout')

@section('titulo','Veiculo')

@section('conteudo')
<form action="{{ route('veiculo.store')}}" method="post">
    <fieldset>
        <legend>Cadastrar Veiculo</legend>
        @method("POST")
        @csrf

        @include('veiculo.form')
    </fieldset>
</form>
@endsection