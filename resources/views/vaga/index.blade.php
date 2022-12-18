@extends('vaga.layout')

@section('titulo','Vaga')

@section('conteudo')

<form action="{{ route('vaga.index') }}" method="get">
  <fieldset>
    <legend>Consultar Vagas</legend>
    @method('GET')
    <label for="filtro">Número</label>
    <br>
    <input type="text" name="filtro" id="filtro">
    <br>
    <br>
    <button class="btn btn-primary" type="submit">Consultar</button>
  </fieldset>
</form>
<br>
<table class="table table-striped">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">NÚMERO</th>

      <th scope="col">EDITAR</th>
      <th scope="col">EXCLUIR</th>
    </tr>
  </thead>
  </tbody>
  @foreach ($dados as $item)
  <tr>
    <th scope="row">{{ $item->id }}</th>
    <td>{{ $item->numero }}</td>

    <td><a href="{{ route('vaga.edit',$item->id) }}"><button class="btn btn-sm btn-secondary">Editar</button></a></td>
    <td>
      <form id="form_delete" name="form_delete" action="{{ route('vaga.destroy',$item->id) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este registro?')">
        @method('DELETE')
        @csrf
        <button class="btn btn-sm btn-secondary" type="submit">Excluir</button>
      </form>
    </td>
  </tr>
  @endforeach
  </tbody>
</table>
{{ $dados->appends(array('filtro' => $filtro))->links() }}
@endsection