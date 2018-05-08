<?php 
    if(!isset($_POST["name"])) {
        echo "Nie mozna wyswietlic faktury - brakuje danych!";
        exit;
    }
    include "products.inc.php";
    $sum = 0.0; 
?>
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
    <div class="container my-3">
        <div class="row">
            <div class="col">
                <h6 class="text-right">Kraków, <?php echo date("d-m-Y"); ?></h6>
                <h1 class="text-center">FAKTURA NR <?php echo mt_rand(1,999) . "/" . date("m/Y"); ?></h1>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col-12 col-lg-6">
                <h2>Sprzedawca:</h2>
                <p>TelefonyDlaLudu.eu<br>Patryk Ciepiela<br>ul. Krakowska 13<br>32-088 Brzozówka<br>NIP: 945 123 45 67<br>Telefon: 12 345 67 89</p>
            </div>
            <div class="col-12 col-lg-6">
                <h2>Nabywca:</h2>
                <p>
                    <?php
                        $name = $_POST["name"];
                        $entityname = $_POST["entityname"];
                        $address = $_POST["address"];
                        $postcode = $_POST["postcode"];
                        $city = $_POST["city"];
                        $vatid = $_POST["vatid"];
                        $phoneno = $_POST["phoneno"];
                        if(!empty($entityname)) echo "$entityname <br>";
                        echo "$name<br>";
                        echo "$address<br>";
                        echo "$postcode $city<br>";
                        if(!empty($vatid)) echo "NIP: $vatid<br>";
                        echo "Telefon: $phoneno";
                    ?>
                </p>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">Lp.</th>
                            <th scope="col">Nazwa</th>
                            <th scope="col">Cena jedn.</th>
                            <th scope="col">Ilość</th>
                            <th scope="col">Wartość przed rabatem</th>
                            <th scope="col">Rabat</th>
                            <th scope="col">Wartość po rabacie</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            $prodcount = count($_PRODUCTS);
                            $iter = 1;
                            $pricemult = 1;
                            $rebatetext = "0%";
                            for($i = 1; $i < $prodcount; $i++) {
                                if(isset($_POST["product$i"])) {
                                    $ithproductcount = $_POST["product$i"];
                                    $priceofproduct = $_PRODUCTS["product$i"]["price"];
                                    $sumofproduct = $ithproductcount * $priceofproduct;
                                    $nameofproduct = $_PRODUCTS["product$i"]["name"];
                                    if($ithproductcount >= 5) {
                                        $pricemult = 0.9;
                                        $rebatetext = "10%";
                                    } else {
                                        $pricemult = 1;
                                        $rebatetext = "0%";
                                    }
                                    $sumafterrebate = $sumofproduct * $pricemult;
                                    $sum += $sumafterrebate;
                                    echo "<tr>\n";
                                    echo "<td>$iter</td>\n";
                                    echo "<td>$nameofproduct</td>\n";
                                    echo "<td>". number_format($priceofproduct, 2, ",", " ") . " PLN</td>\n";
                                    echo "<td>$ithproductcount szt.</td>\n";
                                    echo "<td>" . number_format($sumofproduct, 2, ",", " ") . " PLN</td>\n";
                                    echo "<td>$rebatetext</td>\n";
                                    echo "<td>" . number_format($sumafterrebate, 2, ",", " ") . " PLN</td>\n</tr>\n";
                                    $iter++;
                                }
                            }
                        ?>
                    </tbody>
                </table>
                <h3 class="text-right">Łącznie: <?php echo number_format($sum, 2, ","," ") . " PLN";?></h3>
            </div>
        </div>
    </div>
</body>
</html>