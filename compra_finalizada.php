<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T"
        crossorigin="anonymous">

    <!-- Icones -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf"
        crossorigin="anonymous">

    <!-- Fontes -->
    <link href="https://fonts.googleapis.com/css?family=Germania+One" rel="stylesheet">

    <!-- CSS -->
    <link rel="stylesheet" href="./css/app.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.11/jquery.mask.min.js"></script>

    <title>HardNess</title>
</head>

<body>
    <?php
    require_once('./utils/nav.php');
    include './classes/produtos.class.php';
    include './classes/carrinho.class.php';
    include './classes/venda.class.php';
    if (isset($_SESSION['carrinho']) && empty($_SESSION['idcliente'])) {
        @$c = $_SESSION['carrinho'];
        header("Location: login.php");
    }
    foreach ($_SESSION['carrinho'] as $index => $produtos) {
        @$total = $_SESSION['qtdcarrinho'][$index] * $_SESSION['carrinho'][$index][6] + $total;
    }
    $data = date('Y-m-d');
    $venda->venda($data, $_SESSION['idcliente'], $total);
    $idvenda = $venda->getVenda($_SESSION['idcliente']);
    $venda->pagamento($idvenda[0], $idvenda[3], $data);
    foreach ($_SESSION['carrinho'] as $index => $produtos) {
        @$total = $_SESSION['qtdcarrinho'][$index] * $_SESSION['carrinho'][$index][6] + $total;
        $venda->itemvenda($idvenda[0], $produtos[0], $produtos[6], $_SESSION['qtdcarrinho'][$index]);
        $produto->decremetarEstoque($_SESSION['qtdcarrinho'][$index], $produtos[0]);
    }
    unset($_SESSION['carrinho']);
    unset($_SESSION['qtdcarrinho']);
    ?>
    <div class="container">
        <div class="row justify-content-center align-items-center; background-color: #000;">
            <div class="col-md-8" style="height: calc(100vh - 200px); color: #fff; display:flex; flex-direction: column; justify-content: center; align-items: center; margin-top: 50px;">
                <h4>Obrigado por nos escolher!</h4>
                <h5>Compra finalizada com sucesso.</h5>
                <br/>
                <div class="card border-secondary mb-3" style="width: 18rem; color: #000">
                    <div class="card-header">Dados da compra</div>
                    <div class="card-body">
                        <h6 class="card-subtitle mb-2 text-muted">Nº da compra:
                            <?php echo $idvenda[0] ?>
                        </h6>
                        <div class="card-subtitle mb-2 text-muted">Valor Total: R$
                            <p id="valorvenda">
                            <?php echo $idvenda[3]; ?>
                            </p>
                        </div>
                        <a href="index.php" class="card-link">Continuar</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

<!-- Javascript -->
<script>
    $("#valorvenda").mask('000.000.000.000.000,00', {reverse: true});
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

</html>