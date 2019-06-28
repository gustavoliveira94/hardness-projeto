<?php 
include './classes/produtos.class.php';
$p1 = $produto->getProdutosID(55);
$p2 = $produto->getProdutosID(47);
$p3 = $produto->getProdutosID(48);
?>
<div id="carouselExampleCaptions" class="carousel slide" data-ride="carousel">
    <ol class="carousel-indicators">
        <li data-target="#carouselExampleCaptions" data-slide-to="0" class="active"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="1"></li>
        <li data-target="#carouselExampleCaptions" data-slide-to="2"></li>
    </ol>
    <div class="carousel-inner">
        <div class="carousel-item active" style="margin-top: 100px; margin-bottom: 100px">
            <div class="row justify-content-center">
                <div class="card col-md-3">
                    <div style="display: flex; justify-content: center; height: 180px; margin-bottom: 5px; padding: 15px;">
                        <img src="./img/<?php echo $p1[5] ?>" alt="..." style="height: 180px; max-width: 300px;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $p1[2] ?>
                        </h5>
                        <div>R$:
                        <p class="valor"><?php echo $p1[6] ?></p>
                        </div>
                        <a href="produto?id=<?php echo $p1[0] ?>" class="btn btn-purple">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item" style="margin-top: 100px; margin-bottom: 100px">
            <div class="row justify-content-center">
                <div class="card col-md-3">
                <div style="display: flex; justify-content: center; height: 180px; margin-bottom: 5px; padding: 15px;">
                        <img src="./img/<?php echo $p2[5] ?>" alt="..." style="height: 180px; max-width: 300px;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $p2[2] ?>
                        </h5>
                        <div>R$:
                        <p class="valor"><?php echo $p2[6] ?></p>
                        </div>
                        <a href="produto?id=<?php echo $p2[0] ?>" class="btn btn-purple">Comprar</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="carousel-item" style="margin-top: 100px; margin-bottom: 100px">
            <div class="row justify-content-center">
                <div class="card col-md-3">
                <div style="display: flex; justify-content: center; height: 180px; margin-bottom: 5px; padding: 15px;">
                        <img src="./img/<?php echo $p3[5] ?>" alt="..." style="height: 180px; max-width: 300px;">
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">
                            <?php echo $p3[2] ?>
                        </h5>
                        <div>R$:
                        <p class="valor"><?php echo $p3[6] ?></p>
                        </div>
                        <a href="produto?id=<?php echo $p3[0] ?>" class="btn btn-purple">Comprar</a>
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