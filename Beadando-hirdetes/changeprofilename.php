<?php 
        //Felhasználónév váltása
        session_start();
        require("Connect.php");
        $modifyusername = $_POST['NewName'];
        $actualname = $_SESSION['user'];
        if(isset($modifyusername)){
            $sql = "SELECT user FROM users WHERE user LIKE '$modifyusername'";
            $sql2 = "UPDATE users SET user = '$modifyusername' WHERE user LIKE '$actualname'";
            $run = $con->query($sql);
            if($run->num_rows>0){
                echo "<script>alert('Létezik már ilyen felhasználónév!');window.location='profilui.php';</script>";
            }
            else{
                $run2=$con->query($sql2);
                echo "<script>alert('Sikeres felhasználónév váltás!');window.location='profilui.php';</script>";
                $_SESSION['user'] = $modifyusername;
            }
        }
        else{
            echo "<script>alert('Nem maradhat üres mezőASD!');window.location='profilui.php';</script>";
        }
        return $siker;


?>