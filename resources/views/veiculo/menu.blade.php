<?php
    if (!isset($_SESSION))
        session_start();
?>
<br>
<div class="btn-group">
    <?php if ($_SESSION['tipo'] == 'funcionario') { ?>
        <a class="btn btn-primary" href="{{ route('vaga.index') }}" id="vaga">Vagas</a>
        <a class="btn btn-primary" href="{{ route('preco_hora.index') }}" id="preco_hora">Preço/Hora</a>
        <a class="btn btn-primary" href="{{ route('funcionario.index') }}" id="funcionario">Funcionários</a>
        <a class="btn btn-primary" href="{{ route('cliente.index') }}" id="cliente">Clientes</a>
        <a class="btn btn-primary" href="{{ route('veiculo.index') }}" id="veiculo">Veículos</a>
    <?php } ?>
    <a class="btn btn-primary" href="{{ route('operacao.index') }}" id="operacao">Operações</a>
    <form id="form_delete" name="form_delete" action="{{ route('ui.destroy',$_SESSION['id']) }}" method="post" onsubmit="return confirm('Tem certeza que deseja sair?')">
        @method('DELETE')
        @csrf
        <button class="btn btn-primary" type="submit" id="sair">Sair</button>
    </form>
</div>
<br>
<br>