<?php
if ($_POST){
$name=$_POST['name'];
$phno=$_POST['phno'];
$email=$_POST['emailid'];
$query=$_POST['query'];
$c=mysqli_connect('localhost','root','','project');
$q="INSERT into query(cname,cphno,cemail,cquery) values ('$name','$phno','$email','$query')";
$res=mysqli_query($c,$q);
if (!$res){
    echo "Error";
}
else{
    echo "<script>location.href='index.php'</script>";
}
}
?>