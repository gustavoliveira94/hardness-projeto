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
    if (isset($_GET['id'])) {
        @$id = $_GET['id'];
        @$c = $_SESSION['carrinho'];
        $p1 = $produto->getProdutosID($id);
        $p2 = $carrinho->addCarrinho($id);

        if (in_array($p1, $_SESSION['carrinho'])) {

        } else {
            array_push($_SESSION['carrinho'], $p1);
        }

    }
    ?>
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-8" style="margin-top: 50px;">
                <div class="card bg-light">
                    <div class="card-header">
                        <i class="fas fa-shopping-cart"></i> CARRINHO
                    </div>
                    <div class="jumbotron jumbotron-fluid" style="margin-bottom: 0;">
                        <?Php
                        if (isset($_SESSION['carrinho'])) {
                            $c = $_SESSION['carrinho'];
                            foreach ($c as $index => $produtos_carrinho) {
                                ?>
                        <div class="container">
                            <form method="get" action="finalizar_compra.php">
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
                                        <div class="col-md-2" style="height: 120px; display: flex; align-items: center;">
                                            <div class="card-body" style="height: 100px; display: flex; align-items: center;">
                                                <select class="form-control" name="qtd<?php echo $index ?>">
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                    <option value="4">4</option>
                                                    <option value="5">5</option>
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
                                        <div class="col-md-1" style="height: 120px; display: flex; align-items: center;">
                                            <a href="?idremove=<?php echo $index; ?>" id="remove">
                                                <i style="color: red" class="fas fa-minus-circle"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                        </div>
                        <?php
                        if (isset($_GET['idremove']) && $_GET['idremove'] == $index) {
                            $carrinho->removeCarrinho($index);
                        }
                    }
                } ?>
                        <div class="col-md-12" style="display: flex; justify-content: flex-end; align-items: center; margin-top: 50px; margin-bottom: -50px;">
                            <a style="margin-right: 30px;" href="produtos.php">Continuar comprando</a>
                            <button type="submit" class="btn btn-success">CONTINUAR</button>
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
    $(".valorvenda").mask('000.000.000.000.000,00', {reverse: true});
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

</html>