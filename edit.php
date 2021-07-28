<?php
session_start();
if(isset($_SESSION['uid'])){
$change=[];
$id=$_SESSION['uid'];
$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['emailid'];
$phno=$_POST['phno'];
$gen=ucfirst($_POST['gender']);
$address=$_POST['address'];
$c=mysqli_connect("localhost","root","");
if(!$c){
    die("Could not connect to database");
}
mysqli_select_db($c,"project");
$q="SELECT * FROM custdet where cid=$id";
$res=mysqli_query($c,$q);
$det=mysqli_fetch_array($res);
if ($email!=$det[3] and $phno==$det[4]){
    $q1="SELECT * FROM custdet where cemail='$email' and cid!='$id'";
    $res=mysqli_query($c,$q1);
    $num=mysqli_num_rows($res);
    if (!$num){
        $q="UPDATE custdet SET cfname='$fname',clname='$lname',cemail='$email',cphno='$phno',cgen='$gen',caddress='$address' where cid=$det[0]";
        $res=mysqli_query($c,$q);
        echo "<script>window.location.replace('myacc.php?msg=success');</script>";
    }
    else{
        echo "<script>window.location.replace('myacc.php?msg=emerr');</script>";
    }
}
else if($email==$det[3] and $phno!=$det[4])
{
    $q1="SELECT * FROM custdet where cphno='$phno' and cid!='$id'";
    $res=mysqli_query($c,$q1);
    $num=mysqli_num_rows($res);
    if (!$num){
        $q="UPDATE custdet SET cfname='$fname',clname='$lname',cemail='$email',cphno='$phno',cgen='$gen',caddress='$address' where cid=$det[0]";
        $res=mysqli_query($c,$q);
        echo "<script>window.location.replace('myacc.php?msg=success');</script>";
    }
    else{
        echo "<script>window.location.replace('myacc.php?msg=pherr');</script>";
    }
}
else if($email==$det[3] and $phno==$det[4]){
    $q="UPDATE custdet SET cfname='$fname',clname='$lname',cemail='$email',cphno='$phno',cgen='$gen',caddress='$address' where cid=$det[0]";
    $res=mysqli_query($c,$q);
    echo "<script>window.location.replace('myacc.php?msg=success');</script>";
}
else{
    $q1="SELECT * FROM custdet where cemail='$email' or cphno='$phno'";
    $res=mysqli_query($c,$q1);
    $num=mysqli_num_rows($res);
    if (!$num){
        $q="UPDATE custdet SET cfname='$fname',clname='$lname',cemail='$email',cphno='$phno',cgen='$gen',caddress='$address' where cid=$det[0]";
        $res=mysqli_query($c,$q);
        echo "<script>window.location.replace('myacc.php?msg=success');</script>";
    }
    else{
        echo "<script>window.location.replace('myacc.php?msg=err');</script>";
    }
}
}
?>