<?php
session_start();
//Új hirdetés feladásának kinézete
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel ="stylesheet" href="style.css">
    <title>Hirdetés feladása</title>
</head>
<body class=hatterek>
    <?php
            if(isset($_SESSION['logedin']))
            {
                include("checkpermission.php");
                if(CheckPer())
                {
                    echo "<table class=Felso>
                    <tr>         
                         <th><h1>Hirdetés feladása</h1></th>
                            <td><a href=index.php class=MenuSav>Kezdőlap</a></td>
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
                         <th><h1>Hirdetés feladása</h1></th>
                            <td><a href=index.php class=MenuSav>Kezdőlap</a></td>
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
    <table width=100% align="center">
        <form action="addnew.php" method="POST" enctype="multipart/form-data">
            <tr>
                <td class="hird">Hirdetés neve<br><input type="text" name="hnev" ></td>
            <tr>
            <tr>
                <td class="hird">A hirdetés információi<br><input type="text" name="szoveg"></td>
            </tr>
            <tr>
                <td><input type="file" name="img"><input type="submit" name="feladas" value="Hirdetés feladása"></td>
            </tr>
        </form>
    </table>
</body>
</html>