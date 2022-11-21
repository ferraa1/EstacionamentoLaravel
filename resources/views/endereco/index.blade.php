@extends('endereco.layout')

@section('titulo','Endereco')

@section('conteudo')

<form action="{{ route('endereco.index') }}" method="get">
  <fieldset>
    <legend>Consultar Enderecos</legend>
    @method('GET')
    <label for="find">Endereco</label>
    <br>
    <input type="text" name="find" id="find">
    <br>
    <br>
    <button class="btn btn-primary" type="submit">Consultar</button>
  </fieldset>
</form>
<br>
<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">ENDEREÇO</th>
      <th scope="col">NÚMERO</th>
      <th scope="col">CEP</th>
      <th scope="col">BAIRRO</th>
      <th scope="col">COMPLEMENTO</th>
      <th scope="col">CIDADE</th>
      <th scope="col">ESTADO</th>

      <th scope="col">EDITAR</th>
      <th scope="col">EXCLUIR</th>
    </tr>
  </thead>
  </tbody>
  @foreach ($dados as $item)
  <tr>
    <th scope="row">{{ $item->cliente_id }}</th>
    <td>{{ $item->endereco }}</td>
    <td>{{ $item->numero }}</td>
    <td>{{ $item->cep }}</td>
    <td>{{ $item->bairro }}</td>
    <td>{{ $item->complemento }}</td>
    <td>city</td>
    <td>state</td>

    <td><a href="{{ route('endereco.edit',$item->cliente_id) }}"><button class="btn btn-sm btn-secondary">Editar</button></a></td>
    <td>
      <form id="form_delete" name="form_delete" action="{{ route('endereco.destroy',$item->cliente_id) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este registro?')">
        @method('DELETE')
        @csrf
        <button class="btn btn-sm btn-secondary" type="submit">Excluir</button>
      </form>
    </td>
  </tr>
  @endforeach
  </tbody>
</table>
@endsection