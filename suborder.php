<?php
session_start();
if(!(isset($_SESSION['uid']))){
    die("<script>window.location.href='login.php';</script>");
}
$c=mysqli_connect("localhost","root","");
mysqli_select_db($c,"project");
$cart="c".$_SESSION['uid'];
$q="SELECT * from $cart";
$res=mysqli_query($c,$q);
$num=mysqli_num_rows($res);
if($num==0){
    die("<script>window.location.href='cart.php';</script>");
}
$address=$_POST['address'];
$plist='';
$pqty='';
$pprice='';
for($i=0;$i<$num;$i++){
    $r=mysqli_fetch_array($res);
    $q3="SELECT * FROM productdet where pid=$r[0]";
    $result=mysqli_query($c,$q3);
    $r1=mysqli_fetch_array($result);
    $disprice=$r1[4];
    $q2="SELECT offer from offers where pid=$r[0]";
    $result=mysqli_query($c,$q2);
    $off=0;
    if($offval=mysqli_fetch_array($result)){
        $off=$offval[0];
        $disprice=$disprice-($disprice*$off/100);
    }
    $q3="SELECT offer from deals where pid=$r[0]";
    $result=mysqli_query($c,$q3);
    if($offval=mysqli_fetch_array($result)){
        $off=$offval[0];
        $disprice=$disprice-($disprice*$off/100);
    }
    $plist=$plist.$r[0].",";
    $pqty=$pqty.$r[1].",";
    $pprice=$pprice.$disprice.",";
}

$plist=substr($plist,0,strlen($plist)-1);
$pqty=substr($pqty,0,strlen($pqty)-1);
$pprice=substr($pprice,0,strlen($pprice)-1);
$date=date('Y-m-d H:i:s');
$id=$_SESSION['uid'];
$q="INSERT INTO orders(cid,orderdate,itemlist,itemqty,itemprice,deladdress) values ($id,'$date','$plist','$pqty','$pprice','$address')";
$res=mysqli_query($c,$q);
$q="DELETE FROM $cart";
$res=mysqli_query($c,$q);
echo "<script>window.location.href='index.php';</script>";
?>
