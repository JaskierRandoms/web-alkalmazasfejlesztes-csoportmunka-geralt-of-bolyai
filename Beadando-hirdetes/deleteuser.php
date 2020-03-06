<?php
//Felhasználó törlése
    require("Connect.php");
    session_start();
    $actual = $_SESSION['nev'];
    $sql = "DELETE FROM users WHERE user = '$actual'";

    $sql2 = "SELECT id FROM users WHERE user = '$actual'";
    $run = $con->query($sql2);
    if($run->num_rows>0){
        $row = $run->fetch_assoc();
        $sql3 = "DELETE FROM content2 WHERE userid = ".$row['id'];

        $run2=$con->query($sql3);
        $run3 = $con->query($sql);

        echo "<script>alert('Sikeres felhasználó törlés!');window.location='usersui.php';</script>";
    }
    else{
        echo "<script>alert('Sikertelen felhasználó törlés!');window.location='usersui.php';</script>";
    }
?>