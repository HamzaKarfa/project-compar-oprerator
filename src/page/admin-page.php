<?php include "src/partials/meta-link.php" ?>
<?php include "src/partials/header-admin.php" ?>

<main class='container d-flex justify-content-center flex-column pt-5 border-0 '>

<?php

$operatorTour = new Manager($db);

?>         
 <?php 
    if (isset($_POST['OperatorName']) && isset($_POST['OperatorLink']) ) {

        if(isset($_POST['OperatorPremium'])) {
        }
        else {
            $_POST['OperatorPremium'] = false;
        }
        $compagnie = new OperatorTour([  "name" => $_POST['OperatorName'], 
                                    "link"=>$_POST['OperatorLink'], 
                                    "grade"=>0 , 
                                    "isPremium" => $_POST['OperatorPremium']]);
                                    var_dump($compagnie);
        $operatorTour->addOperatorTour($compagnie);
    }
?> 
    <div class="compagnies-content text-center">
        
        <h3>Ajouter une compagnie :</h3>
        <form action="" method="Post">
            <label for="OperatorName">Nom : </label>
            <input type="text" name="OperatorName" id="OperatorName" placeholder="Nom de l'operateur"><br> 
            <label for="OperatorLink">Lien du site de l'opérateur : </label>
            <input type="url" name="OperatorLink" id="OperatorLink" placeholder="Lien vers l'operateur"> <br>
            <label for="OperatorLink">Premium : </label>
            <input type="checkbox" name="OperatorPremium"  id="OperatorPremium"> <br>
            <button type="submit">Ajouter</button>
        </form>


    </div>

    <!-- Card -->
    <div class="container-cards">
        <?php  for ($i=0; $i < $operatorTour->countOperator(); $i++){
            $operatorTourList = $operatorTour->getListOperatorTour();
            
           ?>
            <div class="card text-center " style="width: 20rem;">
                <img src="./asset/img/11404_800x480.jpg" class="card-img-top">
                <div class="card-body" >
                    <h5 class="card-title"><?=$operatorTourList[$i]->getName()?></h5>
                    <p class="card-text">Some quick example text to build.</p>
                    <a href="<?=$operatorTourList[$i]->getLink()?>" class="btn btn-primary">Go somewhere</a>  
                    <form action="" method="post">
                        <input type="text" name="delete" value="<?= $operatorTourList[$i]->getId() ?>"  style="display: none;">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>

                </div>
            </div>
        <?php }?>
        

    </div>
    <?php 
    
    if (isset($_POST['delete'])){
        echo $_POST['delete'];
        $operatorTour->deleteOperatorTour($_POST['delete']); 
    }?>
</main>
<?php include "src/partials/footer.php" ?>
<?php include "controler/debug-info.php"?>
<?php include "src/partials/script.php" ?>
