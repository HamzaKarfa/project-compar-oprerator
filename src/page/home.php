

    <?php
        include './src/partials/meta-link.php';
        include './src/partials/header.php';
    ?>
<main>
    <?php
        if (isset($_GET['Destination'])) {
            include './src/page/destination-list.php';
        }else if (isset($_GET['Compagnies'])) {
            include './src/page/compagnies.php';
        }else if (isset($_GET['connexion'])) {
            include './src/page/connexion.php';
        }else if (isset($_GET['operatorTour'])) {
            include './src/page/operator-tour.php';
        }else if (isset($_GET['detailDestination'])) {
            include './src/page/detailDestination.php';
        }else if (isset($_GET['idOperator'])) {
            include './src/page/details-to.php';
        }else{
            include './src/page/LandingPage.php';
        }  
    ?>
</main>
  <?php
        include 'src/partials/footer.php';
        include 'src/partials/script.php';
    ?>
