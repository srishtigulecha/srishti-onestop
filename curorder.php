<?php
session_start();
if(!(isset($_SESSION['uid']))){
    die("<script>window.location.href='login.php';</script>");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneStop | Orders</title>
    <link rel="stylesheet" href="css/basestyle.css">
    <link rel="stylesheet" href="css/order.css">
    <link rel="stylesheet" href="css/curorder.css">
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
    <div id="headtext">Your Current Orders</div>
    <section id="order"> 
            <?php
            $c=mysqli_connect("localhost","root","");
            mysqli_select_db($c,"project");
            $id=$_SESSION['uid'];
            $q="SELECT orderno,orderdate,itemlist,itemqty,itemprice,deladdress from orders where cid=$id";
            $res=mysqli_query($c,$q);
            $n=mysqli_num_rows($res);
            if ($n==0){
                echo "<div style='text-align:center;margin-top:30px'><i class='fas fa-shopping-cart fa-5x' style='font-size:200px;color:rgba(0,0,0,0.7);'></i>";
                echo "<p style='font-size:20px;font-weight:bold'>OOPS! You don't have any orders pending.</p>";
                echo "<p style='font-size:17px;'>Order now!</p></div>";
            }
            else{
            for($i=0;$i<$n;$i++){
            $r=mysqli_fetch_array($res);
            $date=explode("-",$r[1]);
            echo "<div id='ortxt'><p><b>Order Number</b> : $r[0]</p>
            <p><b>Order Details</b> : Ordered on $date[2]/$date[1]/$date[0]</p>
            <p><b>Delivery address</b> : $r[5]</p>";
            $plist=explode(",",$r[2]);
            $pqty=explode(",",$r[3]);
            $pprice=explode(",",$r[4]);
        echo "</div>
        <table id='order_table'>
            <col style='width:55%'>
            <col style='width:15%'>
            <col style='width:15%'>
            <col style='width:15%'>
            <tr>
                <th>Item Name</th>
                <th>Quantity</th>
                <th>Price</th>
                <th>Amount</th>
            </tr>";
            $tot=50;
            for($j=0;$j<count($plist);$j++){
                $q="SELECT pbrand,pname,pweight from productdet as p where pid=$plist[$j]";
                $res1=mysqli_query($c,$q);
                $row=mysqli_fetch_array($res1);
                $price=floatval($pprice[$j])*$pqty[$j];
                $tot+=$price;
                echo "
                <tr>
                <td>$row[0] $row[1] $row[2]</td>
                <td>$pqty[$j]</td>
                <td>".number_format($pprice[$j],2)."</td>
                <td>".number_format($price,2)."</td>
                </tr>";
                
            }
            echo "<tr>
                <td colspan='3'>Delivery charges</td>
                <td>50.00</td>
            </tr>
            <tr>
                <td colspan='4'>TOTAL AMOUNT : ".number_format($tot,2)."</td>
            </tr>
        </table>";}
            }
        ?>
        <!--<p id="finp">Will be delivered to *address* by 26th June,2021-17:00 hrs.</p>-->
    </section>
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
  </body>
  </html>