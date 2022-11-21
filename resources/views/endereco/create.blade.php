@extends('endereco.layout')

@section('titulo','Endereco')

@section('conteudo')
<form action="{{ route('endereco.store')}}" method="post">
    <fieldset>
        <legend>Cadastrar Endereco</legend>
        @method("POST")
        @csrf

        @include('endereco.form')
    </fieldset>
</form>
@endsection