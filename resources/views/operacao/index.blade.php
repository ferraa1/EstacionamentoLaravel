@extends('operacao.layout')

@section('titulo','Operacao')

@section('conteudo')

<form action="{{ route('operacao.index') }}" method="get">
  <fieldset>
    <legend>Consultar Operacoes</legend>
    @method('GET')
    <label for="filtro">Data de Entrada</label>
    <br>
    <input type="text" name="filtro" id="filtro">
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
      <th scope="col">DATA DE ENTRADA</th>
      <th scope="col">DATA DE SAÍDA</th>
      <th scope="col">FUNCIONARIO</th>
      <th scope="col">VAGA</th>
      <th scope="col">PREÇO/HORA</th>
      <th scope="col">VEÍCULO</th>
      <th scope="col">PREÇO</th>

      <?php if ($_SESSION['tipo'] == 'funcionario') { ?>
      <th scope="col">EDITAR</th>
      <th scope="col">EXCLUIR</th>
      <th scope="col">SAIR</th>
      <?php }?>
    </tr>
  </thead>
  </tbody>
  @foreach ($dados as $item)
  <tr>
    <th scope="row">{{ $item->id }}</th>
    <td>{{ $item->data_entrada }}</td>
    <td>{{ $item->data_saida }}</td>
    <td>
      @foreach ($funcionarios as $subItem)
        @if ($item->funcionario_id == $subItem->id)
          {{  $subItem->nome  }}
          @break
        @endif
      @endforeach
    </td>
    <td>
      @foreach ($vagas as $subItem)
        @if ($item->vaga_id == $subItem->id)
          {{  $subItem->numero  }}
          @break
        @endif
      @endforeach
    </td>
    <td>
      <?php $preco_hora = 0;?>
      @foreach ($preco_horas as $subItem)
        @if ($item->preco_hora_id == $subItem->id)
          {{  $subItem->preco  }}
          <?php $preco_hora = $subItem->preco;?>
          @break
        @endif
      @endforeach
    </td>
    <td>
      @foreach ($veiculos as $subItem)
        @if ($item->veiculo_id == $subItem->id)
          {{  $subItem->placa  }}
          @break
        @endif
      @endforeach
    </td>
    <td>
      <?php
        if ($item->data_saida != null) {
          $entrada = strtotime($item->data_entrada);
          $dataSaida = strtotime($item->data_saida);
          $horas = ($dataSaida - $entrada) / 3600;
          $total = $horas * $preco_hora;
          $totalFormat = number_format($total,2,',','.');
          echo "R$ $totalFormat";
        } else {
          echo "";
        }
      ?>
    </td>
    <?php if ($_SESSION['tipo'] == 'funcionario') { ?>
    <td><a href="{{ route('operacao.edit',$item->id) }}"><button class="btn btn-sm btn-secondary">Editar</button></a></td>
    <td>
      <form id="form_delete" name="form_delete" action="{{ route('operacao.destroy',$item->id) }}" method="post" onsubmit="return confirm('Tem certeza que deseja excluir este registro?')">
        @method('DELETE')
        @csrf
        <button class="btn btn-sm btn-secondary" type="submit">Excluir</button>
      </form>
    </td>
    <td>
      <form id="form_delete" name="form_delete" action="{{ route('operacao.destroy',$item->id) }}" method="post" onsubmit="return confirm('Tem certeza que deseja encerrar este registro?')">
        @method('DELETE')
        @csrf
        <button class="btn btn-sm btn-secondary" type="submit" <?php if ($item->data_saida != null) echo "disabled";?> >Sair</button>
      </form>
    </td>
    <?php }?>
  </tr>
  @endforeach
  </tbody>
</table>
{{ $dados->appends(array('filtro' => $filtro))->links() }}
@endsection