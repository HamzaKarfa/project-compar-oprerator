<?php

 $destination = new Manager($db);
 echo '<br>';
     $test =$destination->getOperatorTour(1);

?>

    <div class="text-destinations">
        <h1>L’organisation de votre voyage commence ici</h1>
        <p>Trouvez votre bonheur parmis nos annonces</p>
    </div>

    <div class="nav-selection">
        <div class="selection">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" 
                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Destinations</button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Villes</a>
                    <a class="dropdown-item" href="#">...</a>
                </div>
                <input type="number" placeholder="Tarif">
            </div>
        </div>
    </div>

    <?php  for ($i=0; $i <3; $i++):?>

        <div class="card text-center" style="width: 20rem;">
            <div class="col-12">
                <img src="./asset/img/11404_800x480.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">Some quick example text to build.</p>
                    <a href="" class="btn btn-primary">Go somewhere</a>  
                </div>
            </div>
        </div>
        <?php endfor ;?>

    <div class="destinations-cards">

    <?php  for ($i=0; $i <12; $i++):?>

        <div class="card text-center" style="width: 20rem;">
            <div class="col-12">
                <img src="./asset/img/11404_800x480.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"></h5>
                    <p class="card-text">Some quick example text to build.</p>
                    <a href="" class="btn btn-primary">Go somewhere</a>  
                </div>
            </div>
        </div>
        <?php endfor ;?>
    </div>