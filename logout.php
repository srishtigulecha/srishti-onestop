<?php
session_start();
if(isset($_SESSION['uid'])) {
    session_destroy();
    echo "<script>window.location.replace('index.php?msg=logoutsuccess');</script>";
}
else{
    echo "<script>location.href='login.php'</script>";
}
?>