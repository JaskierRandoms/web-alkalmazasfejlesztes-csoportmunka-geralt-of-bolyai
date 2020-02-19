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
                $output .= "<td>" .$row['user']." </td>";
                $output .= "<td>" .$jog."</td>";
                $output .= "<td>";
                $output .= "<form action=# method=POST><select name=valasztasok>        
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
                    header("Location: sendmessageui.php");
                    break;
                case 'Modify':
                    header("Location: modifyuserui.php");
                    break;
                case 'Delete':
                    header("Location: deleteuserui.php");
                    break;
                case 'DelAdvert':
                    header("Location: deladvertui.php");
                    break;
                case 'None':
                            break;
                default:
                    echo "<script>alert('Ismeretlen hiba!');window.location=usersui.php;</script>";
                    break;
                }
    
        }              
        return $output;
        }
    }
}
    

?>