<label for="id">ID</label>
<br>
<input type="text" name="id" id="id" value="@if (isset($dados->id)) {{ $dados->id }} @endif" disabled>
<br>
<label for="placa">Placa</label>
<br>
<input type="text" name="placa" id="placa" value="@if (isset($dados->placa)) {{ $dados->placa }} @endif">
<br>
<br>
<button class="btn btn-primary" type="submit" name="acao" value="salvar"id="acao">@if(isset($dados->placa)) Editar @else Cadastrar @endif</button>