<label for="id">ID</label>
<br>
<input type="text" name="id" id="id" value="@if (isset($dados->id)) {{ $dados->id }} @endif" disabled>
<br>
<label for="numero">Número</label>
<br>
<input type="text" name="numero" id="numero" value="@if (isset($dados->numero)) {{ $dados->numero }} @endif">
<br>
<br>
<button class="btn btn-primary" type="submit" name="acao" value="salvar"id="acao">@if(isset($dados->numero)) Editar @else Cadastrar @endif</button>