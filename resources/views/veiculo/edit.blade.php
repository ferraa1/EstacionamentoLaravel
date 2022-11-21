@extends('veiculo.layout')

@section('titulo','Editar Veiculo')

@section('conteudo')
<form action="{{ route('veiculo.update',$dados['id']) }}" method="post">
    <fieldset>
        <legend>Editar Veiculo</legend>
        @method("PATCH")
        @csrf

        @include('veiculo.form')
    </fieldset>
</form>
@endsection