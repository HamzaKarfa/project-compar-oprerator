<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css2?family=Comfortaa:wght@500&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="./asset/css/styleheader.css">
    <link rel="stylesheet" href="./asset/css/style-compagnies.css">
    <title>header</title>
</head>
<body>
    <div class="container-header">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="navbar-brand" href="./index.php">Home</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="./src/page/compagnies.php">
                            <form method="GET" class="newsletter__form" >
                                <button class="btn btn-color" value="" name="Companies">Nos compagnies</button>
                             </form> <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    
                    <li class="nav-item active">
                        <a class="nav-link" href="./src/page/compagnies.php">
                            <form method="GET" class="newsletter__form" >
                                <button class="btn btn-color" value="" name="Destination">Nos destinations</button>
                             </form> <span class="sr-only">(current)</span>
                        </a>
                    </li>
                    <li class="nav-item active">
                        <a class="nav-link" href="#">Les mieux notés <span class="sr-only">(current)</span></a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
