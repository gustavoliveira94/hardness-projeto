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

    <title>Hardness</title>
</head>

<body>
    <?php
    require_once('./utils/nav.php');
    require_once('./utils/caroussel.php');
    include './classes/venda.class.php';
    ?>
    <div class="container-fluid facebook-content">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form method="post">
                    <div class="form-group newsletter">
                        <input type="email" class="form-control" name="email" aria-describedby="emailHelp" placeholder="Cadastre seu E-mail para promoções!">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                    <?php
                    if (!empty($_POST['email'])) {
                        $email = addslashes($_POST['email']);
                        $user->promocoes($email);
                    }
                    ?>
                </form>
            </div>
        </div>
    </div>
    <div class="container pb-5 pt-5">
        <div class="row">
            <div class="alert alert-dark col-md-6 ml-2 mr-2" role="alert">
                Top 3 produtos mais vendidos!
            </div>
        </div>
        <div class="row justify-content-between">
            <?php foreach ($venda->getItemVendaTop() as $produtos) {
                $p = $produto->getProdutosID($produtos[0]);
                ?>
            <div class="card col-md-3">
                <div style="display: flex; justify-content: center; height: 180px; margin-bottom: 5px; padding: 15px;">
                    <img src="./img/<?php echo $p[5] ?>" alt="..." style="height: 100%; max-width: 250px;">
                </div>
                <div class="card-body">
                    <h5 class="card-title">
                        <?php echo $p[2] ?>
                    </h5>
                    <div>R$:
                        <p class="valor"><?php echo $p[6] ?></p>
                    </div>
                    <a href="produto?id=<?php echo $p[0] ?>" class="btn btn-purple">Comprar</a>
                </div>
            </div>
            <?php 
        } ?>
        </div>
    </div>
    <div class="container-fluid facebook-content">
        <div class="row facebook-embeded justify-content-center">
            <iframe src="https://www.facebook.com/plugins/post.php?href=https%3A%2F%2Fwww.facebook.com%2Fpermalink.php%3Fstory_fbid%3D370896960116369%26id%3D370895373449861&width=552&show_text=true&height=510&appId"
                width="552" height="510" style="border:none;overflow:hidden;margin: 0 20px;" scrolling="no" frameborder="0" allowTransparency="true"
                allow="encrypted-media"></iframe>
        </div>
    </div>
    <div class="container pb-5 pt-5">
        <div class="row">
            <div class="alert alert-dark col-md-6 ml-2 mr-2" role="alert">
                Produtos recém adicionados!
            </div>
        </div>
        <div class="row justify-content-between">
            <?php foreach ($produto->getProdutosRecentes() as $produtos) { ?>
            <div class="card col-md-3">
                <div style="display: flex; justify-content: center; height: 180px; margin-bottom: 5px; padding: 15px;">
                    <img src="./img/<?php echo $produtos[5] ?>" alt="..." style="height: 100%; max-width: 250px;">
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