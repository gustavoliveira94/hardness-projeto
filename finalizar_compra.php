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
                        <i class="fas fa-shopping-cart"></i> FINALIZANDO COMPRA!
                    </div>
                    <div class="jumbotron jumbotron-fluid" style="margin-bottom: 0;">
                        <?Php
                        if (isset($_SESSION['carrinho'])) {
                            $c = $_SESSION['carrinho'];
                            foreach ($_SESSION['carrinho'] as $index => $produtos_carrinho) {
                                if (count($produtos_carrinho) == 10) {
                                    array_push($_SESSION['qtdcarrinho'][$index], intval($_GET['qtd' . $index]));
                                } else {
                                    $_SESSION['qtdcarrinho'][$index] = intval($_GET['qtd' . $index]);
                                }
                                ?>
                        <div class="container">
                        <form method="get" action="pagamento.php">
                            <div class="card">
                                <div class="row no-gutters">
                                    <div class="col-md-3" style="height: 120px; display: flex; align-items: center; padding: 5px;">
                                        <img style="max-width: 65%; max-height: 100%;" src="./img/<?php echo $produtos_carrinho[5] ?>" class="card-img" alt="<?php echo $produtos_carrinho[2] ?>">
                                    </div>
                                    <div class="col-md-3" style="height: 120px; display: flex; align-items: center;">
                                        <div class="card-body" style="height: 120px; display: flex; align-items: center;">
                                            <h5 class="card-title" style="margin: 0;">
                                                <?php echo $produtos_carrinho[2] ?>
                                            </h5>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="height: 120px; display: flex; align-items: center;">
                                        <div class="card-body" style="height: 100px; display: flex; align-items: center;">
                                            <select class="form-control" disabled>
                                                <option>
                                                    <?php 
                                                    echo $_SESSION['qtdcarrinho'][$index];
                                                    ?>
                                                </option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-3" style="height: 120px; display: flex; align-items: center;">
                                        <div class="card-body" style="height: 100px; display: flex; align-items: center;">
                                            <h5 class="card-title" style="margin: 0;">R$:
                                                <p class="valorvenda">
                                                <?php echo $produtos_carrinho[6] ?>
                                                </p>
                                            </h5>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="alert alert-danger" id="estoque" role="alert">
                            <?php
                            $produto->getEstoque($produtos_carrinho[0], $_SESSION['qtdcarrinho'][$index]);
                            ?>
                            </div>
                        </div>
                        <?php

                    }
                } ?>
                        <div class="col-md-12" style="display: flex; justify-content: flex-end; align-items: center; margin-top: 50px; margin-bottom: -50px;">
                            <?php
                            foreach ($_SESSION['carrinho'] as $index => $produtos_carrinho) {
                                @$total = $_SESSION['qtdcarrinho'][$index] * $_SESSION['carrinho'][$index][6] + $total;
                            }
                            ?>
                            <p class="badge badge-primary">Valor total:
                                <p id="valortotal" style="margin-left: -5px" class="badge badge-primary">
                                <?php echo $total ?>
                                </p>
                            </p>
                        </div>
                        <div class="col-md-12" style="display: flex; justify-content: flex-end; align-items: center; margin-top: 50px; margin-bottom: -50px;">
                            <a style="margin-right: 30px;" href="carrinho.php">Voltar</a>
                            <?php
                            $p = $produto->getEstoque2($produtos_carrinho[0], $_SESSION['qtdcarrinho'][$index]);
                            if (!$p) {
                                ?>
                            <button type="submit" class="btn btn-success">IR PARA PAGAMENTO</button>
                            <?php 
                        }
                        ?>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>

<script>
    const estoque = document.querySelectorAll('#estoque')
    
    for (const e of estoque) {
        console.log(e)
        if(e.innerText == "") {
            e.remove()
        }
    }

</script>

<!-- Javascript -->
<script>
    $(".valorvenda").mask('000.000.000.000.000,00', {reverse: true});
    $("#valortotal").mask('000.000.000.000.000,00', {reverse: true});
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

</html>