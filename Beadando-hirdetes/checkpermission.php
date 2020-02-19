<?php
//Jogosultságok ellenőrzése


function CheckPer()
{
    require("Connect.php");
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


?>