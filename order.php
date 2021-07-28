<?php
session_start();
if(!(isset($_SESSION['uid']))){
    die("<script>window.location.href='login.php';</script>");
}
if($_POST){
    $l=$_POST['tr'];
    $id=$_POST['tid'];
    $arr=explode(",",$l);
    $id=explode(",",$id);
    $c=mysqli_connect("localhost","root","","project");
    $cart="c".$_SESSION['uid'];
    for($i=0;$i<count($arr);$i++){
        $q="UPDATE $cart set pqty=$arr[$i] where pid=$id[$i]";
        $res=mysqli_query($c,$q);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneStop</title>
    <link rel="stylesheet" href="css/basestyle.css">
    <link rel="stylesheet" href="css/order.css">
    <script src="https://kit.fontawesome.com/b61f010dd3.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div class="top_container">
            <div id="brandlogo">
                <h1>OneStop</h1>
            </div>
        <form id="search_form" action="search.php" method='GET'>
            <label for="search"></label>
            <input type="text" name="search" id="search">
            <button type="submit" class="button1"><i class="fas fa-search"></i></button>
        </form>
        <nav id="nav1">
            <ul>
                <li><a href="index.php">Home</a></li>
                <?php 
                if(!(isset($_SESSION['uid']))){
                    echo "<li><a href='login.php' id='log'>Login</a></li>
                    <li><a href='signup.php' id='signnav'>SignUp</a></li>";
                }
                else{
                    echo "<li><a href='logout.php' id='log'>Logout</a></li>";
                }
                ?>
                <li><a href="cart.php">Cart   <i class="fas fa-shopping-cart"></i></a></li>
            </ul>
        </nav>
	    </div>
        <div class="container1">
            <div class="dropdown">
                <button class="dropbtn">Shop by Category</button>
                <div class="dropdown-content">
                    <a href="category.php?cat=food">Food</a>
                    <a href="category.php?cat=dairy">Dairy</a>
                    <a href="category.php?cat=beauty">Beauty</a>
                    <a href="category.php?cat=personal hygiene">Personal Hygiene</a>
                    <a href="category.php?cat=cleaning">Cleaning</a>
                    <a href="category.php?cat=chocolates">Chocolates</a>
                    <a href="category.php?cat=beverages">Beverages</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">Shop by Brand</button>
                <div class="dropdown-content">
                    <a href="brand.php?brand=kellogg">Kellogg's</a>
                    <a href="brand.php?brand=hershey">Hershey's</a>
                    <a href="brand.php?brand=dabur">Dabur</a>
                    <a href="brand.php?brand=amul">Amul</a>
                    <a href="brand.php?brand=lotus">Lotus</a>
                    <a href="brand.php?brand=dettol">Dettol</a>
                    <a href="brand.php?brand=real">Real</a>
                    <a href="brand.php?brand=lizol">Lizol</a>
                </div>
            </div>
            <div class="dropdown">
                <button class="dropbtn">My Account</button>
                <div class="dropdown-content">
                    <a href="myacc.php">My Account</a>
                    <a href="curorder.php">My Orders</a>
                </div>
            </div>
        </div>
    </header>
    <section id="order">
        <table id="order_table">
            <col style="width:45%">
            <col style="width: 10%">
            <col style="width: 15%;">
            <col style="width: 15%">
            <col style="width: 15%">
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>MRP</th>
                <th>Price</th>
                <th>Amount</th>
            </tr>
            <?php
            $c=mysqli_connect("localhost","root","");
            if(!($c)){
                die("ERROR");
            }
            mysqli_select_db($c,'project');
            $cart="c".$_SESSION['uid'];
            
            $q="SELECT p.pbrand,p.pname,p.pweight,c.pqty,p.pprice,p.pid from productdet as p INNER JOIN $cart as c on p.pid=c.pid";
            $res=mysqli_query($c,$q);
            $num=mysqli_num_rows($res);
            if($num==0){
                echo "<script>window.location.href='cart.php';</script>";
            }
            $tot=50;
            for($i=0;$i<$num;$i++){
                $r=mysqli_fetch_array($res);
                $q2="SELECT offer from offers where pid=$r[5]";
                $result=mysqli_query($c,$q2);
                $off=0;
                $disprice=$r[4];
                if($offval=mysqli_fetch_array($result)){
                    $off=$offval[0];
                    $disprice=$r[4]-($r[4]*$off/100);
                }
                $q3="SELECT offer from deals where pid=$r[5]";
                $result=mysqli_query($c,$q3);
                if($offval=mysqli_fetch_array($result)){
                    $off=$offval[0];
                    $disprice=$r[4]-($r[4]*$off/100);
                }
                $p=floatval($disprice)*$r[3];
                $tot+=$p;
                echo "
                <tr>
                <td>$r[0] $r[1] $r[2]</td>
                <td>$r[3]</td>
                <td>".number_format($r[4],2)."</td>
                <td>".number_format($disprice,2)."</td>
                <td>".number_format($p,2)."</td>
                </tr>";
            }
            echo"
            <tr>
                <td colspan='4'>Delivery charges</td>
                <td>50.00</td>
            </tr>
            <tr>
                <td colspan='5'>TOTAL AMOUNT : ".number_format($tot,2)."</td>";
            ?>
            </tr>
        </table>
    </section>
    <section id="addbar">
        <?php
        $id=$_SESSION['uid'];
        $c=mysqli_connect("localhost","root","");
        if(!($c)){
            die("ERROR");
        }
        mysqli_select_db($c,'project');
        $q="SELECT cphno,caddress from custdet where cid=$id";
        $res=mysqli_query($c,$q);
        $r=mysqli_fetch_array($res);
        echo "<p id='head'>Contact details</p>
        <form id='del_det' action='suborder.php' method='POST'>
            <div class='box'>
                <label for='phno'>Phone Number</label>
                <input type='text' id='phno' name='phno' value='$r[0]' disabled>
                <p id='erphno'></p>
            </div>
            <div class='box'>
                <label for='address'>Address</label>
                <textarea id='address' name='address'>$r[1]</textarea>
                <p id='eraddress'></p>
            </div>";
        ?>
                
        </form>
    </section>
    <div id="place">
        <button id="edit_btn" onclick="edit();">EDIT ORDER</button>
        <button id="confirm_btn">CONFIRM</button>
    </div>
    <footer>
        <div class="footcontent">
            <div class="address">
                <p>OneStop</p>
                <address>No.13, XYZ Lane, 7th Sector,<br> AB Nagar, Chennai-600078</address>
            </div>
            <div class="abt">
                <p>About</p>
                <a href="about.php">About Us</a>
                <a href="contact.php">Contact Us</a>
            </div>
            <div class="custser">
                <p>Help</p>
                <a href="faq.php">FAQ</a>
            </div>
        </div>
          <p id="copyright">OneStop,Copyright &copy; 2021</p>
      </footer>
      <script src="js/order.js"></script>
      <script src="js/myacc.js"></script>
  </body>
  </html>