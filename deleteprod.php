<?php
if ($_POST){
session_start();
$id=$_POST['prodid'];
$c=mysqli_connect('localhost','root','','project');
$cart='c'.$_SESSION['uid'];
$q="DELETE FROM $cart where pid=$id";
$res=mysqli_query($c,$q);
if (!$res){
    echo "Error";
}
else{
    echo "<script>location.href='cart.php'</script>";
}
}
?>