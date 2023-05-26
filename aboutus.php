<?php
session_start();

include("classes/connect.php");
include("classes/login.php");
include("classes/user.php");

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
            background-image: url(/images/fertilizer4.jpeg);
            background-repeat: no-repeat;
            background-size: cover;
            border-top-right-radius: 1em;
            border-bottom-right-radius: 1em;
        }
        /* MEMBER CSS*/
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
        }
        #carousel-partner .flickity-page-dots {
            bottom: -22px;
        }
        #carousel-partner .flickity-page-dots .dot {
            height: 0px;
            width: 0px;
            margin: 0;
            border-radius: 0;
        }
        #carousel-partner .flickity-button {
            color: transparent;
            background: transparent;
        }
        /* ABOUT US CSS */
        .about-desc h1{
            color: #175925;
            font-family: Fredoka;
            font-size: 50px;
        }
        .about-desc p{
            margin-top: 3rem;
            margin-bottom: 3rem;
            font-family: Inter;
        }
        .about-desc img{
            border-radius: 1em;
            margin-bottom: 3rem;
        }
        .p-right p{
            margin-left: 1.5rem;
        }
        .p-right h1{
            margin-left: 1.5rem;
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
       
        <!--  ABOUT US -->
        <about_us class="container-fluid ad-margin">
            <div class="container ad-background">
                <div class="row">
                <div col class="col-6 ad-description">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1>ABOUT</h1>
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

        <about class="container-fluid text-center about-desc">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-6 text-center">
                        <h1>What is GREENGROW?</h1>
                        <p>As a company, Greengrow was created to find some way to mitigate the modern, immense problem of food wastage. To accomplish this, we have developed a system to combine a multitude of techniques into a way to convert food waste into usable agricultural products such as compost and bone meal. We at Greengrow strive to be as sustainable and environmentally-friendly as possible while also providing quality products to our customers. Go Greengrow if you want to waste less today and grow a better, greener tomorrow.</p>
                    </div>
                    <div class="col-6 text-center">
                        <img src="/images/farm-png.png" width="650px">
                    </div>
                </div>
            </div>
        </about>

        <about class="container-fluid text-center about-desc">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-6 text-center">
                        <img src="/images/fert-company.png" width="650px">
                    </div>
                    <div class="col-6 text-center p-right">
                        <h1>How do we operate?</h1>
                        <p>GreenGrow is a company that specializes in producing eco-friendly fertilizer and compost. They employ sustainable practices and utilize organic materials to create their products. By carefully selecting natural ingredients and employing environmentally friendly manufacturing processes, GreenGrow ensures that their fertilizers and compost contribute to soil health without harmful chemicals or synthetic additives. Their focus is on promoting sustainable agriculture and minimizing the environmental impact of farming practices.</p>
                    </div>
                </div>
            </div>
        </about>
        
        <!-- Our Team -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center title">
                    <h1>Our Team</h1>
                </div>
            </div>
        </div>

        <!-- MEMBERS -->
        <member class="container-fluid">
            <div class="container text-center" id="carousel-partner">
                <p>GreenGrow specializes in eco-friendly fertilizer and compost, promoting sustainable farming practices. With a passionate team, we craft high-quality products to support greener and more sustainable food production.</p>
                <div class="carousel partner-carousel" data-flickity='{ "autoplay": true, "wrapAround": true, "autoPlay": 1500, "pauseAutoPlayOnHover": true}'>
                    <div class="carousel-cell carousel-partner">
                        <!-- Chris Jericson -->
                        <img src="/images/member-chris.jpg" width="300px">
                        <h1>Founder</h1>
                        <p?>Christian Jericson Vestil</p>
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <!-- Aaron Joeshier -->
                        <img src="/images/member-aj.jpeg" width="300px">
                        <h1>CEO</h1>
                        <p>Aaron Joeshier Balagtas</p>
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <!-- Nicolas Parilla -->
                        <img src="/images/member-nicolas.jpg" width="300px">
                        <h1>COO</h1>
                        <p>Nicolas Stanley Parilla</p>
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <!-- Zayne Mundo -->
                        <img src="/images/member-zayne.jpeg" width="300px">
                        <h1>Lead Developer</h1>
                        <p>Zayne Zack Mundo</p>
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <!-- Hannah Lacap -->
                        <img src="/images/member-hannah.jpg" width="300px">
                        <h1>Financial Lead</h1>
                        <p>Hannah Khrizha Lacap</p>
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <!-- Aaron Paul -->
                        <img src="/images/member-ajj.jpeg" width="300px">
                        <h1>Marketing Lead</h1>
                        <p>Aaron Paul Jimenez</p>
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <!-- Leo  -->
                        <img src="/images/member-lean.jpeg" width="300px">
                        <h1>Social Lead</h1>
                        <p>Leo Angelo Develos</p>
                    </div>
                </div>
            </div>
        </member>

        
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