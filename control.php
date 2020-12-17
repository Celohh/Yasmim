<?php
// session_start();
// if (!(isset($_SESSION['user']) && $_SESSION['priority'] >= 1)) {
//     header("Location: ./");
// }
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
    <link rel="stylesheet" href="css/control.css">
</head>

<body>
    <?php
    require "requires/navbar.php"
    ?>
    <div class="container_main">
        <div class="container_padding">
            <div class="option_system">
                <!-- Option system -->
                <?php
                if (isset($_SESSION["id"]) && $_SESSION["level"] >= 3) {
                    echo ('<div class="system-option_deck">
                    <div class="system-option_area">
                        <a href="./users" class="system-option">
                            <div class="system_option-text">
                                Controle de usuários
                            </div> <!-- system_option-text -->
                        </a> <!-- system_option -->
                        <div class="system-option_bottom">
                            Acessar
                        </div> <!-- system-option_bottom -->
                    </div> <!-- system-option_area -->
                </div> <!-- system-option_deck -->');
                }
                if (isset($_SESSION["id"]) && $_SESSION["level"] >= 1) {
                echo ('<div class="system-option_deck">
                    <div class="system-option_area">
                        <a href="./prods"class="system-option">
                            <div class="system_option-text">
                                Controle de serviços
                            </div> <!-- system_option-text -->
                        </a> <!-- system_option -->
                        <div class="system-option_bottom">
                            Acessar
                        </div> <!-- system-option_bottom -->
                    </div> <!-- system-option_area -->
                </div> <!-- system-option_deck -->');
                }
                ?>
                <div class="system-option_deck">
                    <div class="system-option_area">
                        <a href="includes/logout.inc.php" class="system-option">
                            <div class="system_option-text">
                                Deslogar
                            </div> <!-- system_option-text -->
                        </a> <!-- system_option -->
                        <div class="system-option_bottom">
                            Sair
                        </div> <!-- system-option_bottom -->
                    </div> <!-- system-option_area -->
                </div> <!-- system-option_deck -->
            </div>
        </div>
    </div>
    <?php
    require "requires/footer.php"
    ?>
</body>