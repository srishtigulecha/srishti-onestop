<?php
if ($_GET){
$s=($_GET['pro']);
if (substr($s,0,5)=='categ'){
    $link="category.php?cat=".substr($s,5);
}
else if (substr($s,0,5)=='brand'){
    $link="brand.php?brand=".(substr($s,5));
}
else if(substr($s,0,5)=='pname'){
    $link="prod_disp.php?item=".(substr($s,5));
}
else if(substr($s,0,5)=='searc'){
    $link="search.php?search=".(substr($s,5));
}
else if(substr($s,0,5)=='index'){
    $link="index.php";
}
else{
    die("<script>location.href='index.php';</script>");
}
}
if ($_POST){
session_start();
$pname=$_POST['prod'];
$price=floatval($_POST['prodq']);
$qty=$_POST['quan'];
$c=mysqli_connect('localhost','root','','project');
$q="SELECT pid FROM productdet where pprice like '$price' and pname='$pname'";
$res=mysqli_query($c,$q);
if (!$res){
   die("Error1".mysqli_error($c));
}
$row=mysqli_fetch_array($res);
$id=$row[0];
$cart='c'.$_SESSION['uid'];
$q="INSERT INTO $cart (pid,pqty) values ($id,$qty)";
$res=mysqli_query($c,$q);
if (!$res){
    echo "Error".mysqli_error($c);
}
else{
    echo "<script>location.href='$link';</script>";
}
}
?>