<label for="id">ID</label>
<br>
<input type="text" name="id" id="id" value="@if (isset($dados->id)) {{ $dados->id }} @endif" disabled>
<br>
<label for="nome">Nome</label>
<br>
<input type="text" name="nome" id="nome" value="@if (isset($dados->nome)) {{ $dados->nome }} @endif">
<br>
<label for="usuario">Usuário</label>
<br>
<input type="text" name="usuario" id="usuario" value="@if (isset($dados->usuario)) {{ $dados->usuario }} @endif">
<br>
<label for="senha">Senha</label>
<br>
<input type="password" name="senha" id="senha" value="">
<br>
<label for="email">Email</label>
<br>
<input type="text" name="email" id="email" value="@if (isset($dados->email)) {{ $dados->email }} @endif">
<br>
<label for="telefone">Telefone</label>
<br>
<input type="text" name="telefone" id="telefone" value="@if (isset($dados->telefone)) {{ $dados->telefone }} @endif">
<br>
<label for="cliente_id">ENDEREÇO CLIENTE_ID</label>
<br>
<input type="text" name="cliente_id" id="cliente_id" value="@if (isset($enderecos->cliente_id)) {{ $enderecos->cliente_id }} @endif" disabled>
<br>
<label for="endereco">Endereço</label>
<br>
<input type="text" name="endereco" id="endereco" value="@if (isset($enderecos->endereco)) {{ $enderecos->endereco }} @endif">
<br>
<label for="numero">Número</label>
<br>
<input type="text" name="numero" id="numero" value="@if (isset($enderecos->numero)) {{ $enderecos->numero }} @endif">
<br>
<label for="cep">CEP</label>
<br>
<input type="text" name="cep" id="cep" value="@if (isset($enderecos->cep)) {{ $enderecos->cep }} @endif">
<br>
<label for="bairro">Bairro</label>
<br>
<input type="text" name="bairro" id="bairro" value="@if (isset($enderecos->bairro)) {{ $enderecos->bairro }} @endif">
<br>
<label for="complemento">Complemento</label>
<br>
<input type="text" name="complemento" id="complemento" value="@if (isset($enderecos->complemento)) {{ $enderecos->complemento }} @endif">
<br>
<label for="cidade_id">Cidade</label>
<br>
<select required=true name="cidade_id" id="cidade_id">
    @foreach ($estados as $estado)
        <optgroup label="{{ $estado->sigla }}">
            @foreach ($cidades as $cidade)
                @if ($cidade->estado_id == $estado->id)
                    <option value="{{ $cidade->id }}" <?php if (isset($enderecos->cidade_id) && $cidade->id == $enderecos->cidade_id) { echo "selected"; } ?>>{{ $cidade->descricao }}</option>
                @endif
            @endforeach
        </optgroup>
    @endforeach
</select>
<br>
<br>
<label for="veiculoscb[]">Veículos</label>
<br>
@foreach ($veiculos as $veiculo)
<input type='checkbox' name='veiculoscb[{{ $veiculo->id }}]' value='{{ $veiculo->id }}' id='{{ $veiculo->placa }}'>{{ $veiculo->placa }}<br>
@endforeach
<br>
<input required=true type="checkbox" id="concordar" name="concordar" value="Concordo">
<label for="concordar">O usuário concorda com o armazenamento de seus dados no sistema.</label>
<br>
<br>
<button class="btn btn-primary" type="submit" name="acao" value="salvar" id="acao">@if(isset($dados->nome)) Editar @else Cadastrar @endif</button>