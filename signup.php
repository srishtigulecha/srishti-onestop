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
    <title>OneStop | SignUp</title>
    <link rel="stylesheet" href="css/basestyle.css">
    <link rel="stylesheet" href="css/signup.css">
    <script src="https://kit.fontawesome.com/b61f010dd3.js" crossorigin="anonymous"></script>
</head>
<body>
    <div id="alertmsg" style="color:white;">
        <p>Logged in successfully!</p>
    </div>
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
    <section id="signup_form">
        <form id="signup" name="signup" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
            <h1>Sign Up Today!</h1>
            <div class="form-content">
            <div class="box1">
            <div class="form-control">
                <label for="fname">First Name</label>
                <input type="text" name="fname" id="fname">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="lname">Last Name</label>
                <input type="text" name="lname" id="lname">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            
            <div class="form-control">
                <label for="mailid">Email</label>
                <input type="email" name="emailid" id="emailid">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>
            </div>
            <div class="form-control">
                <label for="phno">Phone Number</label>
                <input type="text" name="phno" id="phno"> 
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>              
            </div>
            <div class="form-control">
                <div id="gender">
                <label for="gender">Gender</label>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small><br>
                <label for="male">Male</label><input type="radio" name="gender" id="male" value="male" onclick="chkgen()">
                <label for="female">Female</label><input type="radio" id="female" name="gender" value="female" onclick="chkgen()">
                <label for="others">Others</label><input type="radio" id="others" name="gender" value="others" onclick="chkgen()">
                </div>
            </div>
            </div>
            <div class="box1">
            <div class="form-control">
                <label for="passw">Password</label>
                <input type="password" name="passw" id="passw">   
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>            
            </div>
            <div class="form-control">
                <label for="chkpass">Password Check</label>
                <input type="password" name="chkpass" id="chkpass">
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small>              
            </div>
            <div class="form-control">
                <label for="address">Address</label>
                <i class="fas fa-check-circle"></i>
                <i class="fas fa-exclamation-circle"></i>
                <small>Error message</small><br>
                <textarea name="address" id="address" cols="30" rows="10" placeholder="Type your address...."></textarea>
            </div>
            </div>
            </div>
            <div id="align">    
                <button id="btn">Submit</button> 
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
      <script src="js/signup.js"></script>
      <script src="js/chkinps.js"></script>
      <?php
        if ($_POST){
        $fname=$_POST['fname'];
        $lname=$_POST['lname'];
        $email=$_POST['emailid'];
        $phno=$_POST['phno'];
        $gen=ucfirst($_POST['gender']);
        $passw=$_POST['passw'];
        $address=$_POST['address'];
        $c=mysqli_connect("localhost","root","");
        if(!($c))
        {die("Could not connect to database");}
        mysqli_select_db($c,"project"); 
        $chkq1="SELECT * FROM custdet where cemail='$email'";
        $chkres1=mysqli_query($c,$chkq1);
        $det1=mysqli_fetch_array($chkres1);
        $chkq2="SELECT * FROM custdet where cphno='$phno'";
        $chkres2=mysqli_query($c,$chkq2);
        $det2=mysqli_fetch_array($chkres2);
        if ($det1){
                echo "<script>document.getElementById('alertmsg').innerHTML='Account already exists with the given Email-ID';</script>";
                echo "<script>document.getElementById('alertmsg').style.display='block';</script>";
                echo "<script>setTimeout(function() { document.getElementById('alertmsg').style.display='none'; },2000);</script>";
        }
        else if ($det2){
            echo "<script>document.getElementById('alertmsg').innerHTML='Account already exists with the given Phone number';</script>";
                echo "<script>document.getElementById('alertmsg').style.display='block';</script>";
                echo "<script>setTimeout(function() { document.getElementById('alertmsg').style.display='none'; },2000);</script>";
        }
        else{
            $q="INSERT INTO custdet (cfname,clname,cemail,cphno,cgen,caddress,cpassw) VALUES ('$fname','$lname','$email','$phno','$gen','$address','$passw')";
            $res=mysqli_query($c,$q);
            $q="SELECT cid from custdet where cemail='$email' and cphno='$phno'";
            $res=mysqli_query($c,$q);
            $r=mysqli_fetch_array($res);
            $_SESSION['uid']=$r[0];
            $tname="c".$_SESSION['uid'];
            $q="CREATE TABLE $tname(pid int primary key,pqty int)";
            $res=mysqli_query($c,$q);
            if (!$res){
            echo "Error". mysqli_error($c);
            }
            else{
                echo "<script>window.location.replace('index.php?msg=accsuccess');</script>";
            }
        }
        }
    ?>
</body>
</html>