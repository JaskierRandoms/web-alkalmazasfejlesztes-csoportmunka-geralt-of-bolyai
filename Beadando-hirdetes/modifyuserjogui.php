<?php
//Jogosultság megváltoztatásának kinézete
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Felhasználó jogainak módosítása</title>
</head>
<body>
<?php

echo "<table class=Felso>
<tr>         
     <th><h1>Felhasználók módosítása</h1><br><h2>Felhasználó jogainak szerkesztése</h2></th>
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

?>
<table width=100%>
<tr>
    <td>Felhasználó neve</td>
    
    <td>Felhasználó jelenlegi jogosultsága</td>
</tr>
<tr>
    <td><?php echo $_SESSION['nev'];?></td>
    <td><?php echo $_SESSION['jogok'];?></td>
</tr>
</table>
<table width=100%>
    <tr>    
        <?php 
            if($_SESSION['jogok'] == "Admin"){
                echo "<form action=modifyusersjog.php method=POST
                <td>A felhasználó jogának megváltoztatása erre:<input type=hidden name=newjog value=Felhasználó>Felhasználó</input><input type=submit name=click value=Módosítás></input></td>
                </form>";
            }
            else{
                echo "<form action=modifyusersjog.php method=POST
                <td>A felhasználó jogának megváltoztatása erre:<input type=hidden name=newjog value=Admin>Admin</input><input type=submit name=click value=Módosítás></input></td>
                </form>";
            }
        
        ?>
    </tr>
</table>
</body>
</html>