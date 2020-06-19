<?php

$manager = new Manager($db);

$operatorTour = $manager->getOperatorTour(intval($_GET['idOperator']));

$reviews = $manager->getReview($operatorTour->getId());


?>
    <h1 class="op-name"><?=$operatorTour->getName()?></h1>

    <br>
            <?php
            for ($i=0; $i < count($reviews); $i++) { ?>

        <div class="container-reviews">
            <div class="card text-center col-6 lg-3 m-2" style="width: 18rem;">
                <div class="card-body">
                    <h5 class="card-title"><?= $reviews[$i]->getAuthor();?></h5>
                    <p class="card-text"><?= $reviews[$i]->getMessage()?> </p>
                </div>
            </div>
        </div>
<?php 
}
?>
    <div> <br>
        <p>Ajouter un commentaire</p>
        <form action="" method="post">
            <input type="text" class="form-control" aria-label="Sizing example input" name="userName" placeholder="VotreNom" aria-describedby="inputGroup-sizing-sm">
            <br>
            <input class="form-control" aria-label="Sizing example input"  placeholder="Votre Message" aria-describedby="inputGroup-sizing-sm" name="message"><br>
            <p>Note de l'opérateur</p>
            <select name="vote" id="">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
            </select>
            <br>
            <br>
            <input type="text" name="nameOperator"  value="<?=$operatorTourList[$i]->getName()?>" style="display: none">
            <button type="submit" class="btn btn-primary">Envoyer</button>
        </form>   
    </div>
<?php // Traitement Ajout commentaire 
    if (isset($_POST['userName']) && isset($_POST['message']) && isset($_POST['nameOperator'])) {
        $idOperatorTour = $manager->getOperatorTour($_POST['nameOperator']);
        $addReview = new Review([
                "message" => $_POST['message'],
                "author" => $_POST['userName'], 
                "id_tour_operator"=> $idOperatorTour->getId(),
                "vote"=> $_POST['vote'] ]
            );
        // $manager->updateGradeOperatorTour($idOperatorTour->getId());
        $Allreviews = $manager->getOperatorTourReview($idOperatorTour->getId());
        $test = null;
        for ($i=0; $i <count($Allreviews) ; $i++) { 
            
            $test += intval($Allreviews[$i]['vote']);
        }
        echo $test/count($Allreviews);
         $manager->updateGradeOperatorTour($idOperatorTour->getId(),$test/count($Allreviews));
        
        $manager->addReview($addReview);
    }
?>

    