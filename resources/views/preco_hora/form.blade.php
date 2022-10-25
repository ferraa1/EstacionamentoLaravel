<label for="id">ID</label>
<br>
<input type="text" name="id" id="id" value="@if (isset($dados->id)) {{ $dados->id }} @endif" disabled>
<br>
<label for="preco">Preço</label>
<br>
<input type="text" name="preco" id="preco" value="@if (isset($dados->preco)) {{ $dados->preco }} @endif">
<br>
<br>
<button class="btn btn-primary" type="submit" name="acao" value="salvar"id="acao">@if(isset($dados->preco)) Editar @else Cadastrar @endif</button>