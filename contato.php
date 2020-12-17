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
</head>

<body>
    <?php
    require "requires/navbar.php"
    ?>
    <div class="container_main">
        <div class="container_padding" style="display: flex; align-items: center; flex-wrap: wrap;">
            <form action="" method="POST">
                <div class="input_padding">
                    <input type="text" name="" class="default_input text-entry input-text input-name" placeholder="Nome">
                </div>
                <div class="input_padding">
                    <input type="email" name="" class="default_input text-entry input-text input-email" placeholder="E-mail">
                </div>
                <div class="input_padding">
                    <textarea name="" rows="5" class="default_input text-entry input-reason" placeholder="Mensagem"></textarea>
                </div>
                <div class="input_padding">
                    <input type="submit" class="default_input input-submit" value="Enviar">
                </div>
            </form>
        </div>
    </div>
    <?php
    require "requires/footer.php"
    ?>

</body>

</html>