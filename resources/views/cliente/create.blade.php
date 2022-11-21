@extends('cliente.layout')

@section('titulo','Cliente')

@section('conteudo')
<form action="{{ route('cliente.store')}}" method="post">
    <fieldset>
        <legend>Cadastrar Cliente</legend>
        @method("POST")
        @csrf

        @include('cliente.form')
    </fieldset>
</form>
@endsection