
 <?php
$operatorTour = new Manager($db);


?> 
    <div class="text-compagnies">
        <h1>Laissez parler le voyageur qui est en vous</h1>
        <p>Découvrez nos compagnies les plus populaires</p>
    </div>

    <div class="container-cards row">
        <?php  for ($i=0; $i < $operatorTour->countOperator(); $i++){
            $operatorTourList = $operatorTour->getListOperatorTour();
            
           ?>
            <div class="card text-center m-2 col-lg-3" style="width: 20rem;">
                <img src="./asset/img/11404_800x480.jpg" class="card-img-top">
                <div class="card-body" >
                    <h5 class="card-title"><?=$operatorTourList[$i]->getName()?></h5>
                    <p class="card-text">Some quick example text to build.</p>
                    <a href="<?=$operatorTourList[$i]->getLink()?>" class="btn btn-primary">Site web</a>  
                    <form action="" method="post">
                        <input type="text" name="delete" value="<?= $operatorTourList[$i]->getId() ?>"  style="display: none;">
                    </form>
                </div>
            </div>
        <?php }?>
    </div>
