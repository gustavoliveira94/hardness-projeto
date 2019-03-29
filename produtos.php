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

    <title>Produtos</title>
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
    <div class="filters">
        <div class="container">
            <div class="row justify-content-around align-items-center">
                <div class="col-md-2">
                    <a href="#">
                        <i class="fas fa-download fa-2x"></i>
                        <p>Mídia Digital</p>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="#">
                        <i class="fas fa-compact-disc fa-2x"></i>
                        <p>Mídia Física</p>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="#">
                        <i class="fas fa-gamepad fa-2x"></i>
                        <p>Consoles</p>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="#">
                        <i class="fas fa-laptop fa-2x"></i>
                        <p>Computadores</p>
                    </a>
                </div>
                <div class="col-md-2">
                    <a href="#">
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