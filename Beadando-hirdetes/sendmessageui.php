<?php
    //Üzenet küldése
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Üzenet küldése</title>
</head>
<body class="sendmessagehatter">
<?php
if(isset($_SESSION['logedin']))
    {
        include("Connect.php");
        if(CheckPer($con))
        {
            echo "<table class=Felso>
            <tr>         
                <th><h1>Üzenetek</h1><br><h2>Üzenet küldése</h2></th>
                <td><a href=index.php class=MenuSav>Kezdőlap</a></td>
                <td><a href=addnewui.php name=NewHirdetes class=MenuSav>Hirdetés feladása</a></td>
                <td><a href=modifyui.php name=ModifyHirdetes class=MenuSav>Hirdetés módosítása</a></td>
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
                <th><h1>Üzenetek<br><h2>Üzenet küldése</h2></h1></th>
                <td><a href=index.php class=MenuSav>Kezdőlap</a></td>
                <td><a href=addnewui.php name=NewHirdetes class=MenuSav>Hirdetés feladása</a></td>
                <td><a href=modifyui.php name=ModifyHirdetes class=MenuSav>Hirdetés módosítása</a></td>
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
    if(isset($_SESSION['nev'])){
        echo $_SESSION['nev'];
    }
?>
</body>
</html>
