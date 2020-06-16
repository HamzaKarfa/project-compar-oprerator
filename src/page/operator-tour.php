<div class="container">
<?php

    $tourOperator =  $_GET['operatorTour'];
    $operatorTour = new Manager($db);
     echo '<br>';
         $test  = $operatorTour->getOperatorTour($tourOperator); 
         $destination = $operatorTour->getListDestination($test->getId());
?>
 <?php 
    if (isset($_POST['destinationName']) && isset($_POST['destinationPrice']) ) {

        $addDestination = new Destination([  "location" => $_POST['destinationName'], 
                                    "price" => $_POST['destinationPrice'],
                                    "idtouroperator"=> $test->getId() ]);
                                    var_dump($addDestination);
        $operatorTour->addDestination($addDestination);
    }
?>
<div class="compagnies-content text-center">
        
        <h3>Ajouter une destination :</h3>
        <form action="" method="Post">
            <label for="destinationName">Location : </label>
            <input type="text" name="destinationName" id="destinationName" placeholder="Nom de la destination"><br> 
            <label for="destinationPrice">Prix : </label>
            <input type="number" name="destinationPrice" id="destinationPrice" placeholder="Lien vers l'operateur"> <br>
            <button type="submit">Ajouter</button>
        </form>


    </div>
<div class="text-center">
    <h3><?=$test->getName()?></h3>
</div>

<div class="destinations-cards">
    <?php  for ($i=0; $i <count($destination); $i++){?>

        <div class="card text-center" style="width: 20rem;">
            <div class="col-12">
                <img src="./asset/img/11404_800x480.jpg" class="card-img-top">
                <div class="card-body">
                    <h5 class="card-title"><?=$destination[$i]->getLocation()?></h5>
                    <p class="card-text"><?=$destination[$i]->getPrice()?>€</p>
                    <a href="" class="btn btn-primary">Go somewhere</a>  
                </div>
            </div>
        </div>
    <?php }?>
 
</div>

</div>