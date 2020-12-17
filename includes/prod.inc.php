<?php
if (isset($_POST['id'])) {
    $id = $_POST['id'];  
}
session_start();
if (isset($_SESSION['id'])) {
    if ($_SESSION['level'] < 2) {
        header("Location: ./");
    }
}
if (isset($_POST['save-submit'])) {
    $name = $_POST['prodName'];
    $desc = $_POST['prodDesc'];
    $price = $_POST['prodPrice'];
    $times = $_POST['prodTimes'];
    $pricetimes = $_POST['prodPricetimes'];
    if (empty($name)  || empty($price)) {
        if (isset($_GET['id'])) {
            $url = "id=" . $id . "&invalidblankspace=true";
        }
        header("Location: ../prodconfig?a&" . $url);
    } else {

        if (is_uploaded_file($_FILES['prodImg']['tmp_name'])) {
            $acceptedFormats = array("png", "jpeg", "jpg");
            $extensao = pathinfo($_FILES['prodImg']['name'], PATHINFO_EXTENSION);

            if (in_array($extensao, $acceptedFormats)) {
                $aqvTmpName = $_FILES['prodImg']['tmp_name'];
                $aqvName = uniqid() . ".$extensao";
                $dest = "../imgs/database/";
                $moved = move_uploaded_file($aqvTmpName, $dest . $aqvName);

                require_once "db.inc.php";

                if ($id != 'new') {
                    $sql = "UPDATE prodsystem 
                    SET imageProds='$aqvName', nameProds='$name', descProds='$desc', priceProds='$price', timesProds='$times', pricetimesProds='$pricetimes'
                    WHERE id = '$id'";
                } else {
                    $sql = "INSERT INTO prodsystem (imageProds,nameProds,descProds,priceProds,timesProds,pricetimesProds)
                    VALUES ('$aqvName','$name','$desc','$price','$times','$pricetimes')";
                }
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("Location: ../prods?sucessfullChanged=" . $id);
                } else {
                    header("Location: ../prodconfig?id=" . $id . "&error=query");
                }
            } else {
                header("Location: ../prodconfig?id=" . $id . "error=invalidFormat");
                return;
            }
        } else {
            require_once "db.inc.php";
            if ($id != 'new') {
                $sql = "UPDATE prodsystem 
                SET nameProds='$name', descProds='$desc', priceProds='$price', timesProds='$times', pricetimesProds='$pricetimes'
                WHERE id = '$id'";
                $result = mysqli_query($conn, $sql);
                if ($result) {
                    header("Location: ../prods?sucessfullChanged=" . $id);
                } else {
                    header("Location: ../prodconfig?id=" . $id . "&error=query");
                }
            }
            else {
                header("Location: ../prodconfig?id=" . $id . "&error=notUploaded");
            }
        }
    }
} elseif (isset($_POST['del-submit'])) {
    require_once "db.inc.php";
    $sql = "SELECT imageProds, nameProds FROM prodsystem WHERE id = '$id'";
    $result = mysqli_query($conn, $sql);
    $row = mysqli_fetch_row($result);
    if ($result) {
        if (file_exists("../imgs/database/".$row[0])) {
            unlink("../imgs/database/".$row[0]);
        }
        $sqlD = "DELETE FROM prodsystem WHERE id = '$id'";
        $resultado = mysqli_query($conn, $sqlD);
        if ($resultado) {
            header("Location: ../prods?sucessfullDeleted=" . $id);
        }
        else {
            header("Location: ../prodconfig?id=" . $id . "&error=query");
        }
    } else {
        header("Location: ../prodconfig?id=" . $id . "&error=query");
    }
}
