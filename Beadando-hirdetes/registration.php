<?php
require("Connect.php");
$username = $_POST['fnev'];
$password = $_POST['jelszo'];
$hpassword = sha1($password);
Connect($con);
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

?>