


<?php

// connexion à la DB
  require './controler/DB-connexion.php';
// Autoloader.
  include 'controler/autoloader.php';


if (isset($_GET['admin'])) {
    
    include "./src/page/admin-page.php";
}else{
    include "./src/page/home.php";
}




?>