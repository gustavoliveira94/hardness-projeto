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

    <title>Hardness - Clientes</title>
</head>

<body>
    <?php
    require_once('./utils/nav_func.php');
    include './classes/produtos.class.php';
    include './classes/venda.class.php';
    if (!isset($_SESSION['idfuncionario']) && empty($_SESSION['idfuncionario'])) {
        header("Location: login_func.php");
    }
    ?>
    <div class="container func-painel">
        <div class="row justify-content-center align-items-center flex-column">
            <h2>Buscar Cliente</h2>
            <form class="col-md-5 bg-light pb-2 pt-2" method="get">
                <?php
                if (!empty($_GET['email'])) {

                    $email = addslashes(($_GET['email']));
                    $f = $func->getClienteEmail($email);
                    ?>
                    <?php if ($f == 'Não encontrado!') { ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    echo $f;
                    ?>
                </div>
                <?php

            }
        } ?>
                <div class="form-group">
                    <label for="email">E-mail do Cliente</label>
                    <input type="email" name="email" class="form-control" placeholder="Digite o e-mail do cliente">
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
            <div class="container">
            <?php
            if (!empty($_GET['email'])) {
                ?>
                <div class="row justify-content-center align-items-center flex-column" style="margin-top: 100px;">
                        <h3 style="color: #fff;">Compras do Cliente:</h3>
                        <div class="col-md-6">
                            <?php
                            $email = addslashes(($_GET['email']));
                            $f = $func->getClienteEmail($email);

                            $v = $venda->getVendaCliente($f[0]);
                            ?>
                            <?php 
                            if (!empty($_GET['item'])) {
                                $item = $_GET['item'];
                                $i = $venda->getItemVenda($item);
                                if ($i) {
                                    foreach ($i as $items) {
                                        ?>
                            <div class="card">
                                <div class="card-header">
                                    Detalhes da venda
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title">ID da venda: <?php echo $items[1]; ?></h5>
                                    <p class="card-text">ID Produto: <?php echo $items[2]; ?></p>
                                    <p class="card-text">Valor Unitário: R$ <?php echo number_format($items[3], 2, ',', '.') ?></p>
                                </div>
                                <div class="card-footer text-muted">
                                    Quantidade: <?php echo $items[4]; ?>
                                </div>
                            </div>
                            <?php

                        }
                    }
                    ?>
                            <div class="col-md-12" style="padding-left: 25px;">
                                <a href="clientes.php?email=<?php echo $f[3] ?>" class="btn btn-primary">Consultar</a>
                            </div>
                        <?php

                    }
                    if (!@$_GET['item']) {
                        foreach ($v as $venda) {
                            ?>
                        <div class="accordion" id="accordionExample">
                            <div class="card">
                                <div class="card-header" id="headingOne">
                                    <h2 class="mb-0">
                                        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                            <?php echo "Venda id: " . $venda[0] ?>
                                        </button>
                                    </h2>
                                </div>

                                <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <?php echo "<b>Valor total:</b> R$" . number_format($venda[3], 2, ',', '.') ?>
                                        <br/>
                                        <?php echo "<b>Data da compra:</b> " . implode('/', array_reverse(explode('-', $venda[1]))) ?>
                                    </div>
                                    <div class="card-body">
                                        <a href="clientes.php?email=<?php echo $f[3] ?>&item=<?php echo $venda[0] ?>" class="btn btn-primary" type="button">
                                            <?php echo "Consultar itens vendidos" ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php

                    }
                }
            }
            ?>
                    </div>
                </div>
            </div>
        </div>
</body>

<!-- Javascript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
<script src='./js/app.js'></script>

</html>