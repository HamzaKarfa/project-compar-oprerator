
 <?php
$manager = new Manager($db);


?> 
    <div class="text-compagnies">
        <h1>Laissez parler le voyageur qui est en vous</h1>
        <p>Découvrez nos compagnies les plus populaires</p>
    </div>

    <div class="container-cards row">
        <?php  for ($i=0; $i < $manager->countOperator(); $i++){
            $operatorTourList = $manager->getListOperatorTour();
            //Affichage destination premium
            if ($operatorTourList[$i]->getIsPremium() == 1) {?>
                <div class="card text-center m-2 col-lg-3" style="width: 20rem;">
                    <img src="./asset/img/11404_800x480.jpg" class="card-img-top">

                    <div class="card-body" >
                        <h5 class="card-title">⭐ <?=$operatorTourList[$i]->getName()?></h5>
                        <p class="card-text">Some quick example text to build.</p>

                        <a href="<?=$operatorTourList[$i]->getLink()?>" class="btn btn-primary">Site web</a>  
                        <form action="" method="post">
                            <input type="text" name="delete" value="<?= $operatorTourList[$i]->getId() ?>"  style="display: none;">
                        </form>
                        <br>
                        <h5>Commentaire de la destination</h5>
                    </div>
                
                    <div class="p-2" >

                        <div class="review">
                            <ul class="list-group list-group-flush overflow-auto" style="text-decoration: none; height: 140px; width:auto;">
                            <?php $getReviews = $manager->getListReview() ;
                                for ($j=0; $j < count($getReviews); $j++) { 
                                    if ($getReviews[$j]->getIdTourOperator() == $operatorTourList[$i]->getId()) {?>

                                        <li class="list-group-item list-group-item-secondary"><?= $getReviews[$j]->getAuthor()?></li>
                                        <li class="list-group-item list-group-item-secondary"><?=$getReviews[$j]->getMessage()?></li>

                                    
                                    <br>
                                    <?php}else {?> 
                                    
                                    
                            <?php } }?></ul>
                            <br>
                            <div class="card-footer" ><br>
                                <p>Ajouter un commentaire</p>
                                <form action="" method="post">
                                    

                                    <input type="text" class="form-control" aria-label="Sizing example input" name="userName" placeholder="VotreNom" aria-describedby="inputGroup-sizing-sm">
                                    <br>

                                    <input class="form-control" aria-label="Sizing example input"  placeholder="Votre Message" aria-describedby="inputGroup-sizing-sm" name="message"><br>
                                    
                                    
                                    <input type="text" name="nameOperator"  value="<?=$operatorTourList[$i]->getName()?>" style="display: none">
                                    <button type="submit" class="btn btn-primary">Envoyer</button>
                                </form>
                                    
                            </div>
                        </div>
                    </div>
                </div>
           <?php } ?>
        <?php }?>
        <?php  for ($i=0; $i < $manager->countOperator(); $i++){
            $operatorTourList = $manager->getListOperatorTour();
            //Affichage destination premium
            if ($operatorTourList[$i]->getIsPremium() == 0) {?>
                <div class="card text-center m-2 col-lg-3" style="width: 20rem;">
                <img src="./asset/img/11404_800x480.jpg" class="card-img-top">

                <div class="card-body" >
                    <h5 class="card-title"><?=$operatorTourList[$i]->getName()?></h5>
                    <p class="card-text">Some quick example text to build.</p>

                    <a href="<?=$operatorTourList[$i]->getLink()?>" class="btn btn-primary">Site web</a>  
                    <form action="" method="post">
                        <input type="text" name="delete" value="<?= $operatorTourList[$i]->getId() ?>"  style="display: none;">
                    </form>
                    <br>
                    <h5>Commentaire de la destination</h5>
                </div>
                
                 <div class="p-2" >
                    
                    <div class="review">
                        <ul class="list-group list-group-flush overflow-auto" style="text-decoration: none; height: 140px; width:auto;">
                        <?php $getReviews = $manager->getListReview() ;
                            for ($j=0; $j < count($getReviews); $j++) { 
                                if ($getReviews[$j]->getIdTourOperator() == $operatorTourList[$i]->getId()) {?>
                                
                                    <li class="list-group-item list-group-item-secondary"><?= $getReviews[$j]->getAuthor()?></li>
                                    <li class="list-group-item list-group-item-secondary"><?=$getReviews[$j]->getMessage()?></li>

                                
                                <br>
                                <?php}else {?> 
                                
                            
                        <?php } }?></ul>
                        <br>
                        <div class="card-footer" ><br>
                            <p>Ajouter un commentaire</p>
                            <form action="" method="post">
                            

                                <input type="text" class="form-control" aria-label="Sizing example input" name="userName" placeholder="VotreNom" aria-describedby="inputGroup-sizing-sm">
                                <br>

                                <input class="form-control" aria-label="Sizing example input"  placeholder="Votre Message" aria-describedby="inputGroup-sizing-sm" name="message"><br>
                            
                                
                                <input type="text" name="nameOperator"  value="<?=$operatorTourList[$i]->getName()?>" style="display: none">
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </form>
                            
                        </div>
                    </div>
                </div>
           <?php } ?>
        </div>
        <?php }?>
    
<?php //Traitement ajout de commentaire
    if (isset($_POST['userName']) && isset($_POST['message']) && isset($_POST['nameOperator'])){
        $idOperatorTour = $manager->getOperatorTour($_POST['nameOperator'])->getId();
        $addReview = new Review([ "message" => $_POST['message'],
                 "author" => $_POST['userName'], 
                "id_tour_operator"=> $idOperatorTour ]);
        $manager->addReview($addReview);
    }
?>