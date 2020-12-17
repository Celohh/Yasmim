<?php
session_start();
if (isset($_SESSION['id'])) {
    if ($_SESSION['level'] < 1) {
        header("Location: ./");
    }
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YASLINS</title>
    <link rel="shortcut icon" href="imgs/includes/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/controls.css">
    <link rel="stylesheet" href="css/prods.css">
</head>

<body>
    <?php
    require "requires/navbar.php";
    ?>
    <div class="container_main">
        <div class="container_padding">
            <div class="item_deck item_deck-example">
                <div class="item_deck-acess item-example" style="cursor: default;">
                    <div class="item_tag prod_img"><span>Imagem</span></div>
                    <div class="item_tag prod_name"><span>Nome</span></div>
                    <div class="item_tag prod_price"><span>Preço</span></div>
                </div>
            </div> <!-- item_deck -->
            <?php
            require "includes/db.inc.php";
            $sql = "SELECT id, imageProds, nameProds, priceProds FROM prodsystem";
            $query = mysqli_query($conn,$sql);
            $result = mysqli_fetch_all($query);

            for ($i = 0; $i < sizeof($result); $i++) {
            echo ('<div class="item_deck">
                <a href="prodconfig?id='.$result[$i][0].'" class="item_deck-acess">
                    <div class="item_tag prod_img"><img src="imgs/database/'.$result[$i][1].'" alt=""></div>
                    <div class="item_tag prod_name"><span>'.$result[$i][2].'</span></div>
                    <div class="item_tag prod_price"><span>'.$result[$i][3].'</span></div>
                </a>
            </div> <!-- item_deck -->');
            }
            if (isset($_SESSION["id"]) && $_SESSION["level"] >= 4) {
            echo ('<div class="item_deck">
                <a href="prodconfig?id=new" class="item_deck-acess">
                    Adicionar item
                </a>
            </div> <!-- item_deck -->');
        }
            ?>
        </div>
    </div>
    <?php
    require "requires/footer.php";
    ?>
</body>