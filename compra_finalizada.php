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
    $venda->venda($_SESSION['idcliente'], $total);
    $idvenda = $venda->getVenda($_SESSION['idcliente']);
    $venda->formaPagamento($_SESSION['idcliente'], 'CC');
    $formapagamento = $venda->getFormaPagamento($_SESSION['idcliente']);
    $data = date('d/m/Y');
    echo $formapagamento[0] . "<br/>";
    $venda->pagamento($idvenda[0], $idvenda[2], $data, $formapagamento[0]);
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
                <h3>Obrigado por nos escolher!</h3>
                <h3>Compra finalizada com sucesso.</h3>
                <br/>
                <p>Redirecionando...</p>
            </div>
        </div>
    </div>
</body>

<!-- Javascript -->
<script>
    setTimeout(() => {
        window.location.href = "index.php"
    }, 5000);
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

</html>