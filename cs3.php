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

        .title-product{
            margin-top: 3rem;
        }

        .price {
            margin-top: -5rem;
            margin-bottom: -5rem;
        }

        /* Other Products Carousel */
        .partner-carousel{
            padding-top: 2.5rem;
            padding-bottom: 2.5rem;
            border-radius: 1em;
            background-image: url('/images/1.png');
            background-size: cover;
            background-color: #20632e;
        }
        .carousel-partner{
            background-color: rgba(255, 255, 255, 0.8);
            margin-left: 1rem;
            margin-right: 1rem;
            border-radius: 1em;
        }
        .carousel-partner img{
            border-top-left-radius: 1em;
            border-top-right-radius: 1em;
            border-bottom-left-radius: 1em;
            border-bottom-right-radius: 1em;
        }
        .carousel-partner h1{
            font-family: Inter;
            font-weight: bold;
            font-size: 1.5rem;
        }
        .carousel-partner p{
            font-family: Inter;
        }
        #carousel-partner .flickity-page-dots {
            bottom: -22px;
        }
        #carousel-partner .flickity-page-dots .dot {
            height: 0.3rem;
            width: 2rem;
            margin: 0rem;
            border-radius: 0rem;
        }
        #carousel-partner .flickity-button {
            color: transparent;
            background: transparent;
        }
    </style>
    <body>
        <!-- Navigation bar -->
        <header class="container-fluid text-center header">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-2 col-sm-4 align-items-start">
                        <a href="index.php"><img src="images/h_logo.png" width="150px"></a>
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

        <!-- Products -->
        <product class="container-fluid">
            <div class="container">
                <!-- Fertilizer Pellets - 1KG -->
                <div class="container">
                    <div class="row align-items-start">
                        <div class="col-6 dpbackground">
                            <div class="row">
                                <img class="" src="/images/prod61.png" height="600px"/>
                            </div>
                        </div>
                        <div class="col-6 pdesc text-start">
                            <div class="container">
                                <div class="row align-items-center">
                                    <div class="col-12 align-self-center">
                                        <h1>Compost - 100L</h1>
                                    </div>
                                    <div class="col-12">
                                        <p>Introducing GreenGrow's revolutionary fertilizer pellets, the ultimate solution for optimizing plant growth and vitality. Designed with cutting-edge technology and a commitment to sustainable agriculture, these pellets are a game-changer for gardeners, farmers, and plant enthusiasts alike. Packed with a balanced blend of essential nutrients, GreenGrow's fertilizer pellets provide plants with everything they need to thrive.</p>
                                    </div>

                                    <div class="col-12 price">
                                        <P>Price: <b>50.00 AED</b></p>
                                    </div>
                                    
                                    <div class="col-12 ppdesc">
                                        <p2 style="font-family: Inter">Weight: 100000g / 100L</p2><br>
                                        <p3 style="font-family: Inter">Class: Compost</p3><br><br>
                                    </div>
                                    <form method="POST">
                                        <input type="hidden" name="name" value="Compost-50L">
                                        <input type="hidden" name="price" value="50">
                                        <p1>Quantity</p1><br>
                                        <div class="col-12" id="qnty">
                                            <input class="text-center" name="quantity" type="text" maxlength="2" placeholder="00" required><br>
                                        </div>
                                        <div class="col-12" id="atcart">
                                            <button type="submit">Add to Cart</button>
                                            <a href="#"><button>Buy Now</button></a>
                                        </div>
                                    </form> 
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </product>

        <!-- Other Products Title -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center title title-product">
                    <h1>Our Other Products</h1>
                </div>
            </div>
        </div>

        <!-- Other Products -->
        <member class="container-fluid">
            <div class="container text-center" id="carousel-partner">
                <p>Search through our other products to find a product right for you.</p>
                <div class="carousel partner-carousel" data-flickity='{ "autoplay": true, "wrapAround": true, "autoPlay": 3000, "pauseAutoPlayOnHover": true}'>
                    <div class="carousel-cell carousel-partner">
                        <!-- Pellet Fertilizer  -->
                        <a href=""><img src="/images/prod8.png" width="300px"></a>
                        <h1>Pellet Fertilizer</h1>
                        <p>5000g / 5kg</p>
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <!-- Pellet Fertilizer  -->
                        <a href=""><img src="/images/prod5.png" width="300px"></a>
                        <h1>Pellet Fertilizer</h1>
                        <p>10000g / 10kg</p>
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <!-- Tablet Fertilizer  -->
                        <a href=""><img src="/images/prod3.png" width="300px"></a>
                        <h1>Tablet Fertilizer</h1>
                        <p>500g</p>
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <!-- Tablet Fertilizer  -->
                        <a href=""><img src="/images/prod3.png" width="300px"></a>
                        <h1>Tablet Fertilizer</h1>
                        <p>1000g / 1kg</p>
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <!-- Tablet Fertilizer  -->
                        <a href=""><img src="/images/prod2.png" width="300px"></a>
                        <h1>Tablet Fertilizer</h1>
                        <p>5000g / 5kg</p>
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <!-- Liquid Fertilizer  -->
                        <a href=""><img src="/images/spray.png" width="300px"></a>
                        <h1>Liquid Fertilizer</h1>
                        <p>1000ml / 1L</p>
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <!-- Liquid Fertilizer  -->
                        <a href=""><img src="/images/spray.png" width="300px"></a>
                        <h1>Liquid Fertilizer</h1>
                        <p>2000ml / 2L</p>
                    </div>
                </div>
            </div>
        </member>
        
        <!-- Footer -->
        <footer class="container-fluid footer-bg">
            <div class="container">
                <div class="row footer-desc">
                <div class="col-3 text-center footer-desc-text">
                        <h1>SITEMAP</h1>
                        <a href="/index.php">Home</a><br>
                        <a href="/store.php">Store</a><br>
                        <a href="/aboutus.php">About Us</a><br>
                        <a href="/partners.php">Partners</a><br>
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