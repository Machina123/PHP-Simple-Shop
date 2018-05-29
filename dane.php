<?php include "products.inc.php"; ?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sklep TelefonyDlaLudu.eu</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col">
                <h1 class="text-center">TelefonyDlaLudu.eu</h1>
                <h2 class="text-center">Podaj dane do wysyłki</h2>
                <form action="faktura.php" method="post">
                    <?php
                        $countempty = 0;
                        $prodcount = count($_PRODUCTS);
                        for($i=1; $i<=$prodcount; $i++) {
                            if(!empty($_POST["product$i"])) {
                                $ithproductcount = $_POST["product$i"];
                                echo "<input type=\"hidden\" name=\"product$i\" value=\"$ithproductcount\">";
                            } else $countempty++;
                        }
                        if($countempty == $prodcount) {
                            echo "<div class=\"alert alert-danger\" role=\"alert\">Nie wybrano żadnego produktu!</div>";
                        } else {
                            echo "<div class=\"alert alert-info\" role=\"alert\"><strong>Wybrano następujące produkty:</strong><br><ul>";
                            for($i=1; $i<=$prodcount; $i++) {
                                if(!empty($_POST["product$i"])) {
                                    $ithproductcount = $_POST["product$i"];
                                    $ithproductname = $_PRODUCTS["product$i"]["name"];
                                    echo "<li>$ithproductcount x $ithproductname";
                                    if($ithproductcount >= 5) echo " <em>(rabat 10%)</em>";
                                    echo "</li>";
                                }
                            }
                            echo "</ul></div>";
                        }
                    ?>
                    <div class="form-group">
                        <label for="name">Imię i nazwisko <span class="reqd">*</span></label>
                        <input type="text" class="form-control" required name="name">
                    </div>
                    <div class="form-group">
                        <label for="entityname">Nazwa firmy</label>
                        <input type="text" class="form-control" name="entityname">
                    </div>
                    <div class="form-group">
                        <label for="address">Adres <span class="reqd">*</span></label>
                        <input type="text" class="form-control" name="address" required>
                        <small class="form-text text-muted">Ulica, numer budynku, numer mieszkania</small>
                    </div>
                    <div class="form-group">
                        <label for="postcode">Kod pocztowy <span class="reqd">*</span></label>
                        <input type="text" class="form-control" name="postcode" required pattern="[0-9]{2}-[0-9]{3}">
                        <small class="form-text text-muted">W formacie 12-345</small>
                    </div>
                    <div class="form-group">
                        <label for="city">Miejscowość <span class="reqd">*</span></label>
                        <input type="text" class="form-control" name="city" required>
                    </div>
                    <div class="form-group">
                        <label for="vatid">Numer NIP</label>
                        <input type="text" class="form-control" name="vatid" pattern="[0-9]{10}">
                        <small class="form-text text-muted">Bez myślników</small>
                    </div>
                    <div class="form-group">
                        <label for="phoneno">Numer telefonu <span class="reqd">*</span></label>
                        <input type="tel" class="form-control" name="phoneno" required>
                    </div>
                    <button type="submit" class="btn btn-success btn-lg d-block w-100" <?php if($countempty == $prodcount) echo "disabled"; ?>>Złóż zamówienie i pobierz fakturę</button>
                    <p class="text-center">* - pole wymagane</p>
                </form>
            </div>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
</body>
</html>