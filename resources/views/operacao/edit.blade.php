@extends('vaga.layout')

@section('titulo','Editar Vaga')

@section('conteudo')
<form action="{{ route('vaga.update',$dados['id']) }}" method="post">
    <fieldset>
        <legend>Editar Vaga</legend>
        @method("PATCH")
        @csrf

        @include('vaga.form')
    </fieldset>
</form>
@endsection