
 <?php $manager = new Manager($db) ?> 
    <div class="text-compagnies">
        <h1>Laissez parler le voyageur qui est en vous</h1>
        <p>Découvrez nos compagnies les plus populaires</p>
    </div>


    <div class="container-cards row ">
        <!-- Boucle pour les premium -->
        <?php  
        for ($i=0; $i < $manager->countOperator(); $i++){
            $operatorTourList = $manager->getListOperatorTour();
            //Affichage destination premium
            if ($operatorTourList[$i]->getIsPremium() == 1) { ?>
                <div class="card text-center m-2 col-lg-7" style="width: 20rem;">
                    <img src="./asset/img/11404_800x480.jpg" class="card-img-top">

                    <div class="card-body" >
                        <h5 class="card-title">⭐ <?=$operatorTourList[$i]->getName() ?></h5>
                        <p class="card-text">Note moyenne de l'opérateur : <?=$operatorTourList[$i]->getGrade()?></p>
                        <form action="" method="get">
                            <input type="text" name="idOperator" value="<?= $operatorTourList[$i]->getId() ?>"  style="display: none;">
                            <button type="submit"  class="btn btn-primary" >infos compagnie</button>
                        </form> 
                        <br>
                    </div>
                </div>
           <?php } 
         } ?>
         <!-- Boucle pour les non premium -->
        <?php  for ($i=0; $i < $manager->countOperator(); $i++){
            $operatorTourList = $manager->getListOperatorTour();
            //Affichage destination premium
            if ($operatorTourList[$i]->getIsPremium() == 0) {?>
                <div class="card text-center m-2 col-lg-7" style="width: 20rem;">
                    <img src="./asset/img/11404_800x480.jpg" class="card-img-top">
                    <div class="card-body" >
                        <h5 class="card-title"><?=$operatorTourList[$i]->getName()?></h5>
                        <p class="card-text">Note moyenne de l'opérateur : <?=$operatorTourList[$i]->getGrade()?></p>
                        <form action="" method="get">
                            <input type="text" name="idOperator" value="<?= $operatorTourList[$i]->getId() ?>"  style="display: none;">
                            <button type="submit"  class="btn btn-primary" >infos compagnie</button>
                        </form> 
                        <br>
                    </div>
                </div>
            <?php }
         } ?>
    </div>
