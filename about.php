<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneStop | About</title>
    <link rel="stylesheet" href="css/basestyle.css">
    <link rel="stylesheet" href="css/about.css">
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
    <section id="abt">
        <div class="img">
            <p>Stay home and Shop online!</p>
        </div>
        <div class="abt_content">
            <p>We offer customers in Chennai an easy and efficient way to purchase products online.</p>
            <p>We are committed to serve you with best products at the best rates. We try to deliver the products at the erarliest.</p>
            <p>Established in 2020, with only products from 3 brands. Now we offer delivery of products with over 20+ brands.</p>
            <p>Stay home ! Stay safe ! Keep shopping !</p>
        </div>
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