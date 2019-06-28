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
            <h2>Buscar Produto</h2>
            <form class="col-md-5 bg-light pb-2 pt-2" method="get">
                <div class="form-group">
                    <label for="produto">Selecione o produto</label>
                    <select class="form-control" name="produto" placeholder="Escolha um fornecedor">
                        <?php 
                        $p = $produto->getProdutos();
                        foreach ($p as $prod) { ?>
                        <option value="<?php echo $prod[0]; ?>">
                            <?php echo $prod[2]; ?>
                        </option>
                        <?php 
                    } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Buscar</button>
            </form>
            <?php if (@$_GET['produto']) { ?>
            <form class="col-md-5 bg-light pb-2 pt-2" style="margin-top: 50px;" method="post" enctype="multipart/form-data">
            <div class="alert alert-warning" role="alert">
                Por favor, atualize com uma imagem parar evitar erros.
            </div>
                <?php
                $prod = $produto->getProdutosID(@$_GET['produto']);
                if (!empty($_POST['nomeproduto']) && !empty($_POST['produtocategoria'])) {

                    $pontos = array(",", ".");
                    $idproduto = addslashes($_POST['idproduto']);
                    $fornecedor = addslashes($_POST['idfornecedor']);
                    $nome = addslashes($_POST['nomeproduto']);
                    $categoria = addslashes($_POST['produtocategoria']);
                    $descricao = addslashes($_POST['descricao']);
                    $img = $_FILES['imagem'];
                    $i = md5(time() . rand(0, 99)) . '.png';
                    move_uploaded_file($img['tmp_name'], './img/' . $i);
                    $imagem = $i;
                    $valorvenda = str_replace($pontos, "", addslashes($_POST['valorvenda']));
                    $valorcompra = str_replace($pontos, "", addslashes($_POST['valorcompra']));
                    $fabricante = addslashes($_POST['fabricante']);
                    ?>
                <div class="alert alert-success" role="alert">
                    <?php
                    $produto->update($idproduto, $fornecedor, $nome, $categoria, $descricao, $imagem, $valorvenda, $valorcompra, $fabricante);
                    ?>
                </div>
                <?php

            }
            ?>
                <div class="form-group">
                    <div class="form-group">
                        <input type="text" hidden value="<?php echo $prod[0] ?>" name="idproduto" class="form-control" placeholder="Digite o nome do produto">
                    </div>
                    <label for="idfornecedor">Fornecedor</label>
                    <select class="form-control" name="idfornecedor" placeholder="Escolha um fornecedor">
                        <?php 
                        $fornecedor = $produto->getFornecedor();
                        foreach ($fornecedor as $f) { ?>
                        <option value="<?php echo $prod[1]; ?>">
                            <?php echo $f[1]; ?>
                        </option>
                        <?php 
                    } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="nomeproduto">Nome</label>
                    <input type="text" value="<?php echo $prod[2] ?>" name="nomeproduto" class="form-control" placeholder="Digite o nome do produto">
                </div>
                <div class="form-group">
                    <label for="produtocategoria">Categoria</label>
                    <select class="form-control" name="produtocategoria" placeholder="Escolha uma categoria">
                        <option value="<?php echo $prod[3] ?>">
                            <?php echo $prod[3] ?>
                        </option>
                        <option value="midiadigital">Mídia Digital</option>
                        <option value="midiafisica">Mídia Física</option>
                        <option value="consoles">Consoles</option>
                        <option value="computadores">Computadores</option>
                        <option value="ovr">Óculos Realidade Virtual</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="descricao">Descrição</label>
                    <textarea class="form-control" name="descricao" rows="3" placeholder="Digite uma descrição"><?php echo $prod[4] ?></textarea>
                </div>
                <div class="form-group">
                    <label for="imagem">Imagem do produto</label>
                    <input type="file" name="imagem" class="form-control-file" placeholder="Selecione uma imagem">
                </div>
                <div class="form-row">
                    <div class="form-group col-md-6">
                        <label for="valorvenda">Valor de Venda</label>
                        <input type="text" id="valorvenda" name="valorvenda" value="<?php echo $prod[6] ?>" class="form-control" placeholder="Digite o valor">
                    </div>
                    <div class="form-group col-md-6">
                        <label for="valorcompra">Valor de Compra</label>
                        <input type="text" id="valorcompra" name="valorcompra" value="<?php echo $prod[7] ?>" class="form-control" placeholder="Digite o valor">
                    </div>
                </div>
                <div class="form-group">
                    <label for="fabricante">Fabricante</label>
                    <input type="text" name="fabricante" value="<?php echo $prod[8] ?>" class="form-control" placeholder="Digite o fabricante">
                </div>
                <button type="submit" class="btn btn-primary">Atualizar</button>
            </form>
            <?php 
        } ?>
        </div>
    </div>
    </div>
</body>

<!-- Javascript -->
<script>
    $("#valorvenda").mask('000.000.000.000.000,00', {reverse: true});
    $("#valorcompra").mask('000.000.000.000.000,00', {reverse: true});
</script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>
<script src='./js/app.js'></script>

</html>