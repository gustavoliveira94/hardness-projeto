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

    <title>HardNess - Produtos</title>
</head>

<body>
    <?php
    require_once('./utils/nav.php');
    require_once('./utils/caroussel.php');
    ?>
    <div class="filters">
        <div class="container">
            <div class="row justify-content-around align-items-center">
                <div class="col-md-2">
                    <a href="?produtocategoria=midiadigital">
                        <i class="fas fa-download fa-2x"></i>
                        <p>Mídia Digital</p>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="?produtocategoria=midiafisica">
                        <i class="fas fa-compact-disc fa-2x"></i>
                        <p>Mídia Física</p>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="?produtocategoria=consoles">
                        <i class="fas fa-gamepad fa-2x"></i>
                        <p>Consoles</p>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="?produtocategoria=computadores">
                        <i class="fas fa-laptop fa-2x"></i>
                        <p>Computadores</p>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="?produtocategoria=ovr">
                        <i class="fas fa-glasses fa-2x"></i>
                        <p>Óculos VR</p>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="container pb-5 pt-5">
        <div class="row">
            <div class="alert alert-dark col-md-6 ml-2 mr-2" role="alert">
                Produtos!
            </div>
        </div>
        <div class="row justify-content-between">
            <?php
            if (!isset($_GET['produtocategoria'])) {
                $p = $produto->getProdutos();
                foreach ($p as $produtos) {
                    ?>
            <div class="card col-md-3">
                <div style="display: flex; justify-content: center; height: 180px; margin-bottom: 5px; padding: 15px;">
                    <img src="./img/<?php echo $produtos[5] ?>" alt="<?php echo $produtos[2] ?>" style="height: 100%; max-width: 250px;">
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $produtos[2] ?>
                    </h5>
                    <div>R$:
                    <p class="valor"><?php echo $produtos[6] ?></p>
                    </div>
                    <a href="produto?id=<?php echo $produtos[0] ?>" class="btn btn-purple">Comprar</a>
                </div>
            </div>
            <?php

        }
    } else if (isset($_GET['produtocategoria'])) {
        $categoria = addslashes($_GET['produtocategoria']);
        $p = $produto->getProdutosCategoria($categoria);
        if ($p > 0) {
            foreach ($p as $produtos) {
                ?>
            <div class="card col-md-3">
                <div style="display: flex; justify-content: center; height: 180px; margin-bottom: 5px; padding: 15px;">
                    <img src="./img/<?php echo $produtos[5] ?>" alt="<?php echo $produtos[2] ?>" style="height: 100%; max-width: 250px;">
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $produtos[2] ?>
                    </h5>
                    <div>R$:
                    <p class="valor"><?php echo $produtos[6] ?></p>
                    </div>
                    <a href="produto?id=<?php echo $produtos[0] ?>" class="btn btn-purple">Comprar</a>
                </div>
            </div>
            <?php

        }
    } else { ?>
            <div class="alert alert-danger" role="alert">
                <?php
                echo 'Nenhum produto cadastrado!';
                ?>
            </div>
            <?php

        }

    } ?>
        </div>
    </div>
    <?php
    require_once('./utils/footer.php')
    ?>
</body>

<!-- Javascript -->
<script>
    $(".valor").mask('000.000.000.000.000,00', {reverse: true});
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

</html>