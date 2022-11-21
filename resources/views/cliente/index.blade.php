@extends('cliente.layout')

@section('titulo','Cliente')

@section('conteudo')

<form action="{{ route('cliente.index') }}" method="get">
  <fieldset>
    <legend>Consultar Clientes</legend>
    @method('GET')
    <label for="find">Nome</label>
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
      <th scope="col">NOME</th>
      <th scope="col">USUÁRIO</th>
      <th scope="col">EMAIL</th>
      <th scope="col">TELEFONE</th>
      <th scope="col">ENDEREÇO</th>
      <th scope="col">ATIVADO</th>
      <th scope="col">VEÍCULOS</th>

      <th scope="col">EDITAR</th>
      <th scope="col">EXCLUIR</th>
      <!--
      <th scope="col">+VEÍCULO</th>
      <th scope="col">-VEÍCULO</th>
      -->
    </tr>
  </thead>
  </tbody>
  @foreach ($dados as $item)
  <tr>
    <th scope="row">{{ $item->id }}</th>
    <td>{{ $item->nome }}</td>
    <td>{{ $item->usuario }}</td>
    <td>{{ $item->email }}</td>
    <td>{{ $item->telefone }}</td>
    @foreach ($enderecos as $endereco)
      @if ($item->id == $endereco->cliente_id)
        <td>
          {{ $endereco->endereco }}
          {{ $endereco->numero }}
          <br>
          {{ $endereco->cep }}
          {{ $endereco->bairro }}
          <br>
          {{ $endereco->complemento }}
          <br>
          @foreach ($cidades as $cidade)
            @if ($cidade->id == $endereco->cidade_id)
              {{ $cidade->descricao }}
              @foreach ($estados as $estado)
                @if ($estado->id == $cidade->estado_id)
                  {{ $estado->sigla }}
                @endif
              @endforeach
            @endif
          @endforeach
        </td>
      @endif
    @endforeach
    <td>{{ $item->ativado }}</td>
    <td>
      @foreach ($item->veiculos as $veiculo)
        {{ $veiculo->placa }}<br>
      @endforeach
    </td>

    <td><a href="{{ route('cliente.edit',$item->id) }}"><button class="btn btn-sm btn-secondary">Editar</button></a></td>
    <td>
      <form id="form_delete" name="form_delete" action="{{ route('cliente.destroy',$item->id) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este registro?')">
        @method('DELETE')
        @csrf
        <button class="btn btn-sm btn-secondary" type="submit">Excluir</button>
      </form>
    </td>
    <!--
    <td><a href="#"><button class="btn btn-sm btn-secondary">+Veículo</button></a></td>
    <td><a href="#"><button class="btn btn-sm btn-secondary">-Veículo</button></a></td>
    -->
  </tr>
  @endforeach
  </tbody>
</table>
@endsection