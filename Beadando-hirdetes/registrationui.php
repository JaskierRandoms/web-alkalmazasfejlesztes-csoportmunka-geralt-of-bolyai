<!-- Regisztráció kinézete -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Regisztráció</title>
</head>
<body class=hatter>
    <table class=Felso>
                <tr>         
                     <th><h1>Regisztráció</h1></th>
                        <td><a href=index.php class=MenuSav>Kezdőlap</a></td>
                        <td><a href=needlogedin.php name=NewHirdetes class=MenuSav>Hirdetés feladása</a></td>
                        <td><a href=needlogedin.php name=ModifyHirdetes class=MenuSav>Hirdetés módosítása</a></td>
                     <td>
                         <form action=login.php method=POST style=text-align:right>
                            <input type=text name=fnev placeholder=asd123><br>
                            <input type=password name=jelszo placeholder=*********><br>
                            <input type=submit name=login value=Bejelentkezés><br>
                            <h4>Még nem vagy tag?</h4>
                            <a href=registrationui.php>Regisztráció!</a>
                    </form>           
                    </td>           
                </tr>       
        </table>  
    <form action="registrationui.php" method="POST" class=asd>
        <input type="text" name="fnev" placeholder="asd123">
        <input type="password" name="jelszo" placeholder="******">
        <input type="submit" name="register" value="Regisztráció">
    </form>
    <?php
        if(isset($_POST['register'])){
            require("Connect.php");
            Registration($con);        
        }

    ?>
</body>
</html>