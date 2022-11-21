@extends('cliente.layout')

@section('titulo','Editar Cliente')

@section('conteudo')
<form action="{{ route('cliente.update', $id) }}" method="post">
    <fieldset>
        <legend>Editar Cliente</legend>
        @method("PATCH")
        @csrf

        @include('cliente.formvei')
    </fieldset>
</form>
@endsection