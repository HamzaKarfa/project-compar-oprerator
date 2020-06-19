<?php include "src/partials/meta-link.php" ?>
<?php include "src/partials/header-admin.php" ?>

<main class='container d-flex justify-content-center flex-column pt-5 border-0 '>

<?php

$manager = new Manager($db);

?>         
 <?php //Traitement formulaire ajout compagnie
    if (isset($_POST['OperatorName']) && isset($_POST['OperatorLink']) ) {

        if(isset($_POST['OperatorPremium'])) {
            $_POST['OperatorPremium'] = 1;
        }else{
            $_POST['OperatorPremium'] = 0;
        }

        $compagnie = new OperatorTour([  "name" => $_POST['OperatorName'], 
                                    "link"=>$_POST['OperatorLink'], 
                                    "grade"=>0 , 
                                    "is_premium" => $_POST['OperatorPremium']]);
        $manager->addOperatorTour($compagnie);
    }
?> 
<?php //Traitement formulaire Modification compagnie
    if (isset($_POST['newOperatorName']) && isset($_POST['newOperatorLink']) ) {

        if(isset($_POST['newOperatorPremium'])) {
            $_POST['newOperatorPremium'] = 1;
        }else{
            $_POST['newOperatorPremium'] = 0;
        }

        $compagnie = new OperatorTour([ 
                                    "id" => $_POST['newOperatorId'], 
                                    "name" => $_POST['newOperatorName'], 
                                    "link"=>$_POST['newOperatorLink'], 
                                    "grade"=>0 , 
                                    "is_premium" => $_POST['newOperatorPremium']]);
        $manager->updateOperatorTour($compagnie);
    }
?> 
<div class="row">

    <div class="compagnies-content text-center col-lg-6">
        
        <h3>Ajouter une compagnie :</h3>
        <br>
        <form action="" method="Post">

            <input class="op1" type="text" name="OperatorName"placeholder="Nom de l'operateur">
            <br> 
            <input class="op2" type="url" name="OperatorLink" placeholder="Lien vers l'operateur">
            <br>
            <h5> Premium ⭐</h5>
            <input class="premium1" type="checkbox" name="OperatorPremium"  id="OperatorPremium">
            <br>
            <button type="submit" class="btn btn-outline-primary">Ajouter</button>
        </form>
        
    </div>
    <div class="compagnies-content text-center col-lg-6">
        
        <h3>Modifier une compagnie :</h3>
        <form action="" method="Post">

            <select name="newOperatorId">
                <?php for ($i=0; $i < $manager->countOperator() ; $i++) { 
                   $operatorTourList = $manager->getListOperatorTour();
                ?>
                <option value="<?=$operatorTourList[$i]->getId()?>"><?=$operatorTourList[$i]->getName()?></option>
                <?php } ?>
            </select>
            <br> 
            <input class="op2" type="text" name="newOperatorName" placeholder="Nom de l'operateur">
            <br> 
            <input class="op2" type="url" name="newOperatorLink" placeholder="Lien vers l'operateur">
            <br>
            <h5>⭐ Premium</h5>
            <input class="premium1" type="checkbox" name="newOperatorPremium"  id="OperatorPremium">
            <br>
            <button type="submit" class="btn btn-outline-primary">Modifier</button>
        </form>
        
    </div>
</div>
<br>
<hr>
<div class ="row">
    <div class ="col-lg-6 text-center">
        <h5>Nombre de tour opérateur : <strong><?= $manager->countOperator()?> </strong></h5>        
    </div>
    <div class ="col-lg-6 text-center">
        <h5> Nombre de Destination : <strong><?= $manager->countDestination()?></strong> </h5>        
    </div>
</div>
<hr>
    <!-- Card Premium -->
    <h2 class="text-center"> Opérateurs avec Contrat Premium : <?=$manager->countOperatorPremium()?></h2>

    <div class="container-cards row">
        <?php  
        for ($i=0; $i < $manager->countOperator(); $i++){
            $operatorTourList = $manager->getListOperatorTour();
            if ($operatorTourList[$i]->getIsPremium() == 1) {
           ?>
            <div class="card text-center m-2" style="width: 20rem;">
                <div class="card-body" >
                    <h5 class="card-title"><?=$operatorTourList[$i]->getName()?>⭐</h5>
                    <a href="<?=$operatorTourList[$i]->getLink()?>" class="btn btn-primary m-2">Site Web</a>  
                    <form action="" method="post">
                        <input type="text" name="delete" value="<?= $operatorTourList[$i]->getId() ?>"  style="display: none;">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        <?php 
            } 
        }?>
        

    </div>
    <hr>
    <!-- Card Standard -->
    <h2 class="text-center"> Opérateurs avec Contrat Standard</h2>
    <div class="container-cards row">
        <?php  
        for ($i=0; $i < $manager->countOperator(); $i++){
            $operatorTourList = $manager->getListOperatorTour();
            if ($operatorTourList[$i]->getIsPremium() == 0) {
           ?>
            <div class="card text-center m-2" style="width: 20rem;">
                <div class="card-body" >
                    <h5 class="card-title"><?=$operatorTourList[$i]->getName()?></h5>
                    <a href="<?=$operatorTourList[$i]->getLink()?>" class="btn btn-primary m-2">Site Web</a>  
                    <form action="" method="post">
                        <input type="text" name="delete" value="<?= $operatorTourList[$i]->getId() ?>"  style="display: none;">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </div>
            </div>
        <?php 
            } 
        }?>
    

    </div>
    <?php 
    
    if (isset($_POST['delete'])){
        echo $_POST['delete'];
        $manager->deleteOperatorTour($_POST['delete']); 
    }?>

</main>
<?php include "src/partials/footer.php" ?>
<?php include "controler/debug-info.php"?>
<?php include "src/partials/script.php" ?>
