@extends('endereco.layout')

@section('titulo','Editar Endereco')

@section('conteudo')
<form action="{{ route('endereco.update',$dados['id']) }}" method="post">
    <fieldset>
        <legend>Editar Endereco</legend>
        @method("PATCH")
        @csrf

        @include('endereco.form')
    </fieldset>
</form>
@endsection