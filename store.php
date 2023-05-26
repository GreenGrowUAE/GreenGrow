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
        <link rel="icon" href="/icon_logo.png">
        <link rel="stylesheet" href="/css/layout.css">

        <!-- JS -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>
    </head>
    <style>
        .item img{
            background-color: #20632e;
            width: 15rem;
            height: 15rem;
            margin: auto;
            margin-top: 1rem;
            margin-bottom: 1rem;
            border-radius: 1em;
        }
        .item:hover{
            transform: scale(1.15);
            transition: 0.3s;
        }
        .item img:hover{
            filter: blur(0.1rem);
            transition: 0.3s;
            transition-timing-function: ease-in-out;
        }
        .item a{
            text-decoration: none;
            font-family: Inter;
            color: #000000;
        }
        .item p1{
            text-align: start;
            font-size: 12px;
        }
        .item p2{
            font-size: 14px;
            font-weight: 900;
        }
        .item {
            margin-bottom: 1.5rem;
        }
        /* ABOUT US CSS*/
        .ad-background{
            background-image: url('/images/1.png');
            background-size: cover;
            background-repeat: no-repeat;
            background-color: #175925; /* 20632e */
            border-radius: 1em;
        }
        .ad-description{
            color: #ffff;
        }
        .ad-description h1{
            font-size: 5rem;
            padding-top: 7.5rem;
            margin-bottom: -6rem;
            font-family: Fredoka;
        }
        /* IMAGE */
        .ad-description img{
            padding-bottom: 7.5rem;
            transform: scale(1.10);
            margin-left: 4rem;
        }
        /* IMAGE */
        .anim{
            background-image: url('/images/shop-bg.png');
            background-repeat: no-repeat;
            background-size: cover;
            border-top-right-radius: 1em;
            border-bottom-right-radius: 1em;
        }
        /* ABOUT US CSS */
        .about-desc h1{
            color: #175925;
            font-family: Fredoka;
            font-size: 50px;
        }
        .about-desc p{
            margin-top: 2rem;
            margin-bottom: 3rem;
            font-family: Inter;
        }
        .about-desc img{
            border-radius: 1em;
        }
    </style>

    <body>
        <!-- Navigation bar -->
        <header class="container-fluid text-center header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-sm-4 align-items-start">
                        <a href="index.php"><img src="/images/h_logo.png" width="150px"></a>
                    </div>
                    <div class="col-lg-1 col-sm-1">
                        <a class="drop_home select-menu" href="/index.php">Home</a>
                    </div>
                    <div class="col-lg-1 col-sm-1 menu-bar">
                        <a class="drop_store" href="/store.php">
                            Store
                        </a>
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

        <!--  ABOUT US -->
        <about_us class="container-fluid ad-margin">
            <div class="container ad-background">
                <div class="row">
                <div col class="col-6 ad-description">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1>SHOP</h1>
                            <img src="/images/aboutus-bg.png">
                        </div>
                    </div>
                </div>
                    <div class="col-6 anim">
                        <div class="row product-ad">

                        </div>
                    </div>
                </div>
            </div>
            <br>
        </about_us>
        
        <div class="container text-center" id="carousel-partner">
                <p>Surf through our various plant enhanching products to find a product suitable for your needs.</p>
        </div>
        
        <!-- Product -->
        <product class="container-fluid">
            <div class="container">
                <div class="row text-center">
                    <div class="col-12 d-flex align-items-center">
                        <div class="col-3 item">
                            <a href="/pf1.php">
                                <img src="/images/prod1.png" width="300rem">
                                <p>Pellet Fertilizer - 1KG</p>
                                <p1>AED <p2>10.00</p2></p1>
                            </a>
                        </div>
                        <div class="col-3 item">
                            <a href="/pf2.php">
                                <img src="/images/prod5.png" width="300rem">
                                <p>Pellet Fertilizer - 5KG</p>
                                <p1>AED <p2>45.00</p2></p1>
                            </a>
                        </div>
                        <div class="col-3 item">
                            <a href="/pf3.php">
                                <img src="/images/prod5.png" width="300rem">
                                <p>Pellet Fertilizer - 10KG</p>
                                <p1>AED <p2>85.00</p2></p1>
                            </a>
                        </div>
                        <div class="col-3 item">
                            <a href="/tf1.php">
                                <img src="/images/prod3.png" width="300rem">
                                <p>Tablet Fertilizer - 500g</p>
                                <p1>AED <p2>28.00</p2></p1>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12 d-flex align-items-center">
                        <div class="col-3 item">
                            <a href="/tf2.php">
                                <img src="/images/prod3.png" width="300rem">
                                <p>Tablet Fertilizer - 1KG</p>
                                <p1>AED <p2>55.00</p2></p1>
                            </a>
                        </div>
                        <div class="col-3 item">
                            <a href="/tf3.php">
                                <img src="/images/prod2.png" width="300rem">
                                <p>Tablet Fertilizer - 2.5KG</p>
                                <p1>AED <p2>100.00</p2></p1>
                            </a>
                        </div>
                        <div class="col-3 item">
                            <a href="/lf1.php">
                                <img src="/images/spray.png" width="300rem">
                                <p>Liquid Fertilizer - 1L</p>
                                <p1>AED <p2>20.00</p2></p1>
                            </a>
                        </div>
                        <div class="col-3 item">
                            <a href="/lf2.php">
                                <img src="/images/spray.png" width="300rem">
                                <p>Liquid Fertilizer - 2L</p>
                                <p1>AED <p2>35.00</p2></p1>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col-12 d-flex align-items-center">
                        <div class="col-3 item">
                            <a href="/lf3.php">
                                <img src="/images/spray.png" width="300rem">
                                <p>Liquid Fertilizer - 3L</p>
                                <p1>AED <p2>50.00</p2></p1>
                            </a>
                        </div>
                        <div class="col-3 item">
                            <a href="/mf1.php">
                                <img src="/images/prod8.png" width="300rem">
                                <p>Manure Fertilizer - 15KG</p>
                                <p1>AED <p2>10.00</p2></p1>
                            </a>
                        </div>
                        <div class="col-3 item">
                            <a href="/mf2.php">
                                <img src="/images/prod8.png" width="300rem">
                                <p>Manure Fertilizer - 25KG</p>
                                <p1>AED <p2>25.00</p2></p1>
                            </a>
                        </div>
                        <div class="col-3 item">
                            <a href="/mf3.php">
                                <img src="/images/prod8.png" width="300rem">
                                <p>Manure Fertilizer - 45KG</p>
                                <p1>AED <p2>45.00</p2></p1>
                            </a>
                        </div>
                        </div>
                    </div>
                    <div class="row text-center">
                    <div class="col-12 d-flex align-items-center">
                        <div class="col-3 item">
                            <a href="/cs1.php">
                                <img src="/images/prod9.png" width="300rem">
                                <p>Compost - 25L</p>
                                <p1>AED <p2>15.00</p2></p1>
                            </a>
                        </div>
                        <div class="col-3 item">
                            <a href="/cs2.php">
                                <img src="/images/prod9.png" width="300rem">
                                <p>Compost - 50L</p>
                                <p1>AED <p2>25.00</p2></p1>
                            </a>
                        </div>
                        <div class="col-3 item">
                            <a href="/cs3.php">
                                <img src="/images/prod61.png" width="300rem">
                                <p>Compost - 100L</p>
                                <p1>AED <p2>50.00</p2></p1>
                            </a>
                        </div>
                        <div class="col-3 item">
                        </div>
                    </div>
                </div>
            </div>
        </product>
        <!-- FOOTER -->
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
                            <a href="https://www.tiktok.com/@_greengrow_">
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