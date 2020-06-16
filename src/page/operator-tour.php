<div class="container">
<?php

    $tourOperator =  $_GET['operatorTour'];
    echo $tourOperator;
    
    $operatorTour = new Manager($db);
     echo '<br>';
         $test  = $operatorTour->getOperatorTour($tourOperator);
    var_dump($test);
    echo $test->getIsPremium();
?>
</div>