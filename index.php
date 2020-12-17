<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>YASLINS</title>
    <link rel="shortcut icon" href="imgs/includes/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/index.css">
</head>

<body>
    <?php
    require "requires/navbar.php"
    ?>
    <div class="container_main">
        <div class="container_padding">
            <div class="section">
                <div class="section-title">
                    Tatuagens
                </div>
                <section class="tatto_list">
                    <?php
                    require_once "includes/db.inc.php";
                    if (isset($_GET["search"]) && $_GET["search"] != "") {
                        $search = $_GET['search'];
                        $sql = "SELECT * FROM prodsystem WHERE nameProds LIKE '%$search%'";
                    }
                    else {
                        $sql = "SELECT * FROM prodsystem";
                    }
                    $query = mysqli_query($conn, $sql);
                    $result = mysqli_fetch_all($query);

                    for ($i = 0; $i < sizeof($result); $i += 1) {
                        echo ('<div class="tatto-item_deck">
                        <a href="./produto?id='.$result[$i][0].'"class="tatto-area">
                        <div class="tatto-bg">
                            <div class="tatto-item">
                                <div class="item-topside item-side">
                                    <img src="imgs/database/' . $result[$i][1] . '" alt="Tatuagem">
                                    <span>
                                        ' . $result[$i][2] . '
                                    </span>
                                </div>
                                <div class="item-midside item-side">
                                    '.$result[$i][3].'
                                </div>
                                <div class="item-botside item-side">
                                    <div class="item-price">
                                        R$ '.$result[$i][4].'
                                    </div>
                                    <div class="item-subprice">
                                        ou '.$result[$i][5].'x de R$ '.$result[$i][6].'
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tatto_bottom">
                            COMPRAR
                        </div>
                        </a>
                    </div> <!--tatto-item_deck-->');
                    }
                    ?>
                </section>
            </div>
        </div>
    </div>
    <?php
    require "requires/footer.php"
    ?>
</body>

</html>