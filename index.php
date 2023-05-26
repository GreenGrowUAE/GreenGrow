<?php
session_start();
include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");
include("classes/cart.php");

    $name = "";
    $price = "";
    $quantity = "";
    
    

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $cart = new Store();
        $result = $cart->evaluate($_POST);
        
        if($result != "")
        {
        
        }else
        {
 
        }

        $name = $_POST['name'];
        $price = $_POST['price'];
        $quantity = $_POST['quantity'];

    }
    
    if(isset($_SESSION['userDB']))
    {
        $id = $_SESSION['userDB'];
        $login = new Login();
        $login->check_login($id);

        $result = $login->check_login($id);

        if($result){
            $user = new User();
            $user_data = $user->get_data($id);

            $name = "Welcome, " . $user_data['first_name'] . " " . $user_data['last_name'];
            $what = "Logout";
        }else{
            $what = "Login";
            $name = "Welcome to GreenGrow";  
        }
    }else{
        $what = "Login";
        $name = "Welcome to GreenGrow"; 
    }
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <!--  Website Name -->
        <title>GreenGrow</title>

        <!-- Online CSS -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Fredoka:wght@600&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://unpkg.com/flickity@2/dist/flickity.min.css">
        <link href="https://fonts.googleapis.com/css2?family=Oswald:wght@600&display=swap" rel="stylesheet">
        <script src="https://kit.fontawesome.com/7177b3cbc6.js" crossorigin="anonymous"></script>

        <!-- CSS -->
        <link rel="icon" href="/images/icon_logo.png">
        <link rel="stylesheet" href="/css/layout.css">
        <link rel="stylesheet" href="/css/layout-index.css">

        <!-- JS -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    </head>
    <style>
        .about-desc a{
            text-decoration: none;
        }
    </style>
    <body>
        <!-- Navigation bar -->
    <body>
        <!-- Navigation bar -->
        <header class="container-fluid text-center header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-sm-4 align-items-start">
                        <a href="/index.php"><img src="/images/h_logo.png" width="150px"></a>
                    </div>
                    <div class="col-lg-1 col-sm-1">
                        <a class="drop_home select-menu" href="/index.php">Home</a>
                    </div>
                    <div class="col-lg-1 col-sm-1 menu-bar">
                        <a class="drop_store" href="/store.php">
                            Store
                        </a>

                        <div class="dropdown-menu">
                            <ul>
						        <li><a href="#">Test1</a></li>
						        <li><a href="#">Test2</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-lg-1 col-sm-2">
                        <a class="drop_about" href="/aboutus.php">About us</a>
                    </div>
                    <div class="col-lg-1 col-sm-1">
                        <a class="drop_partner" href="/partners.php">Partners</a>
                    </div>
                    <div class="col-lg-1 col-sm-3">
                        <a class="drop_contact" href="/contactus.php">Contact us</a>
                    </div>
                    <div class="col-lg-4 col-sm-1 text-end">
                        <a href="logout.php"><?php echo $what ?></a>
                    </div>
                    <div class="col-lg-1 text-start">
                        <div class="row">
                            <a href="cart.php">
                                <i class="fa-solid fa-cart-shopping" style="color: #000000;"></i>
                                0
                            </a>  
                        </div>      
                    </div>
                </div>
            </div>
        </header>

        <!--  AD -->
        <advertise class="container-fluid">
            <div class="container ad-background">
                <div class="row">
                    <div col class="col-5 ad-description">
                        <div class="row">
                            <div class="col-12 text-center">
                                <h1>BUY 1</h1><br><h2>GET 1 FREE</h2>
                                <a href="/store.php"><button>ORDER NOW</button></a>
                                <h3>*For Selected Products</h3>
                            </div>
                        </div>
                    </div>
                    <div class="col-7 anim align-items-center">
                        <div class="row d-flex align-items-center product-ad">
                            <img src="/images/proddAD.png" height="450px" width="350px">
                        </div>
                    </div>
                </div>
            </div>
            <br>
        </advertise>

        <!-- About Us -->
        <about class="container-fluid text-center about-desc">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-6 text-center">
                        <h1><?php echo $name ?></h1>
                        <p>We are Greengrow, a UAE based company that believes in sustainable and organic agriculture. Our goal is to provide safe, natural fertilizer using techniques such as composting. Using such methods we shall convert some of the considerable amount of food wasted in the UAE into usable and environmentally friendly products for sale.  This allows us as a group to tackle the problem of immense food waste in the UAE and provide an alternative to harmful chemical fertilisers. If you want to grow guilt free, go Greengrow.</p>
                        <a href="store.php"><button>Learn more about GreenGrow</button></a>
                    </div>
                    <div class="col-6 text-center">
                        <img src="/images/about-img.png" width="650px">
                    </div>
                </div>
            </div>
        </about>

        <!-- Title -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center title">
                    <h1>Products</h1>
                </div>
            </div>
        </div>

        <!-- Products -->
        <product class="container-fluid">
            <div class="container">
                <div class="carousel" id="carousel-product" data-flickity='{ "autoplay": true, "wrapAround": true, "autoPlay": 10000, "pauseAutoPlayOnHover": true}'>
                    <!-- Fertilizer Pellets SMALL -->
                    <div class="carousel-cell carousel-product">
                        <div class="container">
                            <div class="row align-items-start">
                                <div class="col-6 dpbackground">
                                    <div class="row">
                                        <img class="" src="images/prod1.png" height="500px"/>
                                    </div>
                                </div>
                                <div class="col-6 pdesc text-start">
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <div class="col-12 align-self-center">
                                                <h1>Fertilizer Pellets - 1KG</h1>
                                            </div>
                                            <div class="col-12">
                                                <p>Using highly engineered agriculture, this product introduces a perfect amount of nitrates and phosphates to keep your soil healthy and enriched for plants to thrive in. <a href="/pf1.php">More details about this product.</a></p>
                                            </div>
                                            <div class="col-12 text-start">
                                                <form method="POST">
                                                    <input type="hidden" name="name" value="Pellet_Fertilizer-1KG">
                                                    <input type="hidden" name="price" value="10">
                                                    <p1>Quantity</p1><br>
                                                    <div class="col-12" id="qnty">
                                                        <input class="text-center" name="quantity" type="text" maxlength="2" placeholder="00" required><br>
                                                    </div>
                                                    <div class="col-12" id="atcart">
                                                        <button type="submit">Add to Cart</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Fertilizer Pellets MEDIUM -->
                    <div class="carousel-cell carousel-product">
                        <div class="container">
                            <div class="row align-items-start">
                                <div class="col-6 dpbackground">
                                    <div class="row">
                                        <img class="" src="images/prod5.png" height="500px"/>
                                    </div>
                                </div>
                                <div class="col-6 pdesc text-start">
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <div class="col-12 align-self-center">
                                                <h1>Pellet Fertilizer - 5KG</h1>
                                            </div>
                                            <div class="col-12">
                                                <p>Using highly engineered agriculture, this product introduces a perfect amount of nitrates and phosphates to keep your soil healthy and enriched for plants to thrive in. <a href="/pf2.php">More details about this product.</a> </p>
                                            </div>
                                            <div class="col-12 text-start">
                                                <form method="POST">
                                                    <input type="hidden" name="name" value="Pellet_Fertilizer-5KG>
                                                    <input type="hidden" name="price" value="45">
                                                    <p1>Quantity</p1><br>
                                                    <div class="col-12" id="qnty">
                                                        <input class="text-center" name="quantity" type="text" maxlength="2" placeholder="00" required><br>
                                                    </div>
                                                    <div class="col-12" id="atcart">
                                                        <button type="submit">Add to Cart</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Compost Fertilizer LARGE -->
                    <div class="carousel-cell carousel-product">
                        <div class="container">
                            <div class="row align-items-start">
                                <div class="col-6 dpbackground">
                                    <div class="row">
                                        <img class="" src="images/prod61.png" height="500px"/>
                                    </div>
                                </div>
                                <div class="col-6 pdesc text-start">
                                    <div class="container">
                                        <div class="row align-items-center">
                                            <div class="col-12 align-self-center">
                                                <h1>Compost Fertilizer - 100L</h1>
                                            </div>
                                            <div class="col-12">
                                                <p>Using highly engineered agriculture, this product introduces a perfect amount of nitrates and phosphates to keep your soil healthy and enriched for plants to thrive in. <a href="/cs3.php">More details about this product.</a></p>
                                            </div>
                                            <div class="col-12 text-start">
                                                <form method="POST">
                                                    <input type="hidden" name="name" value="Compost_Fertilizer-100L">
                                                    <input type="hidden" name="price" value="50">
                                                    <p1>Quantity</p1><br>
                                                    <div class="col-12" id="qnty">
                                                        <input class="text-center" name="quantity" type="text" maxlength="2" placeholder="00" required><br>
                                                    </div>
                                                    <div class="col-12" id="atcart">
                                                        <button type="submit">Add to Cart</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </product>

        <!-- Title -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center title">
                    <h1>Partners</h1>
                </div>
            </div>
        </div>

        <!-- Partner -->
        <partner class="container-fluid">
            <div class="container text-center" id="carousel-partner">
                <p>Our partners provide valuable food waste to help us produce natural fertilizers that not only reduce food waste from going into landfills but help enrich the soil, essential to plant growth.</p>
                <div class="carousel partner-carousel" data-flickity='{ "autoplay": true, "wrapAround": true, "autoPlay": 1500, "pauseAutoPlayOnHover": true}'>
                    <div class="carousel-cell carousel-partner">
                        <img src="/images/partner1.png" width="300px">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/images/partner2.png" width="300px">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/images/partner3.png" width="300px">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/images/partner4.png" width="300px">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/images/partner5.jpeg" width="300px">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/images/partner6.jpeg" width="300px">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/images/partner7.png" width="300px">
                    </div>
                </div>
            </div>
        </partner>

        <!-- Footer -->
        <footer class="container-fluid footer-bg">
            <div class="container">
                <div class="row footer-desc">
                    <div class="col-3 text-center footer-desc-text">
                        <h1>SITEMAP</h1>
                        <a href="/index.php">Home</a><br>
                        <a href="#">Store</a><br>
                        <a href="#">About Us</a><br>
                        <a href="#">Partners</a><br>
                        <a href="/contactus.php">Contact Us</a>
                    </div>
                    <div class="col-6 text-center">
                        <h1>NEWSLETTER</h1>
                        <form>
                            <input class="text-center" text="email" placeholder="Your Email Address"><br>
                            <button type="submit">SUBSCRIBE NOW</button>                    
                        </form>
                    </div>
                    <div class="col-3 text-center footer-desc-icon">
                        <h1>CONTACT</h1>
                        <p>Bath Spa University, Al Dhait<br>Ras Al Khaimah, UAE</p>
                        <div class="social-icons">
                            <a href="https://www.facebook.com/people/GreenGrow-AE/100091390083577/">
                                <i class="fa-brands fa-facebook fa-lg" style="color: #ffffff;"></i>
                            </a>
                            <a href="https://www.instagram.com/greengrowae/">
                                <i class="fa-brands fa-instagram fa-lg" style="color: #ffffff;"></i>
                            </a>
                            <a href="https://www.tiktok.com/@_greengrow">
                                <i class="fa-brands fa-tiktok fa-lg" style="color: #ffffff;"></i>   
                            </a>
                            <a href="mailto:greengrow.ae@gmail.com">
                                <i class="fa-solid fa-envelope fa-lg" style="color: #ffffff;"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
    </body>
</html>