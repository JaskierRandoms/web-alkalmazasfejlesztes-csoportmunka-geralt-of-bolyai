<?php
//Üzenetek megjelenítése(loading)
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Üzenetek</title>
</head>
<body class="uzenetekhatter">
<?php
    if(isset($_SESSION['logedin']))
    {
        include("Connect.php");
        if(CheckPer($con))
        {
            echo "<table class=Felso>
            <tr>         
                <th><h1>Üzenetek</h1></th>
                <td><a href=index.php class=MenuSav>Kezdőlap</a></td>
                <td><a href=addnewui.php name=ModifyHirdetes class=MenuSav>Hirdetés feladása</a></td>
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
                <th><h1>Üzenetek</h1></th>
                <td><a href=index.php class=MenuSav>Kezdőlap</a></td>
                <td><a href=addnewui.php name=ModifyHirdetes class=MenuSav>Hirdetés feladása</a></td>
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
    ?>
    <br>
    <table class="uzenetektable" >
        <form action="uzenetui.php" method="POST">
            <tr>
                <td>Bejövő üzenetek<br></td>           
                <td>Elküldött üzenetek<br></td>
                <td><input type="submit" name="suzenet" value="Üzenet küldése"><br></td>
            </tr>
        </form>
    </table>
    <?php
    if(isset($_POST['suzenet'])) 
        header('Location:sendmessageui.php');
    ?>
</body>
</html>