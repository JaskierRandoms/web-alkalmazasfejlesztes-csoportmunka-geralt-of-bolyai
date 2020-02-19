<?php
//Új hirdetés feladása
require("Connect.php");
session_start();
$con;
$user = $_SESSION['user'];
$nev = $_POST['hnev'];
$szoveg = $_POST['szoveg'];

$sql = "SELECT nev FROM content2 WHERE nev LIKE '$nev'";
$run=$con->query($sql);
$sql2 = "SELECT id FROM users WHERE user LIKE '$user'";
$run2=$con->query($sql2);
$vane = false;
function KepFeltolt(){
    require("Connect.php");
    if(isset($_POST['feladas']))
    {
        if(isset($_FILES['img']['name'])){
           
            $image = $_FILES['img']['name'];
            $sql3 = "INSERT INTO content2(kep) VALUES('$image')";
            $run3 = $con->query($sql3);
            if($run3){
                move_uploaded_file($_FILES['img'],"kepek/$image");
            }
            else{
                echo "<script>alert('Nem megfelelő fájlformátum!');window.location='addnewui.php';</script>";
            }
        }            
    }
}

if($nev != "" && $szoveg != "")
{
       if($run2->num_rows>0)
       {
        $row=$run2->fetch_assoc();
        $sql4 = "INSERT INTO content2(userid,nev,szoveg) VALUES('$row[id]','$nev','$szoveg')";
        $run4=$con->query($sql4);
        $vane = true;
        //KepFeltolt();
        echo "<script>alert('Sikeresen feladtad a hirdetést!');window.location='addnewui.php';</script>";
       }
}
else{
    echo "<script>alert('Nem maradhat üres mező!');window.location='addnewui.php';</script>";
}

?>