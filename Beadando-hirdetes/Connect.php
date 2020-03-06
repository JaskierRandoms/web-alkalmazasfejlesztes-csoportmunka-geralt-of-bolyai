<?php
    $server = "localhost";
    $UID = "root";
    $PWD="";
    $DBName="web";
    
    $con = new mysqli($server,$UID,$PWD,$DBName);
    
    if($con->connect_error)
    {
        die("Sikertelen csatlakozás".$con->connect_error);
    }
    
    //Felhasználók módosítása
    if(!function_exists("ModifyUsers")){
        function ModifyUsers($con)
    {
        $sql = "SELECT user,admin FROM users WHERE user NOT LIKE '$_SESSION[user]'";
        $output = "";
        $run=$con->query($sql);
        if($run->num_rows>0)
        {
            $output .= "<tr>";
            $output .= "<td></td>";
            $output .= "<td>Felhasználók neve</td>";
            $output .= "<td>Felhasználók jogosultsága</td>";
            $output .= "<td colspan=2>Szerkesztés</td>";
            $output .= "</tr>";
            $i = 0;
            while($row=$run->fetch_assoc())
            {
                $i++;
                if($row['admin'] == 1)
                {
                    $jog = "Admin";
                }
                else{
                    $jog = "Felhasználó";
                }           
                $output .= "<tr>";
                $output .= "<td>".$i."</td>";
                $output .= "<form method=POST action=>";
                $output .= "<td><input type=hidden name=usernames value='$row[user]'>" .$row['user']."</input></td>";
                $output .= "<td><input type=hidden name=userjog value=$jog>" .$jog."</input></td>";
                $output .= "<td>";
                $output .= "<select name=valasztasok>        
                <option value=Nope></option>
                <option value=Message>Üzenet küldése</option>
                <option value=Modify>Jogosultság megváltoztatása</option>
                <option value=Delete>Felhasználó törlése</option>;
                <option value=DelAdvert>Felhasználó hirdetésének törlése</option>
                <td><input type=submit name=submit value=Végrehajtás></input></td>           
                </select>
                </form>
                </td>";
                $output .= "</tr>";    
            }
        if(isset($_POST['valasztasok']))
            {
            $ertek = $_POST['valasztasok'];
            switch ($ertek) {
                case 'Message':
                    $actual = $_POST['usernames'];
                    if($actual != ""){
                        $_SESSION['nev'] = $actual;
                    }
                    header("Location: sendmessageui.php");
                    break;
                case 'Modify':
                    $actual = $_POST['usernames'];
                    $jogok = $_POST['userjog'];
                    if($actual != ""){
                        $_SESSION['nev'] = $actual;
                    }
                    if($jogok != ""){
                        $_SESSION['jogok'] = $jogok;
                    }
                    header("Location: modifyuserjogui.php");
                    break;
                case 'Delete':
                    $actual = $_POST['usernames'];
                    if($actual != ""){
                        $_SESSION['nev'] = $actual;
                    }
                    header("Location: deleteuser.php");
                    break;
                case 'DelAdvert':
                    $actual = $_POST['usernames'];
                    if($actual != ""){
                        $_SESSION['nev'] = $actual;
                    }
                    header("Location: deladvertui.php");
                    break;
                default:
                    echo "<script>alert('Válassz valamilyen váltzotatást!');window.location='usersui.php';</script>";
                    break;
                }
                
            }              
            return $output;
        }
        else{
            echo "<h3>Nincsenek felhasználók!</h3>";
        }
    }
}

//Saját hirdetés kilistázása
if(!function_exists("SelectOwnedElements")){
    function SelectOwnedElements($con,$user)
{
    $sql = "SELECT nev,szoveg FROM content2 INNER JOIN users ON content2.userid = users.id WHERE users.user LIKE '$user'";
    $run = $con->query($sql);
    $output = "";
    if($run->num_rows>0)
    {
        $output .= "<tr>";
        $output .= "<td>Hirdetés neve</td>";
        $output .= "<td>Hirdetés információi</td";
        $output .= "</tr>";
        $i = 0;
        while($row = $run->fetch_assoc())
        {
            $i++;
            $output .= "<form action=deladvert.php method=POST>";
            $output .= "<tr>";
            $transformnev = str_replace(" ","_",$row['nev']);
            $output .= "<td><input type=hidden name=advertname value='$row[nev]'><a href=advertui.php?link=$transformnev>". $row['nev']. "</a></input></td>";
            $output .= "<td><input type=hidden name=adverttext value='$row[szoveg]'>". $row['szoveg']. "</input></td>";
            $output .= "<td><input type=submit name=del value=Törlés></input></td>";
            $output .= "</tr>";
            $output .= "</form>";
            
        }
    }
    else{
        $output = "Nincs hirdetés!";
    }
    return $output;
}
    
//Az összes hirdetés kilistázása
}
if(!function_exists("SelectAllElements")){
    function SelectAllElements($con)
    {
        $sql = "SELECT nev,szoveg FROM content2 JOIN users ON content2.userid = users.id";
        $sql2 = "SELECT DISTINCT user FROM users INNER JOIN content2 ON users.id = content2.userid ";
        $run = $con->query($sql);
        if($run){
            $run2 = $con->query($sql2);
        }
        $output="";
        if($run->num_rows>0)
        {
            $output .= "<tr>";
            $output .= "<td>Felhasználó neve</td>";
            $output .= "<td>Hirdetés neve</td>";
            $output .= "<td>Hirdetés információi</td";
            $output .= "</tr>";
            while($row = $run->fetch_assoc())
            {
                $row2 = $run2->fetch_assoc();
                if(isset($row2['user'])){
                    $output .= "<tr>";
                    $output .= "<td>". $row2['user']."</td>";
                }
                else{
                    $output .= "<tr>";
                    $output .= "<td></td>";
                }
                $transformnev = str_replace(" ","_",$row['nev']);
                $output .= "<td><a href=advertui.php?link=$transformnev>". $row['nev']. "</a></td>";
                $output .= "<td>". $row['szoveg']. "</td>";
                $output .= "</tr>";
            }
        }
        else{
            $output = "Nincs hirdetés!";
        }
        return $output;
    }
}

//Jogosultság ellenőrzése
if(!function_exists("CheckPer")){
    function CheckPer($con)
    {
        if(isset($_SESSION['user']))
        {
            $username = $_SESSION['user'];  
        }
        if($username != "" && $_SESSION['logedin'])
        {        
            $sql = "SELECT admin FROM users WHERE user LIKE '$username'";
            $run=$con->query($sql);       
            if($run->num_rows > 0)
            {
                $row=$run->fetch_assoc();
                if($row['admin'] == 1)
                {
                    return true;
                }
                else{
                    return false;
                }
            }
        }
    }
}

//Regisztráció
if(!function_exists("Registration")){
    function Registration($con){
            $username = $_POST['fnev'];
            $password = $_POST['jelszo'];
            $hpassword = sha1($password);
            $sql = "SELECT user FROM users WHERE user LIKE '$username'";
            $run=$con->query($sql);
            if($username != "" && $password != "")
            {
            if($run->num_rows>0)
                {
                    echo "<script>alert('Létezik már ilyen felhasználónév!');window.location='registrationui.php';</script>";
                }
                else
                {   
                    $sql2 = "INSERT INTO users(user,password) VALUES('$username','$hpassword')";
                    $run2 = $con->query($sql2);
                    echo "<script>alert('Sikeres regisztráció!');window.location='index.php';</script>";
                }
            }
            else
            {
                echo "<script>alert('Nem maradhat üres mező!');window.location='registrationui.php'</script>";
            }
    }
}

?>