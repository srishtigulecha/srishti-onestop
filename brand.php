<?php
session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>OneStop</title>
    <link rel="stylesheet" href="css/basestyle.css">
    <link rel="stylesheet" href="css/brand.css">
    <link rel="stylesheet" href="css/index.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Farro&display=swap" rel="stylesheet">
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
    <section>
        <?php
        $brand=$_GET['brand'];
        $c=mysqli_connect("localhost","root","");
        mysqli_select_db($c,"project"); 
        $q="SELECT DISTINCT pbrand FROM productdet where pbrand like '$brand%'";
        $res=mysqli_query($c,$q);
        $r=mysqli_fetch_array($res);
        echo "<div id='headbrandname'>".$r[0]."</div>";
        $brand=$brand."back";
        echo"
        <div class='imgcontainer'>
            <img src='img/$brand.png'>";
        ?>
        </div>
    </section>
    <section id="branditems">
        <div class="container">
            <div class="box">
            <?php
                $brand=$_GET['brand'];
                if(isset($_SESSION['uid'])){
                    $c1=mysqli_connect("localhost","root","");
                    $cart="c".$_SESSION['uid'];
                    mysqli_select_db($c1,'project');
                    $q3="SELECT * FROM $cart";
                    $res=mysqli_query($c1,$q3);
                    $len=mysqli_num_rows($res);
                    $id=[];
                    for ($j=0;$j<$len;$j++){
                        $r=mysqli_fetch_array($res);
                        $id[$j]=$r[0];
                        $qty[$j]=$r[1];
                    }
                }
                $c=mysqli_connect("localhost","root","");
                if(!($c))
                {die("coulnt connect");}
                mysqli_select_db($c,"project"); 
                $q="SELECT DISTINCT pname FROM productdet where pbrand like '$brand%'";
                $res=mysqli_query($c,$q);
                if (!$res){
                    echo 'Error' . mysqli_error($c);
                }
                $num=mysqli_num_rows($res);
                for($i=0;$i<$num;$i++){
                    $row=mysqli_fetch_array($res);
                    $q1="SELECT * FROM productdet where pname='$row[0]'";
                    $res1=mysqli_query($c,$q1);
                    if (!$res1){
                        echo 'Error' . mysqli_error($c);
                        }
                    $num1=mysqli_num_rows($res1);
                    $p=[];
                    $q=[];
                    for ($j=0;$j<$num1;$j++){
                        $row1=mysqli_fetch_array($res1);
                        $q2="SELECT offer from offers where pid=$row1[0]";
                        $result=mysqli_query($c,$q2);
                        $off=0;
                        $disprice=0;
                        if($offval=mysqli_fetch_array($result)){
                            $off=$offval[0];
                            $disprice=$row1[4]-($row1[4]*$off/100);
                        }
                        $q3="SELECT offer from deals where pid=$row1[0]";
                        $result=mysqli_query($c,$q3);
                        if($offval=mysqli_fetch_array($result)){
                            $off=$offval[0];
                            $disprice=$row1[4]-($row1[4]*$off/100);
                        }
                        $p[$j]=number_format($row1[4],2).","."ADD,"."1,".$off.",".number_format($disprice,2);
                        $q[$j]=$row1[3];
                        if(isset($_SESSION['uid'])){
                            for($l=0;$l<$len;$l++){
                                if($id[$l]==$row1[0]){
                                    $p[$j]=number_format($row1[4],2).","."IN CART,".$qty[$l].",".$off.",".number_format($disprice,2);
                                }
                            }
                        }
                        $arr=explode(",",$p[0]);
                        $bval=$arr[1];
                        $pqty=$arr[2];
                        if($bval=="ADD"){
                            $bval="ADD   <i class='fas fa-cart-plus'></i>";
                        }
                        else if($bval=="IN CART"){
                            $bval="IN CART <i class='fas fa-check'></i>";
                        }
                        if ($j==0){
                            echo "<div class='prod'>";
                            echo "<div class='dispmsg'>Item added successfully!</div>";
                            echo "<a href='prod_disp.php?item=$row1[1]'><img src='$row1[5]'></a>";
                            if($off!=0){
                            echo "<p class='offer'>$off% off</p>";
                            }
                            else{
                                echo "<p class='offer' style='display:none;'>$off% off</p>";
                            }
                            echo "<p class='bname'>".$row1[2]."</p>";
                            echo "<p>".$row1[1]."</p>";
                            if($off!=0){
                                echo "<p class='pprice'><span style='color:red;text-decoration:line-through;'>".number_format($row1[4],2)."</span>".number_format($disprice,2)."</p>";
                            }
                            else{
                            echo "<p class='pprice'>".number_format($row1[4],2)."</p>";
                            }
                        }
                    }
                    if (!(isset($_SESSION['uid']))){
                        echo "<form class='prodform' action='login.php?msg=login'>";
                        $ls='no';//check if logged in
                    } 
                    else{
                        echo "<form class='prodform' method='POST' action='addprod.php?pro=brand$row1[2]'>";
                        $ls='yes';
                    }
                            echo"
                                <select name='prodq' class='prodq'>";
                                for ($k=0;$k<$num1;$k++){
                                    $arr=explode(",",$p[$k]);
                                    echo "<option value='".$p[$k]."'>".$q[$k]." - Rs ".$arr[0]."</option>";
                                }
                                echo "</select><br>
                                <div class='drop_menu'>
                                    <label for='quan'>Quantity</label>
                                    <input type='text' name='prod' value='$row1[1]' style='display:none' class='pname'>";
                                    if($bval[0]=='A'){
                                        echo "<input type='number' name='quan' class='quan' value='$pqty'><button type='submit' class='add' value='$ls'>$bval</button>";
                                    }
                                    else{
                                        echo "<input type='number' name='quan' class='quan' value='$pqty' disabled><button type='submit' class='add' value='$ls' disabled>$bval</button>";
                                    }
                                    echo"
                                    <p class='errmsg'>Invalid quantity!</p>
                                </div>
                                </form>
                                </div>";
                    }
                ?>
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
      <script src="js/valprodinp.js"></script>
  </body>
  </html>