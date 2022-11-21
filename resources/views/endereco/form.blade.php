<label for="id">ID</label>
<br>
<input type="text" name="id" id="id" value="@if (isset($dados->id)) {{ $dados->id }} @endif" disabled>
<br>
<label for="endereco">Endereço</label>
<br>
<input type="text" name="endereco" id="endereco" value="@if (isset($dados->endereco)) {{ $dados->endereco }} @endif">
<br>
<label for="numero">Número</label>
<br>
<input type="text" name="numero" id="numero" value="@if (isset($dados->numero)) {{ $dados->numero }} @endif">
<br>
<label for="cep">CEP</label>
<br>
<input type="text" name="cep" id="cep" value="@if (isset($dados->cep)) {{ $dados->cep }} @endif">
<br>
<label for="bairro">Bairro</label>
<br>
<input type="text" name="bairro" id="bairro" value="@if (isset($dados->bairro)) {{ $dados->bairro }} @endif">
<br>
<label for="complemento">Complemento</label>
<br>
<input type="text" name="complemento" id="complemento" value="@if (isset($dados->complemento)) {{ $dados->complemento }} @endif">
<br>
<label for="cidade">Cidade</label>
<br>
<select required=true name="cidade" id="cidade">
    @foreach ($estados as $estado)
        <optgroup label="{{ $estado->sigla }}">
            @foreach ($cidades as $cidade)
                <option value="{{ $cidade->id }}">{{ $cidade->descricao }}</option>
            @endforeach
        </optgroup>
    @endforeach
</select>
<br>
<br>
<button class="btn btn-primary" type="submit" name="acao" value="salvar"id="acao">@if(isset($dados->endereco)) Editar @else Cadastrar @endif</button>