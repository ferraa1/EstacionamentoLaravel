@extends('operacao.layout')

@section('titulo','Editar Operacao')

@section('conteudo')
<form action="{{ route('operacao.update',$dados['id']) }}" method="post">
    <fieldset>
        <legend>Editar Operacao</legend>
        @method("PATCH")
        @csrf

        @include('operacao.form')
    </fieldset>
</form>
@endsection