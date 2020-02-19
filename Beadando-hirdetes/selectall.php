<?php
//Az összes hirdetés és hozzá tartozó név lekérdezése
function SelectElements()
{
    require("Connect.php");
    $con;
    $sql = "SELECT nev,szoveg FROM content JOIN users ON content.userid = id";
    $run=$con->query($sql);
    $output="";
    if($run->num_rows>0)
    {
        $output .= "<tr>";
        $output .= "<td>" Hirdetés neve "</td>";
        $output .= "<td>" Hirdetés információi "</td";
        $output .= "</tr>";
        while($row = $run->fetch_assoc())
        {
            $output .= "<tr>"
            $output .= "<td>". $row['nev']. "</td>";
            $output .= "<td>". $row['szoveg']. "</td>";
            $output .= "</tr>";
        }
    }
    return $output;
}

?>