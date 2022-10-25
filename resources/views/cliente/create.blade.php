@extends('vaga.layout')

@section('titulo','Vaga')

@section('conteudo')
<form action="{{ route('vaga.store')}}" method="post">
    <fieldset>
        <legend>Cadastrar Vaga</legend>
        @method("POST")
        @csrf

        @include('vaga.form')
    </fieldset>
</form>
@endsection