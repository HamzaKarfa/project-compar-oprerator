<?php
 $manager = new Manager($db);
 $destinations = $manager->getDestination($_GET['detailDestination']);
 

?>
<div class="d-flex justify-content-center m-3">
    <div class="card text-center " style="width: 50%;">
        <img src="./asset/img/11404_800x480.jpg" class="card-img-top">
        <div class="card-body" >
            <h2 class="card-title"><?= $destinations[0]->getLocation();?></h2>
                <br>
            <p class="card-text">Compagnies proposant la destination</p>
                <hr>
                <br>
                
           <?php for ($i=0; $i <count($destinations) ; $i++) { 
                    $operator = $manager->getOperatorTour(intval($destinations[$i]->getIdTourOperator()));
                    if($operator->getIsPremium() == 1){
                    ?>
                    <div class="row premium">
                        <div class="col-lg-4">
                        ⭐ <?= $operator->getName()?> 
                        </div>
                        <div class="col-lg-4">
                            <?= $destinations[$i]->getPrice()?>€
                        </div>
                        <div class="col-lg-4"> 
                            <a href="<?= $operator->getLink()?>">Book</a>                             
                        </div>
                        
                    </div>
                    <hr>
            <?php } } ?>
            <?php for ($i=0; $i <count($destinations) ; $i++) { 
                    $operator = $manager->getOperatorTour(intval($destinations[$i]->getIdTourOperator()));
                    if($operator->getIsPremium() == 0){
                    ?>
                    <div class="row notPremium">
                        <div class="col-lg-4">
                            <?= $operator->getName()?>
                        </div>
                        <div class="col-lg-4">
                            <?= $destinations[$i]->getPrice()?>€
                        </div>
                        <div class="col-lg-4"> 
                            <a href="<?= $operator->getLink()?>">Book</a>
                        </div>
                        
                    </div>
                    <hr>
            <?php } } ?>
        </div>
    </div>
</div>