<?php
session_start();
if (isset($_SESSION['id'])) {
    header("Location: ./control");
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
    <link rel="stylesheet" href="css/default_form.css">
    <link rel="stylesheet" href="css/login.css">
</head>

<body>
    <?php
    require "requires/navbar.php"
    ?>
    <div class="container_main">
        <div class="container_padding">
            <div class="container_title">Login</div>
            <div class="container_message">
            <?php
        if (isset($_GET["error"])) {
            echo '<div class="message_error">';
            switch($_GET["error"]) {
                case "emptyfields":
                    echo ("Preencha os campos vazios!");
                break;
                case "userincorrect":
                    echo ("Usuário ou e-mail inválido!");
                break;
                case "usernotfound":
                    echo ("Usuário não cadastrado!");
                break;
                case "invalidmethod":
                    echo ("Metódo inválido!");
                break;
                case "systemerror":
                    echo ("Erro no sistema! tente novamente.");
                break;
            }
            echo ('</div>');
        }
        ?>
        </div>
            <form action="includes/login.inc.php" method="POST">
                <div class="input_padding">
                    <input type="email" name="email" class="default_input text-entry input-text input-name" placeholder="E-mail">
                </div>
                <div class="input_padding">
                    <input type="password" name="pwd" class="default_input text-entry input-text input-password" placeholder="Senha">
                </div>
                <div class="input_padding">
                    <input type="submit" name="login-submit" class="default_input input-submit" value="Logar">
                </div>
            </form>
            <a href="./signup" class="default_acess acess_subtitle">Não possui uma conta ainda? cadastre-se agora!</a>
        </div>
    </div>
    <?php
    require "requires/footer.php"
    ?>
</body>