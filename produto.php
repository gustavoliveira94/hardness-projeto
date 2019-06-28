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

    if (isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];
        $p = $produto->getProdutosID($id);
    }
    ?>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div style="height: 100vh; display: flex; justify-content: center; align-items: center;">
                    <img src="./img/<?php echo $p[5] ?>" alt="..." style="min-width: 350px; max-height: 350px;">
                </div>
            </div>
            <div class="col-md-6" style="height: 100vh; display: flex; justify-content: center; align-items: center;">
                <div class="card bg-light mb-3">
                    <div class="card-header">COMPRE AGORA!</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $p[2] ?></h5>
                        <p class="card-text"><?php echo $p[4] ?></p>
                    </div>
                    <hr>
                    <div class="card-body">
                        <div class="col-md-6">
                            R$:
                            <h3 id="valorvenda"><small style="font-size: 16px;"></small> <?php echo $p[6] ?></h3>
                        </div>
                        <div class="col-md-6">
                        <?php
                        $est = $produto->getEstoque2($p[0], 0);
                        if (!$est) {
                            ?>
                            <a href="carrinho.php?id=<?php echo $p[0] ?>" class="btn btn-success">COMPRAR</a>
                        <?php
                    } else { ?>
                            <button disabled class="btn btn-danger">SEM ESTOQUE</button>
                        <?php
                    } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php 
    include './utils/footer.php'
    ?>
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