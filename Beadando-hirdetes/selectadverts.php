<?php
//Az összes hirdetés és hozzá tartozó név lekérdezése

function SelectAllElements()
{
    include "Connect.php";
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
            $output .= "<td><a href=advertkepui.php>". $row['nev']. "</a></td>";
            $output .= "<td>". $row['szoveg']. "</td>";
            $output .= "</tr>";
        }
    }
    else{
        $output = "Nincs hirdetés!";
    }
    return $output;
}

function SelectOwnedElements()
{
    require("Connect.php");
    $sql = "SELECT nev,szoveg FROM content2 INNER JOIN users ON content2.userid = users.id WHERE users.user LIKE '$_SESSION[user]'";
    $run = $con->query($sql);
    $output = "";
    if($run->num_rows>0)
    {
        $output .= "<tr>";
        $output .= "<td></td>";
        $output .= "<td>Hirdetés neve</td>";
        $output .= "<td>Hirdetés információi</td";
        $output .= "</tr>";
        $i = 0;
        while($row = $run->fetch_assoc())
        {
            $i++;
            $output .= "<tr>";
            $output .= "<td>".$i."</td>";
            $output .= "<td><a href=advertui.php?a=>". $row['nev']. "</a></td>";
            $output .= "<td>". $row['szoveg']. "</td>";
            $output .= "</tr>";
        }
    }
    else{
        $output = "Nincs hirdetés!";
    }
    return $output;
}

?>