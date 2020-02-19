<?php
//A kezdőlap
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="style.css">
    <title>Hirdess</title>
</head>
<body class=hatterkep>       
    <center>
        <?php          
            if(isset($_SESSION['logedin']))
            {
                include("checkpermission.php");
                if(CheckPer())
                {
                    echo "<table class=Felso>
                    <tr>         
                         <th><h1>Üdvözöllek</h1></th>
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
                         <th><h1>Üdvözöllek</h1></th>
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
            else
            {
                echo "<table class=Felso>
                <tr>         
                     <th><h1>Üdvözöllek</h1></th>
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
   <table>
            <?php
                require("selectadverts.php");
                echo SelectAllElements();
            ?>
            
   </table>
       
    
</center>
</body>
</html>