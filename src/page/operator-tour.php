<div class="container">
<?php

    $tourOperator =  $_GET['operatorTour'];
    $manager = new Manager($db);
     echo '<br>';
         $operatorTour  = $manager->getOperatorTour($tourOperator); 
         $destination = $manager->getListDestination();

?>
 <?php //Traitement Ajout Destination
    if (isset($_POST['destinationName']) && isset($_POST['destinationPrice']) ) {

        $addDestination = new Destination([  "location" => $_POST['destinationName'], 
                                    "price" => $_POST['destinationPrice'],
                                    "id_tour_operator"=> $operatorTour->getId() ]);
        $manager->addDestination($addDestination);
    }
?>
 <?php //Traitement Modification Destination
    if (isset($_POST['newDestinationName']) && isset($_POST['newDestinationPrice']) ) {

        $addDestination = new Destination([ "id" => $_POST['newDestinationId'],
                                            "location" => $_POST['newDestinationName'], 
                                            "price" => $_POST['newDestinationPrice'],
                                            "id_tour_operator"=> $operatorTour->getId() ]
                                        );
        $manager->updateDestination($addDestination);
    }
?>
<div class="row">
    <div class="compagnies-content text-center col-lg-6"> 
        <h3>Ajouter une destination :</h3>
        <form action="" method="Post">
            <input type="text" name="destinationName" id="destinationName" placeholder="Nom de la destination"><br> 
            <input type="number" name="destinationPrice" id="destinationPrice" placeholder="Prix de la destination"> <br>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
    <div class="compagnies-content text-center col-lg-6"> 
        <h3>Modifier une destination :</h3>
        <form action="" method="Post">
            <select name="newDestinationId">
                <?php for ($i=0; $i <count($destination) ; $i++) { ?>
                <?php if ($destination[$i]->getIdTourOperator() == $operatorTour->getId()) {?>
                  <option value="<?=$destination[$i]->getId();?>"><?=$destination[$i]->getLocation();?></option>  
                <?php } } ?>
            </select>
            <br>
            <input type="text" name="newDestinationName" id="destinationName" placeholder="Nouveau nom de la destination"><br> 
            <input type="number" name="newDestinationPrice" id="destinationPrice" placeholder="Nouveau prix de la destination"> <br>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>
    </div>
</div>

<div class="text-center">
    <h3><?=$operatorTour->getName()?></h3>
</div>
<div class="row justify-content-center">
    <div class="pub-premium col-lg-5">
        <div class="card-pub">
            <div class="card-body">
                <h5 class="card-title">Formule</h5>
                <p class="card-text">
                    <span class="titre-pub">Formule Standard</span>
                    <br>
                    <ul>
                        <li>Placement de vos annonces en haut de page</li>
                        <li>Assistance 24h/24 en semaine par e-mail ou par téléphone</li>
                        <li>Calendrier synchronisé avec vos autres sites</li>
                        <li>Passez en premium à tous moments</li>
                    </ul>
                    <div class="text-pub">
                        <p>29 , 99 € / mois</p>
                    </div>
                </p>
                <div class="text-pub">
                        <button type="submit" class="btn btn-outline-primary">Selectionner</button>
                </div>
            </div>
        </div>
    </div>

    <div class="pub-premium col-lg-5">
        <div class="card-pub">
            <div class="card-body">
                <h5 class="card-title">Formule</h5>
                <p class="card-text">
                <span class="titre-pub">Formule Premium ⭐ </span>
                    <br>
                    <ul>
                        <li>Placement de vos annonces tête de page</li>
                        <li>Assistance 24h/24 et 7j/7 par e-mail ou par téléphone</li>
                        <li>Calendrier synchronisé avec vos autres sites</li>
                        <li>Placement des annonces dans la liste des recommandation</li>
                    </ul>
                    <div class="text-pub">
                        <p>49 , 99 € / mois</p>
                    </div>
                </p>
                <div class="text-pub">
                    <button type="submit" class="btn btn-outline-primary">Selectionner</button>
                </div>
                
            </div>
        </div>
    </div>
</div>
<div class="destinations-cards row">
    <?php  for ($i=0; $i <count($destination); $i++){?>
        <?php if ($destination[$i]->getIdTourOperator() == $operatorTour->getId()) {?>
           <div class="card text-center col-lg-3 m-2" style="width: 20rem;">
            <form method="post">
                <img src="./asset/img/11404_800x480.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?=$destination[$i]->getLocation()?></h5>
                    <p class="card-text"><?=$destination[$i]->getPrice()?>€</p>
                    <a href="<?= $operatorTour->getLink()?>" class="btn btn-primary">Go somewhere</a>  
                    <input type="text" name="destinationId" value='<?=$destination[$i]->getId() ?>' style="display: none">
                    <button type="submit" class="btn btn-danger">Supprimer</button>  
                </div>
        </form>
        </div> 
        
        
    <?php } }?>
<?php if (isset($_POST['destinationId'])) {
    $manager->deleteDestination($_POST['destinationId']);
}?>
</div>

</div>