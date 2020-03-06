<?php
//Profil kinézete
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Profil</title>
</head>
<body class="profiluihatter">
<?php
    if(isset($_SESSION['logedin']))
    {
        include("Connect.php");
        if(CheckPer($con))
        {
            echo "<table class=Felso>
            <tr>         
                    <th><h1>Profil</h1></th>
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
                    <th><h1>Profil</h1></th>
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
    <table class="profiluitabla">
        <tr>
            <td>Jelenlegi felhasználónév: <?php echo $_SESSION['user']?><br><form action="profilui.php" method="POST"><input type="submit" name="Modify" value="Felhasználónév módosítása"></input></form><br></td>                           
        </tr>
        <?php 
            if(isset($_POST['Modify'])){
                $nyom = true;
                echo "<tr>
                    <td>Új felhasználónév: <form action=changeprofilename.php method=POST><input type=text name=NewName placeholder=asd123></input><br><input type=submit name=GO value=Módosítás></input></form>
                </tr>";
            }
        ?>
    </table>
</body>
</html>