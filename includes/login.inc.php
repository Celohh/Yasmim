<?php

if (isset($_POST['login-submit'])) {

  $email = $_POST['email'];
  $password = $_POST['pwd'];

  if (empty($email) || empty($password)) {
    header("Location: ../login?error=emptyfields");
    exit();
  }

  require_once "db.inc.php";
  $sql = "SELECT * FROM loginsystem WHERE emailUsers = '$email'";
  $resultado = mysqli_query($conn, $sql);
  if (!$resultado) {
    header("Location: ../login?error=systemerror");
    exit();
  }

  $row = mysqli_fetch_row($resultado);

  if (mysqli_num_rows($resultado) <= 0) {
    header("Location: ../login?error=usernotfound");
    exit();
  }

  $resultado = mysqli_query($conn, $sql);
  if (!$resultado) {
    header("Location: ../login?error=systemerror");
    exit();
  }

  $row = mysqli_fetch_row($resultado);
  $pwdCheck = password_verify($password, $row[3]);

  if ($pwdCheck == true) {
    session_start();
    $_SESSION["id"] = $row[0];
    $_SESSION["user"] = $row[1];
    $_SESSION["level"] = $row[4];
    if ($_SESSION["level"] >= 3) {
      header("Location: ../control?sucessful");
    } else {
      header("Location: ../?sucessful");
    }
  } else if ($pwdCheck == false) {
    header("Location: ../login?error=userincorrect");
    exit();
  }
} else {
  header("Location: ../?error=invalidmethod");
  exit();
}
