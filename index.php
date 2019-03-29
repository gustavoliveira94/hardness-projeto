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

    <title>Document</title>
</head>

<body>
    <?php
    require_once('./utils/nav.php');
    ?>
    <div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel" style="background-color: black;">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
            <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner">
            <div class="carousel-item active" style="margin-top: 100px; margin-bottom: 100px">
                <div class="row justify-content-center">
                <div class="card" style="width: 18rem;">
                        <img src="./img/apex_legends_desktop_wallpaper1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Apex</h5>
                            <p>R$: 350,00</p>
                            <a href="#" class="btn btn-purple">Comprar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="margin-top: 100px; margin-bottom: 100px">
                <div class="row justify-content-center">
                    <div class="card" style="width: 18rem;">
                        <img src="./img/apex_legends_desktop_wallpaper1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Apex</h5>
                            <p>R$: 350,00</p>
                            <a href="#" class="btn btn-purple">Comprar</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="carousel-item" style="margin-top: 100px; margin-bottom: 100px">
                <div class="row justify-content-center">
                <div class="card" style="width: 18rem;">
                        <img src="./img/apex_legends_desktop_wallpaper1.jpg" class="card-img-top" alt="...">
                        <div class="card-body">
                            <h5 class="card-title">Apex</h5>
                            <p>R$: 350,00</p>
                            <a href="#" class="btn btn-purple">Comprar</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleCaptions" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <form>
                    <div class="form-group newsletter">
                        <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Cadastre seu E-mail para promoções!">
                        <button type="submit" class="btn btn-success">Cadastrar</button>
                    </div>
                </form>
            </div>
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
            <div class="card col-md-3">
                <img src="./img/apex_legends_desktop_wallpaper1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Apex</h5>
                    <p>R$: 350,00</p>
                    <a href="#" class="btn btn-purple">Comprar</a>
                </div>
            </div>
            <div class="card col-md-3">
                <img src="./img/apex_legends_desktop_wallpaper1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Apex</h5>
                    <p>R$: 350,00</p>
                    <a href="#" class="btn btn-purple">Comprar</a>
                </div>
            </div>
            <div class="card col-md-3">
                <img src="./img/apex_legends_desktop_wallpaper1.jpg" class="card-img-top" alt="...">
                <div class="card-body">
                    <h5 class="card-title">Apex</h5>
                    <p>R$: 350,00</p>
                    <a href="#" class="btn btn-purple">Comprar</a>
                </div>
            </div>
        </div>
    </div>
    <?php
    require_once('./utils/footer.php')
    ?>
</body>

<!-- Javascript -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
    crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1"
    crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM"
    crossorigin="anonymous"></script>

</html>