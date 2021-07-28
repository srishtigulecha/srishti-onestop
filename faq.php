<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneStop | FAQs</title>
    <link rel="stylesheet" href="css/basestyle.css">
    <link rel="stylesheet" href="css/faq.css">
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
    <section id="faqhead">
            <p id="faq">Frequently Asked Questions (FAQ's) </p>
            <div class="head">
                <div class="heading">
                    <button class="b1">Account</button>
                    <div class="content">
                        <p>Can I edit my account?</p>
                        <p>Yes, you can edit your account details by going to 'MY ACCOUNT' page.</p>
                        <p>Do I need an account to place order?</p>
                        <p>Yes, you need to create a new account, if you dont't have one. If you are an existing customer you are required to login. </p>
                    </div>
                </div>
                <div class="heading">
                    <button class="b1">Payment</button>
                    <div class="content">
                        <p>What are the modes of payment?</p>
                        <p>As of now we only accept Cash On Delivery. Online payment will be rolled out soon.</p>
                        <p>How much are the delivery charges?</p>
                        <p>Delivery charges for an order is Rs.50</p>
                    </div>
                </div>
                <div class="heading">
                    <button class="b1">Order</button>
                    <div class="content">
                        <p>When will my order be delivered?</p>
                        <p>Your order will be delivered within 1-2 working days. We ensure to deliver you at the earliest.</p>
                        <p>Can I change my delivery address?</p>
                        <p>Yes, delivery address can be edited before placing your order. Or you can change your delivery address in 'Your Account Profile' before placing an order.</p>
                    </div>
                </div>
                <div class="heading">
                    <button class="b1">Other</button>
                    <div class="content">
                        <p>How do I contact customer service?</p>
                        <p>Our customer service team is available from 9am-6pm on all working days. You can call them at 1800-2347678 or mail them your queries to customercare@onestop.com</p>
                        <p></p>
                    </div>
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
      <script src="js/faq.js"></script>
  </body>
  </html>