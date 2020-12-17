<?php
require_once "db.inc.php";

if (isset($_POST['signup-submit'])) {

  $username = $_POST['uid'];
  $email = $_POST['email'];
  $password = $_POST['pwd'];
  $password2 = $_POST['pwd2'];

  //Filtro de erros.
  if (empty($username) || empty($email)) {
    header("Location: ../signup?error=emptyfields");
    exit();
  }
  else if (!filter_var($email,FILTER_VALIDATE_EMAIL) || !preg_match("/^[a-zA-Z0-9]*$/",$username)){
    header("Location: ../signup?error=invaliduidemail");
    exit();
  }
  else if (empty($password) or empty($password2)) {
    header("Location: ../signup?error=emptyfields&uid=".$username."&email=".$email);
    exit();
  }
  else if ($password !== $password2) {
    header("Location: ../signup?error=passwordcheck");
    exit();
  }
  else {
    $pwdHash = password_hash($password, PASSWORD_DEFAULT);  

    $sql = "SELECT * FROM loginsystem WHERE emailUsers = '$email'";
    $result = mysqli_query($conn,$sql);
    if (!$result) {
      header("Location: ../signup?error=systemerror");
      exit();
    }
    $row = mysqli_fetch_row($result);
    if (sizeof($row) > 0) {
      header("Location: ../signup?error=alreadyexists");
      exit();
    }

    $sql = "INSERT INTO loginsystem (nameUsers,emailUsers,pwdUsers,levelUsers)
    VALUES
    ('$username','$email','$pwdHash',0)";
    $result = mysqli_query($conn, $sql);
    if ($result) {
      session_start();
      $_SESSION['user'] = $username;
      $_SESSION['email'] = $username;
      $_SESSION['level'] = 0;
      header("Location: ../?sucessful=created");
    }
    else {
      header("Location: ../signup?error=systemerror");
      exit();
    }
  }
}
else
{
  header("Location: ../error=invalidmethod");
  exit();
}