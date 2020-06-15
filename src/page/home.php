<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="asset/css/styleheader.css">
    <title>ComparOperator</title>
</head>
<body>
    


<?php


$destination = new Manager($db);

echo '<br>';

    $test =$destination->getOperatorTour(1);
    
   echo $test->getName();


?>










</body>
</html>