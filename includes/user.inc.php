<?php
session_start();
if (isset($_SESSION['id'])) {
    if ($_SESSION['level'] < 4) {
        header("Location: ./");
    }
}
if (isset($_POST['save-submit'])) {
    $id = $_POST['id'];
    $uid = $_POST['userName'];
    $email = $_POST['userEmail'];
    $pwd = $_POST['userPwd'];
    $priority = $_POST['userLevel'];
    if (empty($uid) || empty($email)  || empty($pwd) || empty($priority)) {
        header("Location: ../userconfig?id=" . $id . "&error=whitespace");
    }
    elseif ($priority >= $_SESSION['level']) {
        header("Location: ../userconfig?id=" . $id . "&error=invalidpriority");
    }
    else 
    {

        require_once "db.inc.php";
        if ($id != 'new') {

            $pwdHash = password_hash($pwd, PASSWORD_DEFAULT);
            $sql = "UPDATE loginsystem 
            SET nameUsers='$uid', emailUsers='$email', pwdUsers='$pwdHash', levelUsers='$priority'
            WHERE id = '$id'";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: ../users?sucessfullChanged=" . $id);
            } else {
                header("Location: ../userconfig?id=" . $id . "&error=query");
            }
        } else {
            $sql = "SELECT nameUsers FROM loginsystem WHERE emailUsers = '$email'";
            $query = mysqli_query($conn,$sql);
            if ($query) {
                $result = mysqli_fetch_all($query);
                if (sizeof($result) > 0) {
                    header("Location: ../userconfig?id=" . $id . "&error=userexists");
                }
            }
            else {
                header("Location: ../userconfig?id=" . $id . "&error=query");
            }
            $pwdHash = password_hash($pwd, PASSWORD_DEFAULT);
            $sql = "INSERT INTO loginsystem (nameUsers,emailUsers,pwdUsers,levelUsers)
            VALUES ('$uid','$email','$pwdHash','$priority')";
            $result = mysqli_query($conn, $sql);
            if ($result) {
                header("Location: ../users?sucessfullCreated");
            } else {
                echo "failed";
            }
        }
    }
} elseif (isset($_POST['del-submit'])) {
    $id = $_POST['id'];
    require_once "db.inc.php";
    $sql = "DELETE FROM loginsystem 
    WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ../users?sucessfullExcluded=" . $id);
    } else {
        header("Location: ../userconfig?id=" . $id . "&error=query");
    }
} else {
    header("Location: ../?ERROR");
}
