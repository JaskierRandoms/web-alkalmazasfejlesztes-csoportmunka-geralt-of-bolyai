<?php
//Jogosultság megváltoztatása
require("Connect.php");
session_start();
$newjog = $_POST['newjog'];
$muser = $_SESSION['nev'];
if($newjog == "Admin"){
    $sql = "UPDATE users SET admin=1 WHERE user = '$muser'";
}
else{
    $sql = "UPDATE users SET admin=0 WHERE user = '$muser'";
}

$run = $con->query($sql);
if($run){
    echo "<script>alert('Sikeresen megvátoztattad a felhasználó jogát!');window.location='modifyuserjogui.php';</script>";
}
else{
    echo "<script>alert('Sikertelen jog változtatás!');window.location='modifyuserjogui.php';</script>";
}

?>