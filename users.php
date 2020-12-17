<?php
session_start();
if (isset($_SESSION['id'])) {
    if ($_SESSION['level'] < 3) {
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
    <link rel="stylesheet" href="css/users.css">
</head>

<body>
    <?php
    require_once "requires/navbar.php";
    ?>
    <div class="container_main">
        <div class="container_padding">
            <div class="item_deck item_deck-example">
                <div class="item_deck-acess item-example" style="cursor: default;">
                    <div class="item_tag user_name">Nome</div>
                    <div class="item_tag user_email">E-mail</div>
                    <div class="item_tag user_level">Prioridade</div>
                </div>
            </div> <!-- item_deck -->
            <?php
            require "includes/db.inc.php";
            $priority = $_SESSION["level"];
            $sql = "SELECT id, nameUsers, emailUsers, levelUsers FROM loginsystem WHERE levelUsers < '$priority'";
            $query = mysqli_query($conn, $sql);
            $result = mysqli_fetch_all($query);
            if (sizeof($result) > 0) {
                for ($i = 0; $i < sizeof($result); $i++) {
                    echo ('<div class="item_deck">
                    <a href="./userconfig?id=' . $result[$i][0] . '" class="item_deck-acess">
                        <div class="item_tag user_name">' . $result[$i][1] . '</div>
                        <div class="item_tag user_email">' . $result[$i][2] . '</div>
                        <div class="item_tag user_level">' . $result[$i][3] . '</div>
                    </a>
                </div> <!-- item_deck -->');
                }
            }
            ?>
            <div class="item_deck">
                <a href="./userconfig?id=new" class="item_deck-acess">
                    Adicionar usuário
                </a>
            </div> <!-- item_deck -->
        </div>
    </div>
    <?php
    require "requires/footer.php";
    ?>
</body>