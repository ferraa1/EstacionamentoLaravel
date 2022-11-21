<label for="id">ID</label>
<br>
<input type="text" name="id" id="id" value="{{ $id }}" disabled>
<br>
<label for="veiculo_id">Veículo</label>
<br>
<select required=true name="veiculo_id" id="veiculo_id">
    @foreach ($veiculos as $veiculo)
        <option value="{{ $veiculo->id }}">{{ $veiculo->placa }}</option>
    @endforeach
</select>
<br>
<br>
<input type="text" name="method" id="method" value="{{ $method }}" hidden>
<button class="btn btn-primary" type="submit" name="acao" value="salvar" id="acao"><?php if ($method == "ADD") { echo "Adicionar";} else { echo "Remover";}?></button>