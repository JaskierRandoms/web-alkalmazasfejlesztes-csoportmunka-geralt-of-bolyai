<?php
//Hirdetés törlése
session_start();
require("Connect.php");
$advertname = $_POST['advertname'];
if($_SESSION['Adminban']){
    $user = $_SESSION['nev'];
    $sql2 = "SELECT id FROM users WHERE user LIKE '$user'";
    $run2 = $con->query($sql2);
    if($run2->num_rows>0){
        $row = $run2->fetch_assoc();
        $sql = "DELETE FROM content2 WHERE userid = '$row[id]' AND nev = '$advertname'";
        $run = $con->query($sql);
        if($run){
            if($_SESSION['Adminban']){
                echo "<script>alert('Sikeresen törölted ezt a hirdetést!');window.location='deladvertui.php';</script>";
            }
            else{
                echo "<script>alert('Sikeresen törölted ezt a hirdetést!');window.location='modifyui.php';</script>";
            }
        }
        else{
            if($_SESSION['Adminban']){
                echo "<script>alert('Sikertelen hirdetés törlés!');window.location='deladvertui.php';</script>";
            }
            else{
                echo "<script>alert('Sikertelen hirdetés törlés!');window.location='modifyui.php';</script>";
            }
        }
    }
}
else{
    $user = $_SESSION['user'];
    $sql2 = "SELECT id FROM users WHERE user LIKE '$user'";
    $run2 = $con->query($sql2);
    if($run2->num_rows>0){
        $row = $run2->fetch_assoc();
        $sql = "DELETE FROM content2 WHERE userid = '$row[id]' AND nev = '$advertname'";
        $run = $con->query($sql);
        if($run){
            if($_SESSION['Adminban']){
                echo "<script>alert('Sikeresen törölted ezt a hirdetést!');window.location='deladvertui.php';</script>";
            }
            else{
                echo "<script>alert('Sikeresen törölted ezt a hirdetést!');window.location='modifyui.php';</script>";
            }
        }
        else{
            if($_SESSION['Adminban']){
                echo "<script>alert('Sikertelen hirdetés törlés!');window.location='deladvertui.php';</script>";
            }
            else{
                echo "<script>alert('Sikertelen hirdetés törlés!');window.location='modifyui.php';</script>";
            }
        }
    }
    
}



?>