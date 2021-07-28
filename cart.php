<?php
session_start();
if (!(isset($_SESSION['uid']))){
    die("<script>location.href='login.php';</script>");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneStop | Cart</title>
    <link rel="stylesheet" href="css/basestyle.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="stylesheet" href="css/cart.css">
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
    <section id="cart_items">
        <div class="container">
            <div class="box">
                <?php
                    $c1=mysqli_connect('localhost','root','','project');
                    $cart='c'.$_SESSION['uid'];
                    $q="SELECT c.pid,p.pname,p.pbrand,p.pweight,p.pprice,p.pimg,c.pqty FROM productdet as p INNER JOIN $cart as c where p.pid=c.pid";
                    $res=mysqli_query($c1,$q);
                    if(!$res){
                        echo "<p>Sorry! You don't have any items in your cart.</p>";
                    }
                    else{
                    $num=mysqli_num_rows($res);
                    $id='';
                    for ($i=0;$i<$num;$i++){
                        $row=mysqli_fetch_array($res);
                        $id=$id.$row[0].",";
                        $q2="SELECT offer from offers where pid=$row[0]";
                        $result=mysqli_query($c1,$q2);
                        $off=0;
                        $disprice=0;
                        if($offval=mysqli_fetch_array($result)){
                            $off=$offval[0];
                            $disprice=$row[4]-($row[4]*$off/100);
                        }
                        $q3="SELECT offer from deals where pid=$row[0]";
                        $result=mysqli_query($c1,$q3);
                        if($offval=mysqli_fetch_array($result)){
                            $off=$offval[0];
                            $disprice=$row[4]-($row[4]*$off/100);
                        }
                        echo "<div class='prod'>
                        <div class='dispmsg'>Item added successfully!</div>
                        <a href='prod_disp.php?item=$row[1]'><img src='$row[5]'></a>";
                        if($off!=0){
                            echo "<p class='offer'>$off% off</p>";
                            }
                            else{
                                echo "<p class='offer' style='display:none;'>$off% off</p>";
                            }
                        echo "<p class='bname'>$row[2]</p>
                        <p>$row[1]</p>";
                        if($off!=0){
                            echo "<p class='pprice'><span style='color:red;text-decoration:line-through;'>".number_format($row[4],2)."</span>".number_format($disprice,2)." - <span class='new'>$row[3]</span>"."</p>";
                        }
                        else{
                        echo "<p class='pprice'>".number_format($row[4],2)." - <span class='new'>$row[3]</span></p>";
                        }
                        echo "<form method='POST' action='deleteprod.php'>";
                        echo "<div class='drop_menu'>
                            <label for='quan'>Quantity</label>
                            <input type='number' name='quan' class='quan' value='$row[6]'>
                            <button type='submit' class='remove_btn' name='prodid' value='$row[0]'>REMOVE  <i class='fas fa-trash-alt'></i></button>
                            <p class='errmsg'>Invalid quantity!</p>
                        </div>
                        </form>
                </div>";
                    }
                }  
            echo "</div>
        </div>
    </section>
    <section id='place'>";
    if ($num==0){
        echo "<i class='fas fa-shopping-cart fa-5x' style='font-size:200px;color:rgba(0,0,0,0.7);'></i>";
        echo "<p style='font-size:20px;font-weight:bold'>OOPS! You don't have any items in cart</p>";
        echo "<p style='font-size:17px;'>Shop today!</p>";
    }
    else{
        $id=substr($id,0,strlen($id)-1);
        echo "<form action='order.php' id='final' method='POST'>
        <input type='text' class='tr' name='tr' value='1' style='display:none'>
        <input type='text' class='tid' name='tid' value='$id' style='display:none'>
        <button id='cart_btn' name='v' value='1'>PROCEED TO PLACE ORDER</button></form>";
    }   
    echo "</section>";?>
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
      <script src="js/cart.js"></script>
</body>
</html>