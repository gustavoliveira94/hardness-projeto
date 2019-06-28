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

    <title>HardNess - Produto</title>
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
    ?>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8" style="margin-top: 50px;">
                <div class="card bg-light">
                    <div class="card-header">
                        <i class="fas fa-shopping-cart"></i> PAGAMENTO!
                    </div>
                    <div class="jumbotron jumbotron-fluid" style="margin-bottom: 0;">
                        <div class="col-md-12" style="display: flex; justify-content: flex-end; align-items: center; margin-top: -30px; margin-bottom: -50px;">
                            <form class="col-md-12" action="compra_finalizada.php">
                                <div class="form-group">
                                    <label for="name">Nome do cartão:</label>
                                    <input required type="text" name="name" class="form-control" placeholder="Gustavo M Oliveira">
                                    <label for="name">Número do cartão:</label>
                                    <input required id="numeroc" type="text" name="name" class="form-control" placeholder="0000 0000 0000 0000">
                                    <label for="name">Bandeira do cartão:</label>
                                    <select required class="form-control">
                                        <option>Visa</option>
                                        <option>Mastercard</option>
                                        <option>Elo</option>
                                    </select>
                                    <div class="form-row">
                                        <div class="col">
                                            <label for="name">Validade:</label>
                                            <input required id="validade" type="text" name="name" class="form-control" placeholder="Mês/Ano">
                                        </div>
                                        <div class="col">
                                            <label for="name">Código de segurança:</label>
                                            <input required id="cod" type="text" name="name" class="form-control" placeholder="000">
                                        </div>
                                    </div>
                                    <?php
                                    $idvenda = $venda->getVenda($_SESSION['idcliente']);
                                    foreach ($_SESSION['carrinho'] as $index => $produtos) {
                                        @$total = $_SESSION['qtdcarrinho'][$index] * $_SESSION['carrinho'][$index][6] + $total;
                                    }
                                    ?>
                                    <label for="name">Valor:</label>
                                    <input disabled type="text" name="name" class="form-control" id="valorvenda" value="<?php echo $total ?>">
                                </div>
                        </div>
                        <div class="col-md-12" style="display: flex; justify-content: flex-end; align-items: center; margin-top: 50px; margin-bottom: -50px;">
                            <button type="submit" class="btn btn-success">EFETUAR PAGAMENTO</button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<!-- Javascript -->
<script>
    $("#numeroc").mask('0000 0000 0000 0000', {reverse: true});
    $("#validade").mask('00/00', {reverse: true});
    $("#cod").mask('000', {reverse: true});
    $("#valorvenda").mask('000.000.000.000.000,00', {reverse: true});
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

</html>