
 <?php

 $destination = new Manager($db);
 echo '<br>';
     $test =$destination->getOperatorTour(1);
  

?> 
    <div class="text-compagnies">
        <h1>Laissez parler le voyageur qui est en vous</h1>
        <p>Découvrez nos compagnies les plus populaires</p>
    </div>


    <div class="container-cards">
    <?php  for ($i=0; $i <6; $i++):?>

        <div class="card text-center " style="width: 20rem;">
            <img src="./asset/img/11404_800x480.jpg" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title"><?=$test->getName()?></h5>
                <p class="card-text">Some quick example text to build.</p>
                <a href="<?=$test->getLink()?>" class="btn btn-primary">Go somewhere</a>  
            </div>
        </div>
        <?php endfor ;?>
    </div>
