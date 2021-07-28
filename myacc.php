<?php
session_start();
if(!(isset($_SESSION['uid']))){
    die ("<script>location.href='login.php'</script>");
}?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneStop | My Account</title>
    <link rel="stylesheet" href="css/basestyle.css">
    <link rel="stylesheet" href="css/myacc.css">
    <script src="https://kit.fontawesome.com/b61f010dd3.js" crossorigin="anonymous"></script>
</head>
<body>
    <header>
        <div id="alertmsg" style="font-size: 15px;">
            <p>text</p>
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
    <?php
    $c=mysqli_connect("localhost","root","");
    if(!$c){
        die("Could not connect to database");
    }
    mysqli_select_db($c,"project");
    $uid=$_SESSION['uid'];
    $q="SELECT * FROM custdet where cid=$uid";
    $res=mysqli_query($c,$q);
    $det=mysqli_fetch_array($res);
    ?>
    <section id="acc_det">
        <p id="headp"><i class="fas fa-user-circle"></i>  Profile</p>
        <form id="det_form" action="edit.php" method="POST">
        <button id="edit_btn">Edit    <i class="fas fa-edit"></i></button>
        <button id="save_btn">Save    <i class="fas fa-save"></i></button>
            <div class="body_content"> 
            <div class="per_det">
                <label for="fname">First Name</label><br>
                <?php echo"<input type='text' name='fname' id='fname' value='".$det[1]."' disabled>";?>
                <p id="erfname"></p>
                <label for="lname">Last Name</label><br>
                <?php echo"<input type='text' name='lname' id='lname' value='".$det[2]."' disabled>";?>
                <p id="erlname"></p>
                <label for="fname">Gender<span>(Male/Female/Others)</span></label><br>
                <?php echo"<input type='text' name='gender' id='gender' value='".$det[5]."' disabled>";?>
                <p id="ergender"></p>
            </div>
            <div class="con_det">
                <label for="phno">Phone number</label><br>
                <?php echo"<input type='text' name='phno' id='phno' value='".$det[4]."' disabled>";?>
                <p id="erphno"></p>
                <label for="emailid">Email</label><br>
                <?php echo "<input type='email' name='emailid' id='emailid' value='".$det[3]."' disabled>";?>
                <p id="eremailid"></p>
                <label for="address">Address</label><br>
                <?php echo "<textarea name='address' id='address' disabled>".$det[6]."</textarea>";?>
                <p id="eraddress"></p>
            </div>
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
    </footer>
    <script src="js/myacc.js"></script>
    <?php
    if($_GET){
        $msg=$_GET['msg'];
        if($msg=='pherr'){
            echo "<script>document.getElementById('alertmsg').innerHTML='Account already exists with the given Phone number!';</script>";
            echo "<script>document.getElementById('alertmsg').style.display='block';</script>";
            echo "<script>setTimeout(function() { document.getElementById('alertmsg').style.display='none'; },2000);</script>";
        }
        else if($msg=='emerr'){
            echo "<script>document.getElementById('alertmsg').innerHTML='Account already exists with the given Email-ID!';</script>";
            echo "<script>document.getElementById('alertmsg').style.display='block';</script>";
            echo "<script>setTimeout(function() { document.getElementById('alertmsg').style.display='none'; },2000);</script>";
        }
        else if($msg=='err'){
            echo "<script>document.getElementById('alertmsg').innerHTML='Account already exists with the given Email-ID or Phone number!';</script>";
            echo "<script>document.getElementById('alertmsg').style.display='block';</script>";
            echo "<script>setTimeout(function() { document.getElementById('alertmsg').style.display='none'; },2000);</script>";
        }
        else if($msg=='success'){
            echo "<script>document.getElementById('alertmsg').innerHTML='Account details modified.';</script>";
            echo "<script>document.getElementById('alertmsg').style.display='block';</script>";
            echo "<script>setTimeout(function() { document.getElementById('alertmsg').style.display='none'; },2000);</script>";
        }
    }
    ?>
</body>
</html>