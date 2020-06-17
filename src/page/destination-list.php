<?php
 $destination = new Manager($db);
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
            <br>
            Guide de voyage
            <br>
            Tout ce que vous devez savoir pour
            <br>
            prendre les meilleures décisions de voyage.</p>
    </div>
    <div class="guide">
        <a class="btn btn-primary" href="https://www.kayak.fr/c/coronavirus-travel/" role="button">Voir le guide</a>
    </div>

    <div class="nav-selection">
        <div class="selection">
                <input type="text" placeholder="Opperateurs">
                <input type="text" placeholder="Destinations">
                <input type="number" placeholder="Tarifs">
                <a class="btn btn-primary" href="" role="button">Valider</a>
            </div>
        </div>
    </div>

    <div class="premium-cards row">

    <?php  for ($i=0; $i <3; $i++):?>

        <div class="card text-center col-lg-3 m-2" style="width: 20rem;">
            <div class="">
                <img src="./asset/img/11404_800x480.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title">⭐ Premium</h5>
                    <p class="card-text">Opperateur Premium</p>
                    <a href="" class="btn btn-primary">Site web</a>  
                </div>
            </div>
        </div>
        <?php endfor ;?>
    </div>

    <div class="destinations-cards row">

    <?php for ($i=0; $i <$destination->countDestination() ; $i++) { 
    
        $destinations = $destination->getListDestination();
        
        $operator= $destination->getOperatorTour(intval($destinations[$i]->getIdTourOperator()))
    ?>
 
        <div class="card text-center col-lg-3 m-2" style="width: 20rem;">
            <div class="">
                <h5 class="card-text"><?=$operator->getName()?></h5>
                <hr>
                <img src="./asset/img/11404_800x480.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?=$destinations[$i]->getLocation()?></h5>
                    <p class="card-text"><?=$destinations[$i]->getPrice()?>€</p>
                    
                    <a href="<?=  $operator->getLink()?>" class="btn btn-primary">Site web</a>  
                </div>
            </div>
        </div>
    <?php  }?>
    </div>