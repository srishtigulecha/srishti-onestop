<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneStop | Contact</title>
    <link rel="stylesheet" href="css/basestyle.css">
    <link rel="stylesheet" href="css/contact.css">
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
    <section class="contact">
        <h2 id="head">Contact Us</h2>
        <div class="container">
            <div class="contact_info">
                <div class="box">
                    <div class="icon"><i class="fas fa-map-marker-alt"></i></div>
                    <div class="text">
                        <h3>Address</h3>
                        <p>No.13, XYZ Lane, 7th Sector,<br> AB Nagar, Chennai-600078</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fas fa-phone-alt"></i></div>
                    <div class="text">
                        <h3>Phone</h3>
                        <p>1800-2347678</p>
                    </div>
                </div>
                <div class="box">
                    <div class="icon"><i class="fas fa-envelope"></i></div>
                    <div class="text">
                        <h3>Email</h3>
                        <p>customercare@onestop.com</p>
                    </div>
                </div>
            </div>
            <div class="contact_form">
                <form id="con_form" action="conform.php" method="POST">
                    <h2>Want to know more?</h2>
                    <label for="name">Name</label><br>
                    <input type="text" id="name" name="name"><br>
                    <p id="ername"></p>
                    <label for="phno">Phone number</label><br>
                    <input type="text" id="phno" name="phno"><br>
                    <p id="erphno"></p>
                    <label for="emailid">Email</label><br>
                    <input type="email" name="emailid" id="emailid"><br>
                    <p id="eremailid"></p>
                    <label for="query">Query/Feedback</label><br>               
                    <textarea name="query" id="query" cols="30" rows="10" ></textarea><br>
                    <p id="erquery"></p>
                    <input type="submit" value="Submit" id="submit_query">
                </form>
            </div>
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
      <script src="js/contact.js"></script>
  </body>
  </html>