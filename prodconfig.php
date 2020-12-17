<?php
session_start();
if (isset($_SESSION['id'])) {
    if ($_SESSION['level'] < 2) {
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
            echo '<div class="container_title">Criar produto</div>';
            else
            echo '<div class="container_title">Alterar produto</div>';

            if (isset($_GET["error"])) {
                $erro = $_GET["error"];
                if ($erro == "whitespace") {
                    echo '<div class="container_message"><div class="message_error">';
                    echo 'Preencha os campos em branco.';
                    echo '</div></div>';
                }
                if ($erro == "query") {
                    echo '<div class="container_message"><div class="message_error">';
                    echo 'Falha na conexão ao banco de dados, tente novamente.';
                    echo '</div></div>';
                }
                if ($erro == "invalidFormat") {
                    echo '<div class="container_message"><div class="message_error">';
                    echo 'Formato invalido de imagem.';
                    echo '</div></div>';
                }
                if ($erro == "notUploaded") {
                    echo '<div class="container_message"><div class="message_error">';
                    echo 'Imagem não detectada, tente selecionar uma.';
                    echo '</div></div>';
                }
            }
            ?>
            <form enctype="multipart/form-data" class="flex_form" action="includes/prod.inc.php" method="POST">
                <?php
                require_once "includes/db.inc.php";
                $sql = "SELECT * FROM prodsystem WHERE id = '$id'";
                $query = mysqli_query($conn, $sql);
                if ($query) {
                    $result = mysqli_fetch_row($query);
                }
                echo '<input type="text" name="id" value="' . $id . '" style="display: none">';
                ?>
                <div class="column_form column_form-left">
                    <input type="file" name="prodImg" id="prodImg" onchange="loadFile(event)" style="display: none;">
                    <?php
                    if ($id == "new") {
                        echo '<label class="img_selector" id="img_selector" for="prodImg"><span id="img_selector-placeholder">Selecione uma imagem</span><img id="img_output" src=""/></label>';
                    } else {
                        echo '<label class="img_selector" id="img_selector" for="prodImg"><span id="img_selector-placeholder">Selecione uma imagem</span><img id="img_output" src="imgs/database/' . $result[1] . '"/></label>';
                    }
                    ?>
                </div>
                <div class="column_form column_form-right">
                    <div class="input_padding">
                        <?php
                        if ($id != "new") {
                            echo '<input type="text" name="prodName" class="default_input text-entry input-text input-name" placeholder="Nome" value="' . $result[2] . '">';
                        } else {
                            echo '<input type="text" name="prodName" class="default_input text-entry input-text input-name" placeholder="Nome">';
                        }
                        ?>
                    </div>
                    <div class="input_padding">
                        <?php
                        if ($id != "new") {
                            echo '<textarea name="prodDesc" class="default_input text-entry" rows="10" placeholder="Descrição">' . $result[3] . '</textarea>';
                        } else {
                            echo '<textarea name="prodDesc" class="default_input text-entry" rows="10" placeholder="Descrição"></textarea>';
                        }
                        ?>
                    </div>
                    <div class="input_padding">
                        <?php
                        if ($id != "new") {
                            echo '<input type="text" name="prodPrice" class="default_input text-entry input-text input-price" placeholder="Preço a vista" value="' . $result[4] . '">';
                        } else {
                            echo '<input type="text" name="prodPrice" class="default_input text-entry input-text input-price" placeholder="Preço a vista">';
                        }
                        ?>
                    </div>
                    <div class="input_padding inputs_inner">
                        <div class="input_padding-inner">
                            <?php
                            if ($id != "new") {
                                echo '<input type="text" name="prodTimes" class="default_input text-entry input-text input-times" maxlength="3" placeholder="Max. parcelas" value="' . $result[5] . '">';
                            } else {
                                echo '<input type="text" name="prodTimes" class="default_input text-entry input-text input-times" maxlength="3" placeholder="Max. parcelas">';
                            }
                            ?>
                        </div>
                        <div class="input_padding-inner text_compl">
                            de R$
                        </div>
                        <div class="input_padding-inner">
                            <?php
                            if ($id != "new") {
                                echo '<input type="text" name="prodPricetimes" class="default_input text-entry input-text input-pricetimes" placeholder="Valor parcelado" value="' . $result[6] . '">';
                            } else {
                                echo '<input type="text" name="prodPricetimes" class="default_input text-entry input-text input-pricetimes" placeholder="Valor parcelado">';
                            }
                            ?>
                        </div>
                    </div>
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
            <a href="./prods" class="default_acess acess_subtitle">Voltar (Sem salvar)</a>
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