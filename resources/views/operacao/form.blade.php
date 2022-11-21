<label for="id">ID</label>
<br>
<input type="text" name="id" id="id" value="@if (isset($dados->id)) {{ $dados->id }} @endif" disabled>
<br>
<label for="vaga_id">Vaga</label>
<br>
<select required=true name="vaga_id" id="vaga_id">
    @foreach ($vagas as $vaga)
        <option value="{{ $vaga->id }}" >{{ $vaga->numero }}</option>
    @endforeach
</select>
<br>
<label for="veiculo_id">Veículo</label>
<br>
<select required=true name="veiculo_id" id="veiculo_id">
    @foreach ($veiculos as $veiculo)
    <option value="{{ $veiculo->id }}" >{{ $veiculo->placa }}</option>
    @endforeach
</select>
<br>
<br>
<button class="btn btn-primary" type="submit" name="acao" value="salvar"id="acao">@if(isset($dados->vaga_id)) Editar @else Cadastrar @endif</button>