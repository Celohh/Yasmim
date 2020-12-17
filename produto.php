<?php
if (!isset($_GET["id"]) || $_GET["id"] == "")
    header("Location: ./");
else {
    $id = $_GET["id"];
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
    <link rel="stylesheet" href="css/produto.css">
</head>

<body>
    <?php
    require "requires/navbar.php";
    require_once "includes/db.inc.php";
    ?>
    <div class="container_main">
        <div class="container_padding container_background">
            <div class="container_margin">
                <div class="column_form column_form-left">
                    <div class="input_padding">
                        <?php
                        require_once "includes/db.inc.php";
                        $sql = "SELECT * FROM prodsystem WHERE id = '$id'";
                        $query = mysqli_query($conn, $sql);
                        $result = mysqli_fetch_row($query);
                        echo '<img src="imgs/database/' . $result[1] . '" alt="">';
                        ?>
                    </div>
                </div>
                <div class="column_form column_form-right">
                    <div class="product-info info_division">
                        <?php
                        echo '<div class="text_tag text_title input_padding"><span>' . $result[2] . '</span></div>';
                        echo '<div class="text_tag text_price input_padding"><span>R$ ' . $result[4] . '</span></div>';
                        echo '<div class="text_tag text_subprice input_padding"><span>ou ' . $result[5] . 'x de R$ ' . $result[6] . '</span></div>';
                        ?>
                    </div>
                    <div class="input_button input_padding info_division"><button class="input-submit">Comprar</button></div>
                </div>
            </div>
        </div>
        <div class="container_padding">
            <div class="container_title">
                <div class="text_title">
                    Descrição
                </div>
            </div>
            <?php
            echo '<div class="text_tag text_desc input_padding"><span>'.$result[3].'</span></div>'
            ?>
        </div>
    </div>
    <?php
    require "requires/footer.php";
    ?>
</body>

</html>