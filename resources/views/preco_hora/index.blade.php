@extends('preco_hora.layout')

@section('titulo','Preço/hora')

@section('conteudo')

<form action="{{ route('preco_hora.index') }}" method="get">
  <fieldset>
    <legend>Consultar Preço/horas</legend>
    @method('GET')
    <label for="filtro">Preço</label>
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
      <th scope="col">PREÇO</th>

      <th scope="col">EDITAR</th>
      <th scope="col">EXCLUIR</th>
    </tr>
  </thead>
  </tbody>
  @foreach ($dados as $item)
  <tr>
    <th scope="row">{{ $item->id }}</th>
    <td>
      <?php echo "R$";?>
      {{ $item->preco }}
    </td>

    <td><a href="{{ route('preco_hora.edit',$item->id) }}"><button class="btn btn-sm btn-secondary">Editar</button></a></td>
    <td>
      <form id="form_delete" name="form_delete" action="{{ route('preco_hora.destroy',$item->id) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este registro?')">
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