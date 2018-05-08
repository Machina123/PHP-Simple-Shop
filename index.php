<?php include "products.inc.php"; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Sklep TelefonyDlaLudu.eu</title>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">TelefonyDlaLudu.eu</h1>
                <div class="alert alert-info" role="alert"><strong>Promocja!</strong> Zamów 5 lub więcej sztuk danego produktu, a otrzymasz 10% rabatu!</div>
                <form action="dane.php" method="post">
                    <table class="table">
                        <tbody>
                            <?php
                                $prodcount = count($_PRODUCTS);
                                for($i=1; $i<=$prodcount; $i++) {
                                    $name = $_PRODUCTS["product$i"]["name"];
                                    $imageurl = $_PRODUCTS["product$i"]["image"];
                                    $price = number_format($_PRODUCTS["product$i"]["price"], 2, ",", "");
                                    echo <<<EOT
                                    <tr>
                                        <td><img class="img-responsive" src="$imageurl" alt="$name" style="height: 160px;"></td>
                                        <td><h3>$name</h3><p>Cena: $price PLN</p>
                                        <td><div class="form-group"><label for="product$i">Ilość: </label><input type="number" min="0" step="1" name="product$i" class="form-control" placeholder="0"></div></td>
                                    </tr>
EOT;
                                }
                            ?>
                        </tbody>
                    </table>  
                    <button class="btn btn-success btn-lg w-100 d-block" type="submit">Złóż zamówienie</button><br>
                </form>
                <p class="text-center">&copy;2018 TelefonyDlaLudu.eu - wszelkie prawa zastrzeżone</p>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>