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

    <div class="destinations-cards row">
    <?php $nameCard = [''];
         for ($i=0; $i <$destination->countDestination() ; $i++) { 
        $destinations = $destination->getListDestination();
        foreach ($nameCard as $key) {
            if ($key != $destinations[$i]->getLocation()) { ?>
                <div class="card text-center col-lg-3 m-2" style="width: 20rem;">
                    <div class="info">
                        <h5 class="card-text"><?=$destinations[$i]->getLocation()?></h5>
                        <hr>
                        <img src="./asset/img/11404_800x480.jpg" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <!-- Button envoi detail destination -->
                            <form action="" method="get">
                                <button type="submit" class="btn btn-primary"name="detailDestination" value="<?=$destinations[$i]->getLocation()?>">Info Destination</button>
                            </form>
                        </div>
                    </div>
                </div>
                


        <?php 
        array_shift($nameCard);
        array_push($nameCard, $destinations[$i]->getLocation()); 
        break;
            }
        }
    ?>

    <?php  }?>

    </div>