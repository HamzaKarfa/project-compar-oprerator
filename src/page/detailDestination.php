<?php
 $manager = new Manager($db);
 $destinations = $manager->getDestination($_GET['detailDestination']);
 

?>
<div class="d-flex justify-content-center">
    <div class="card text-center " style="width: 50%;">
        <img src="./asset/img/11404_800x480.jpg" class="card-img-top">
        <div class="card-body" >
            <h2 class="card-title"><?= $destinations[0]->getLocation();?></h2>


            <p class="card-text">Compagnies proposant la destination</p>
            <hr>
            <br>
           <?php for ($i=0; $i <count($destinations) ; $i++) { 
                    $operator = $manager->getOperatorTour(intval($destinations[$i]->getIdTourOperator()));?>
                    <div class="row">
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
            <?php } ?>
        </div>
    </div>

</div>


