<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity=
    "sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="../../asset/css/style.css">
    <title>EasyTrip</title>
</head>
<body>

    <img class="img-home" src="asset/img/img-home.jpg">

    <?php
        include 'src/partials/header.php';
    ?>

    <div class="text-home">

        <h1>
            Trouvez votre coin de paradis avec
            <br>
            <br>
            <span class="easy">EasyTrip</span> 
        </h1>

    </div>

    <div class="text-home">
        <p>
            Rechercher un voyage prend souvent du temps. Trouver le site qui propose des voyages qui vous correspondent 
            n’est déjà pas une étape facile. Nous avons sélectionné pour vous les meilleurs voyagistes et leurs plus beaux circuits 
            que vous trouverez. Rapide et facile d’utilisation, il vous propose en 1 clic tous les voyages proposés par 
            les meilleures agences sur la destination choisie. Fini le temps passé à comparer les circuits et prix d’un 
            site à l’autre. Vous allez enfin pouvoir organiser votre voyage sereinement ! 
        </p>
    </div>

    <div class="redirection">
        <button type="button" class="btn btn-primary btn-lg">Comparez tous les voyages</button>
    </div>

<div class="row">
  <div class="column">
    <div class="card">
        <p>Les voyages recomandés</p>
        <img src="asset/img/img-reco.jpg" alt="">
    </div>
  </div>

    <div class="column">
        <div class="card">
            <p>Nos destinations</p>
            <img src="asset/img/img_dest.jpg" alt="">
        </div>
    </div>

    <div class="carousel-home">
        <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
                <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img src="asset/img/img1.jpg" class="d-block" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="asset/img/img2.jpg" class="d-block" alt="...">
                </div>
                <div class="carousel-item">
                    <img src="asset/img/img3.jpg" class="d-block" alt="...">
                </div>
            </div>
            <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>

  <?php
        include 'src/partials/footer.php';
    ?>
    
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>