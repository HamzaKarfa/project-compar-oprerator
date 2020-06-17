<div class="container">
<?php

    $tourOperator =  $_GET['operatorTour'];
    $operatorTour = new Manager($db);
     echo '<br>';
         $test  = $operatorTour->getOperatorTour($tourOperator); 
         $destination = $operatorTour->getListDestination();

?>
 <?php 
    if (isset($_POST['destinationName']) && isset($_POST['destinationPrice']) ) {

        $addDestination = new Destination([  "location" => $_POST['destinationName'], 
                                    "price" => $_POST['destinationPrice'],
                                    "id_tour_operator"=> $test->getId() ]);
                                    var_dump($addDestination);
        $operatorTour->addDestination($addDestination);
    }
?>
<div class="compagnies-content text-center">
        
        <h3>Ajouter une destination :</h3>
        <form action="" method="Post">
            <input type="text" name="destinationName" id="destinationName" placeholder="Nom de la destination"><br> 
            <input type="number" name="destinationPrice" id="destinationPrice" placeholder="Prix de la destination"> <br>
            <button type="submit" class="btn btn-primary">Ajouter</button>
        </form>


    </div>
<div class="text-center">
    <h3><?=$test->getName()?></h3>
</div>

<div class="destinations-cards row">
    <?php  for ($i=0; $i <count($destination); $i++){?>
        <?php if ($destination[$i]->getIdTourOperator() == $test->getId()) {?>
           <div class="card text-center col-lg-3 m-2" style="width: 20rem;">
            <form method="post">
                <img src="./asset/img/11404_800x480.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?=$destination[$i]->getLocation()?></h5>
                    <p class="card-text"><?=$destination[$i]->getPrice()?>€</p>
                    <a href="<?= $test->getLink()?>" class="btn btn-primary">Go somewhere</a>  
                    <input type="text" name="destinationId" value='<?=$destination[$i]->getId() ?>' style="display: none">
                    <button type="submit" class="btn btn-danger">Supprimer</button>  
                </div>
        </form>
        </div> 
        
        
    <?php } }?>
<?php if (isset($_POST['destinationId'])) {
    $operatorTour->deleteDestination($_POST['destinationId']);
}?>
</div>

</div>