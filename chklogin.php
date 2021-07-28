<?php
session_start();
if ($_POST){
    $phno=$_POST['phno'];
    $passw=$_POST['passw'];
    $chk=$_POST['rem'];
    $c=mysqli_connect("localhost","root","");
    if(!($c))
    {die("Could not connect to database");}
    mysqli_select_db($c,"project"); 
    $q="SELECT * FROM custdet where cphno='$phno' and cpassw='$passw'";
    $res=mysqli_query($c,$q);
    $det=mysqli_fetch_array($res);
    if (!$det){
        echo "<script>window.location.href='login.php?msg=error';</script>";
    }
    else{
        $_SESSION['uid']=$det[0];
        $_SESSION['uname']=$det[1].' '.$det[2];
        if(isset($chk)){
            setcookie('phno',$phno,time()+(86400*10),'/');
            setcookie('passw',$passw,time()+(86400*10),'/');
        }
        echo "<script>window.location.replace('index.php?msg=loginsuccess');</script>";
    }
}
?>