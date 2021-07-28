<?php
session_start();
if((isset($_SESSION['uid']))){
    die("<script>window.location.replace('index.php?msg=loginal');</script>");
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneStop | Login</title>
    <link rel="stylesheet" href="css/basestyle.css">
    <link rel="stylesheet" href="css/signup.css">
    <script src="https://kit.fontawesome.com/b61f010dd3.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div id="alertmsg">
            <p>Logged in successfully!</p>
        </div>
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
    <section id="signup_form">
        <form id="login" action="chklogin.php" method="POST">
            <h1>Login</h1>
            <div class="form-control">
                <label for="phno">Phone Number</label>
                <?php if(isset($_COOKIE['phno'])){
                    $p=$_COOKIE['phno'];
                    echo "<input type='text' name='phno' id='phno' value='$p'>";
                }
                else{
                    echo "<input type='text' name='phno' id='phno'>";
                }
                ?>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>              
            </div>
            <div class="form-control">
                <label for="passw">Password</label>
                <?php if(isset($_COOKIE['passw'])){
                    $pa=$_COOKIE['passw'];
                    echo "<input type='password' name='passw' id='passw' value='$pa'>";
                }
                else{
                    echo "<input type='password' name='passw' id='passw'>";
                }
                ?>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>            
            </div>
            <div class="form-control" style="margin-top:-10px;margin-bottom :-10px;">
                <input type="checkbox" name="rem" id="rem">
                <label for="rem">Remember me</label>
            </div>
            <div id="align">
                <button id="form_sub">Submit</button>  
            </div>
        </form>        
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
      <script src="js/login.js"></script>
      <script src="js/chkinps.js"></script>
      <?php
        if ($_GET){
            $msg=$_GET['msg'];
            if ($msg=='login'){
                echo "<script>document.getElementById('alertmsg').innerHTML='Log in/Sign up to shop now!';</script>";
                echo "<script>document.getElementById('alertmsg').style.display='block';</script>";
                echo "<script>setTimeout(function() { document.getElementById('alertmsg').style.display='none'; },2000);</script>";
            }
            if($msg=='error'){
                echo "<script>document.getElementById('alertmsg').innerHTML='Incorrect phone number or password!';</script>";
                echo "<script>document.getElementById('alertmsg').style.display='block';</script>";
                echo "<script>setTimeout(function() { document.getElementById('alertmsg').style.display='none'; },2000);</script>";
            }
        }
        ?>
</body>
</html>