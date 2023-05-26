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
        <link rel="stylesheet" href="/css/layout.css">
        <link rel="icon" href="/images/icon_logo.png">

        <!-- JS -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
        <script src='https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js'></script>

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
            background-image: url('/images/partner-bg.jpeg');
            background-repeat: no-repeat;
            background-size: cover;
            border-top-right-radius: 1em;
            border-bottom-right-radius: 1em;
        }
        .bg-car{
            background-image: url('/images/3.png');
            background-size: cover;
            background-repeat: no-repeat;
            border-radius: 1em;
                background-color: #20632e;
                margin-bottom: -4rem;
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
            /* PARTNER CSS*/
            .partner-carousel{
                padding-top: 3%;
                padding-bottom: 3%;
                border-radius: 1em;
            }
            .carousel-partner{
                margin-left: 1%;
                margin-right: 1%;
            }
            .carousel-partner img{
                border-radius: 100%;
            }
            #carousel-partner{
                border-radius: 1em;
                background-color: #20632e;
                margin-bottom: -4rem;
            }
            .carousel-partner img:hover{
                transform: scale(1.2);
            }

            /* OTHER CSS*/
            .title{
                margin-top: 1%;
            }
            .title h1{
                color: #175925;
                font-family: Fredoka;
                font-size: 60px;
            }
            .flickity-page-dots {
                bottom: -22px;
            }
            .flickity-page-dots .dot {
                height: 0px;
                width: 0px;
                margin: 0;
                border-radius: 0;
            }
            .flickity-button {
                color: transparent;
                background: transparent;
            }
        </style>

    </head>

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
                            <h1>PARTNER</h1>
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
        
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center title">
                    <h1>Our Partners</h1>
                    <p>Greengrow's partnerships play a vital role in creating a positive change within the fertilizer industry.</p>

                </div>
            </div>
        </div>
       
        <!-- Partner -->
        <partner class="container-fluid">
            <div class="container text-center" id="carousel-partner">
                <div class="carousel partner-carousel" data-flickity='{ "autoplay": true, "wrapAround": true, "autoPlay": 1000, "pauseAutoPlayOnHover": false, "pauseAutoPlayOnDrag": false}'>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p1.png" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p2.png" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p3.png" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p4.png" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p5.png" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p6.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p7.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p8.png" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p9.png" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p10.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p11.jpeg" width="100rem">
                    </div>
                </div>
            </div>
        </partner>

        <!-- Partner -->
        <partner class="container-fluid">
            <div class="container text-center" id="carousel-partner">
                <div class="carousel partner-carousel" data-flickity='{ "autoplay": true, "wrapAround": true, "autoPlay": 1050, "pauseAutoPlayOnHover": false}'>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p12.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p13.png" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p14.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p15.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p16.png" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p17.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p18.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p19.png" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p20.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p21.png" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p22.png" width="100rem">
                    </div>
                </div>
            </div>
        </partner>

        <partner class="container-fluid">
            <div class="container text-center bg-car" id="carousel-partner">
                <div class="carousel partner-carousel" data-flickity='{ "autoplay": true, "wrapAround": true, "autoPlay": 1150, "pauseAutoPlayOnHover": false}'>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p23.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p24.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p25.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p26.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p27.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p33.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p32.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p31.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p30.jpeg" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p29.png" width="100rem">
                    </div>
                    <div class="carousel-cell carousel-partner">
                        <img src="/partners/p28.jpeg" width="100rem">
                    </div>
                </div>
            </div>
        </partner>

        <br><br><br>
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