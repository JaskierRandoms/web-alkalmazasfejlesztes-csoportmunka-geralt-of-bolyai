<?php
//Bejelentkezés
    session_start();
    $_SESSION['logedin'] = false;
    require("Connect.php");
    $felh = $_POST['fnev'];
    $password = $_POST['jelszo'];
    $hpassword = sha1($password);
    $login = false;
    $sql = "SELECT user,password FROM users WHERE user LIKE '$felh' AND password LIKE '$hpassword'";
    $run=$con->query($sql);
    if($felh == "" || $password=="")
    {
        echo "<script type='text/javascript'>alert('Nem maradhat üres mező!');window.location='index.php';</script>";  
        require("sessionend.php");
    }
    else
    {
        if($run->num_rows > 0)
        {           
            $_SESSION['logedin'] = true;
            $_SESSION['user'] = $felh;
            echo "<script>alert('Sikeres belépés!');window.location='index.php';</script>";
        }
        else
        {
            echo "<script>alert('Rossz felhasználónév vagy jelszó!');window.location='index.php';</script>";    
            require("sessionend.php");
        }
    }

?>