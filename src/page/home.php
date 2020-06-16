

    <?php
        include './src/partials/meta-link.php';
        include './src/partials/header.php';
    ?>
<main>
    <?php
        if (isset($_GET['Destination'])) {
            include './src/page/destination-list.php';
        }elseif (isset($_GET['Companies'])) {
            include './src/page/compagnies.php';
        }else{
            include './src/page/LandingPage.php';
        }  
    ?>
</main>
  <?php
        include 'src/partials/footer.php';
        include 'src/partials/script.php';
    ?>
