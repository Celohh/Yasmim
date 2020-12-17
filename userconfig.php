<?php
session_start();
if (isset($_SESSION['id'])) {
    if ($_SESSION['level'] < 4) {
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
    <link rel="stylesheet" href="css/default_form.css">
    <link rel="stylesheet" href="css/prodconfig.css">
</head>

<body>
    <?php
    require "requires/navbar.php";
    ?>
    <div class="container_main">
        <div class="container_padding">
            <?php
            $id = "new";
            if (isset($_GET['id'])) {
                $id = $_GET['id'];
                if ($id == "" or $id == "new") {
                    $id = "new";
                }
            }

            if ($id == "new")
                echo '<div class="container_title">Criar usuário</div>';
            else
                echo '<div class="container_title">Alterar usuário</div>';

            if (isset($_GET["error"])) {
                $erro = $_GET["error"];
                if ($erro == "whitespace") {
                    echo '<div class="container_message"><div class="message_error">';
                    echo 'Preencha os campos em branco.';
                    echo '</div></div>';
                }
                if ($erro == "invalidpriority") {
                    echo '<div class="container_message"><div class="message_error">';
                    echo 'Prioridade inválida, tente colocar uma menor.';
                    echo '</div></div>';
                }
                if ($erro == "query") {
                    echo '<div class="container_message"><div class="message_error">';
                    echo 'Falha na conexão ao banco de dados, tente novamente.';
                    echo '</div></div>';
                }
                if ($erro == "userexists") {
                    echo '<div class="container_message"><div class="message_error">';
                    echo 'Usuário já cadastrado, tente novamente.';
                    echo '</div></div>';
                }
            }
            ?>
            <form enctype="multipart/form-data" class="flex_form" action="includes/user.inc.php" method="POST">
                <?php

                require_once "includes/db.inc.php";
                $sql = "SELECT * FROM loginsystem WHERE id = '$id'";
                $query = mysqli_query($conn, $sql);
                if ($query) {
                    $result = mysqli_fetch_row($query);
                }
                echo '<input type="text" name="id" value="' . $id . '" style="display: none">';
                ?>
                <div class="input_padding">
                    <?php
                    if ($id != "new") {
                        echo '<input type="text" name="userName" class="default_input text-entry input-text input-name" placeholder="Nome" value="' . $result[1] . '">';
                    } else {
                        echo '<input type="text" name="userName" class="default_input text-entry input-text input-name" placeholder="Nome">';
                    }
                    ?>
                </div>
                <div class="input_padding">
                    <?php
                    if ($id != "new") {
                        echo '<input type="text" name="userEmail" class="default_input text-entry input-text input-email" placeholder="E-mail" value="' . $result[2] . '">';
                    } else {
                        echo '<input type="text" name="userEmail" class="default_input text-entry input-text input-email" placeholder="E-mail">';
                    }
                    ?>
                </div>
                <div class="input_padding">
                    <?php
                    if ($id != "new") {
                        echo '<input type="password" name="userPwd" class="default_input text-entry input-text input-password" placeholder="Senha" value="' . $result[3] . '">';
                    } else {
                        echo '<input type="password" name="userPwd" class="default_input text-entry input-text input-password" placeholder="Senha">';
                    }
                    ?>
                </div>
                <div class="input_padding">
                    <?php
                    if ($id != "new") {
                        echo ('<select class="default_input text-entry input-text input-level" name="userLevel">');
                        $options = ["Usuário normal", "Administrador"];
                        for ($i = 0; $i < sizeof($options); $i++) {
                            if ($result[4] == $i) {
                                echo '<option value="' . $i . '" selected>'.$options[$i].'</option>';
                            } else {
                                echo '<option value="' . $i . '">'.$options[$i].'</option>';
                            }
                        }
                        echo '</select>';
                    } else {
                        // echo '<input type="text" name="userLevel" class="default_input text-entry input-text input-level" placeholder="Prioridade">';
                        echo ('<select class="default_input text-entry input-text input-level" name="userLevel">
                            <option value="0">Usuário normal</option>
                            <option value="1">Administrador</option>
                        </select>');
                    }
                    ?>
                </div>
                <div class="input_padding input_buttons">
                    <div class="input_padding-inner">
                    <?php
                    if ($id == "new") {
                        echo '<input type="submit" name="save-submit" class="default_input input-submit" value="Adicionar">';
                    }
                    else {
                        echo '<input type="submit" name="save-submit" class="default_input input-submit" value="Alterar">';
                    }
                    ?>
                    </div>
                    <div class="input_padding-inner">
                        <input type="submit" name="del-submit" class="default_input input-submit" value="Deletar">
                    </div>
                </div>
            </form>
            <a href="./users" class="default_acess acess_subtitle">Voltar (Sem salvar)</a>
        </div>
    </div>
    <script src="js/imagepreview.js"></script>
    <?php
    if ($id != "new") {
        echo '<script>disableImageBackground()</script>';
    }
    require "requires/footer.php";
    ?>
</body>