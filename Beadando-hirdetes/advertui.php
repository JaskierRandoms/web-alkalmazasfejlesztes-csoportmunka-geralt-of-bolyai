<?php
//Hirdetés kinézete
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel ="stylesheet" href="style.css">
    <title>Saját hirdetés</title>
</head>
<body class="felhhirdeteseihatter">
<?php       
    $advertname = $_GET['link'];
    $advertnev = str_replace("_"," ",$advertname);
    if(isset($_SESSION['logedin']))
    {
        include("Connect.php");
        if(CheckPer($con))
        {
            echo "<table class=Felso>
            <tr>         
                <th><h1>".$advertnev."</h1></th>
                    <td><a href=index.php class=MenuSav>Kezdőlap</a></td>
                    <td><a href=addnewui.php name=NewHirdetes class=MenuSav>Hirdetés feladása</a></td>
                    <td><a href=usersui.php name=ModifyUsers class=MenuSav>Felhasználók módosítása</a></td>
                <td>
                    <form action=login.php method=POST style=text-align:right>
                        <a href=profilui.php style=text-alig:right>".$_SESSION['user']."</a><br>
                        <a href=uzenetui.php style=text-align:right>Üzenetek</a><br>
                        <a href=sessionend.php style=text-align: right>Kijelentkezés</a>
                </form>           
                </td>           
            </tr>       
            </table>";  
        }
        else{
            echo "<table class=Felso>
            <tr>         
                <th><h1>".$advertnev."</h1></th>
                    <td><a href=index.php class=MenuSav>Kezdőlap</a></td>
                    <td><a href=addnewui.php name=NewHirdetes class=MenuSav>Hirdetés feladása</a></td>
                <td>
                    <form action=login.php method=POST style=text-align:right>
                        <a href=profilui.php>".$_SESSION['user']."</a><br>
                        <a href=uzenetui.php style=text-align:right>Üzenetek</a><br>
                        <a href=sessionend.php>Kijelentkezés</a>
                </form>           
                </td>           
            </tr>       
            </table>";  
        }
    }
    else{
    echo "<table class=Felso>
    <tr>         
        <th><h1>".$advertnev."</h1></th>
        <td><a href=index.php class=MenuSav>Kezdőlap</a></td>
        <td><a href=needlogedin.php name=NewHirdetes class=MenuSav>Hirdetés feladása</a></td>
        <td><a href=needlogedin.php name=ModifyHirdetes class=MenuSav>Hirdetés módosítása</a></td>
        <td>
            <form action=login.php method=POST style=text-align:right>
            <input type=text name=fnev placeholder=asd123><br>
            <input type=password name=jelszo placeholder=*********><br>
            <input type=submit name=login value=Bejelentkezés><br>
            <h4>Még nem vagy tag?</h4>
            <a href=registrationui.php>Regisztráció</a>
        </form>           
        </td>           
    </tr>       
    </table>";  
    }
?>
<br>
    <table class="tablaadv">
        <?php
            require("Connect.php");
            $sql = "SELECT szoveg FROM content2 WHERE nev LIKE '$advertnev'";
            $run=$con->query($sql);
            $row=$run->fetch_assoc();
            echo "<tr><h2 class=advh2>A hirdetés információi</h2></tr>
            <tr>
            <td>".$row['szoveg']."</td>
            </tr>"
        ?>
    </table>
</body>
</html>