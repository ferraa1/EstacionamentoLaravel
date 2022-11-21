<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <title>Estacionamento</title>
    <script>
        function sairOperacao(url, entrada, preco) {
            var saida = new Date();
            var entrada = new Date(Date.parse(entrada));
            var horas = Math.abs(saida - entrada) / (60 * 60 * 1000);
            var total = horas * preco;
            if (confirm("Finalizar operação?\nPreço: R$" + total.toFixed(2)))
                location.href = url;
        }
    </script>
</head>

<body>
    <?php //echo var_dump($_SESSION); ?>
    <div class="container text-center my-5 p-5 rounded shadow-lg">
        <h1>Menu</h1>
        <h2>Olá, <?=$_SESSION['nome']?>.</h2>
        <br>
        <div class="btn-group">
            <?php if ($_SESSION['tipo'] == 'funcionario') { ?>
                <a class="btn btn-primary" href="{{ route('vaga.index') }}">Vagas</a>
                <a class="btn btn-primary" href="{{ route('preco_hora.index') }}">Preço/Hora</a>
                <a class="btn btn-primary" href="{{ route('funcionario.index') }}">Funcionários</a>
                <a class="btn btn-primary" href="{{ route('cliente.index') }}">Clientes</a>
                <a class="btn btn-primary" href="{{ route('veiculo.index') }}">Veículos</a>
            <?php } ?>
            <a class="btn btn-primary" href="{{ route('operacao.index') }}">Operações</a>
            <form id="form_delete" name="form_delete" action="{{ route('ui.destroy',$_SESSION['id']) }}" method="post" onsubmit="return confirm('Tem certeza que deseja sair?')">
                @method('DELETE')
                @csrf
                <button class="btn btn-primary" type="submit">Sair</button>
            </form>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>

</html>