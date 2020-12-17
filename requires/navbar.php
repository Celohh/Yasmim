<?php
if (session_status() != 2) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="pt-BR">

<body>
    <div class="navbar_bg">
        <nav class="navbar navbar_top navbar_default">
            <a href="./" class="nav_logo nav_item nav_padding">
                <span class="nav_logo-first nav_logo-text">YAS</span>
                <span class="nav_logo-late nav_logo-text">LINS</span>
            </a>
            <div class="nav_search nav_item">
                <?php
                $search = "";
                if (isset($_GET["search"]) && $_GET["search"] != "") {
                    $search = $_GET['search'];
                }
                echo '<input type="text" class="nav_search-input" id="nav_search-input" placeholder="Procurar" value="'.$search.'">';
                ?>
                <button class="nav_search-button" id="nav-search_button">
                    <img src="imgs/includes/search-icon.png" class="nav_search-img" alt="procurar">
                </button>
            </div>
            <a href="./login" class="nav_login nav_item nav_padding" id="nav-search"><img src="imgs/includes/login-icon.png" alt="login"></a>
        </nav>
        <nav class="navbar navbar_bot navbar_default navbar-expand-lg navbar-light bg-light">
            <button class="navbar-toggler" id="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a href="./" class="nav_bot-item">Tatuagens</a>
                    <a href="./contato" class="nav_bot-item">Contato</a>
                    <a href="./login" class="nav_bot-item item-mobile">Login</a>
                    <a href="./about" class="nav_bot-item">Sobre</a>
                </div>
            </div>
        </nav>
    </div>
    <script src="js/navbar.js"></script>
</body>

</html>