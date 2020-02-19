<?php
session_start();
require("Connect.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Felhasználók módosítása</title>
</head>
<body>
<table class="Felso">
    <tr>         
        <th><h1>Felhasználók módosítása</h1></th>
            <td><a href=index.php class=MenuSav>Kezdőlap</a></td>
            <td><a href=addnewui.php name=NewHirdetes class=MenuSav>Hirdetés feladása</a></td>
            <td><a href=modifyui.php name=ModifyHirdetes class=MenuSav>Hirdetés módosítása</a></td>
            <td>
            <form action=login.php method=POST style=text-align:right>
                                <a href=profilui.php style=text-alig:right><?php echo $_SESSION['user']?></a><br>
                                <a href=uzenetui.php style=text-align:right>Üzenetek</a><br>
                                <a href=sessionend.php style=text-align: right>Kijelentkezés!</a>
            </form>             
            </td>           
    </tr>   
    </table>
    <table border=1px>
    
        <?php echo ModifyUsers($con); ?>

    </table>
</body>
</html>