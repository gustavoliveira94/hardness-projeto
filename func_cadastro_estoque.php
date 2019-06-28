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

    <title>Estoque</title>
</head>

<body>
    <?php
    require_once('./utils/nav_func.php');
    include './classes/produtos.class.php';
    if (!isset($_SESSION['idfuncionario']) && empty($_SESSION['idfuncionario'])) {
        header("Location: login_func.php");
    }
    ?>
    <div class="container func-painel">
        <div class="row justify-content-center align-items-center flex-column">
            <h2>Cadastrar Estoque</h2>
            <form class="col-md-5 bg-light pb-2 pt-2" method="post">
                <?php
                if (!empty($_POST['quantidade']) && !empty($_POST['ucompra']) && !empty($_POST['ucusto'])) {

                    $quantidade = addslashes(intval($_POST['quantidade']));
                    $ucompra = addslashes($_POST['ucompra']);
                    $ucusto = addslashes($_POST['ucusto']);
                    $idproduto = addslashes(intval($_POST['idproduto']));
                    ?>
                <div class="alert alert-danger" role="alert">
                    <?php
                    $produto->createEstoque($quantidade, $ucompra, $ucusto, $idproduto);
                    ?>
                </div>
                <?php

            } ?>
                <div class="form-group">
                    <label for="quantidade">Quantidade</label>
                    <input type="number" required name="quantidade" class="form-control" placeholder="Digite a quantidade">
                </div>
                <div class="form-group">
                    <label for="ucompra">Data da Compra</label>
                    <input type="date" required name="ucompra" class="form-control" placeholder="Digite a última compra">
                </div>
                <div class="form-group">
                    <label for="ucusto">Valor da Compra</label>
                    <input type="text" required id="valor" name="ucusto" class="form-control" placeholder="Digite o último custo">
                </div>
                <div class="form-group">
                <label for="idproduto">Produtos</label>
                    <select class="form-control" required name="idproduto" placeholder="Escolha um produto">
                        <?php 
                        $produtos = $produto->getProdutos();
                        foreach ($produtos as $p) { ?>
                        <option value="<?php echo $p[0]; ?>">
                            <?php echo $p[2]; ?>
                        </option>
                        <?php 
                    } ?>
                    </select>
                </div>
        <button type="submit" class="btn btn-primary">Cadastrar</button>
        </form>
    </div>
</body>

<!-- Javascript -->
<script>
    $('#valor').mask('000.000.000.000.000,00', {reverse: true});
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
<script src='./js/app.js'></script>

</html>