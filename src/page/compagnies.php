
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

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
</body>
</html>