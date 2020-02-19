<?php
    session_start();
    
    $_SESSION['logedin'] = false;
    $_SESSION[] = array();
    session_unset();
    echo "<script>alert('Sikeres kijelentkezés!');window.location='index.php'</script>";
?>