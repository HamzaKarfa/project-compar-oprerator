<?php

 $destination = new Manager($db);


//  for ($i=1; $i <$destination->countDestination() ; $i++) { 
    
//     $test = $destination->getListDestination($i);

//     for ($j=0; $j < count($test) ; $j++) { 
//         var_dump($test[$j]->getLocation());
//     }
//     echo'<br>';
//  }

?>

    <div class="text-destinations">
        <h1>L’organisation de votre voyage commence ici</h1>
        <p>Trouvez votre bonheur parmis nos annonces</p>
    </div>

    <div class="covid">
        <p>
            <img class="covid19" src="./asset/img/covid.png">
            COVID-19
            <br>
            Guide de voyage
            <br>
            Tout ce que vous devez savoir pour
            <br>
            prendre les meilleures décisions de voyage.</p>
    </div>
    <div class="guide">
        <a class="btn btn-primary" href="" role="button">Voir le guide</a>
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

    <div class="premium-cards">

    <?php  for ($i=0; $i <3; $i++){?>
        
        <div class="card text-center" style="width: 20rem;">
            <div class="col-12">
                <img src="./asset/img/11404_800x480.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">⭐ Premium</h5>
                    <p class="card-text">Some quick example text to build.</p>
                    <a href="" class="btn btn-primary">Go somewhere</a>  
                </div>
            </div>
        </div>
    <?php }?>
    </div>

    <div class="destinations-cards">

    <?php for ($i=0; $i <$destination->countDestination() ; $i++) { 
    
        $destinations = $destination->getListDestination();
        
        $operator= $destination->getOperatorTour(intval($destinations[$i]->getIdTourOperator()))
    ?>
 
        <div class="card text-center" style="width: 20rem;">
            <div class="col-12">
                <img src="./asset/img/11404_800x480.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?=$destinations[$i]->getLocation()?></h5>
                    <p class="card-text"><?=$destinations[$i]->getPrice()?></p>
                    <p class="card-text"><?=$operator->getName()?></p>
                    <a href="<?=  $operator->getLink()?>" class="btn btn-primary">Go somewhere</a>  
                </div>
            </div>
        </div>
    <?php  }?>
    </div>