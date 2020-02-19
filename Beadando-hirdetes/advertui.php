<?php
if(isset($_GET['a'])){
    $advertn = $_GET['a'];
    echo $advertn;
}
else{
    echo "Nincs érték!";
    //echo $_GET['a'];
}


?>