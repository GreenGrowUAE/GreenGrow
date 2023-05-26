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
            $name = "Welcome to Greengrow";  
        }
    }else{
        $what = "Login";
        $name = "Welcome to Greengrow"; 
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

        <!-- JS -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
        <script src='https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js'></script>

    </head>

    <style>
        /* CONTACT CSS*/
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
            font-size: 4.5rem;
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
            background-image: url(/images/contactus-bg.png);
            background-repeat: no-repeat;
            background-size: cover;
            border-top-right-radius: 1em;
            border-bottom-right-radius: 1em;
        }

        /* CONTACT CSS */
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
        .var{
            height: 2.5rem;
            width: 100%;
            margin-bottom: 0.5rem;
            font-family: Inter;
            font-size: 14px;
        }
        .contact-form {
            margin-top: 2rem;
            margin-bottom: 2rem;
        }

        .contact-form input {
            border: solid 0.1rem #175925;
            background-color: #dedede;
        }

        .contact-form textarea{
            border: solid 0.1rem #175925;
            background-color: #dedede;
        }
        .contact-form button{
            background: none;
            padding: 0;
            margin: auto;
            font: inherit;
            cursor: pointer;
            outline: inherit;
            background-color: none;
            font-size: 20px;
            font-family: Fredoka;
            margin-top: 1rem;
            padding: 0.5rem;
            border: solid 0.1rem #175925;
            background-color: #175925;
            color: #ffff;
            border-radius: 0.5em;
        }
        .contact-form button:hover{
            margin-top: 1rem;
            padding: 0.5rem;
            border: solid 0.1rem #175925;
            background-color: #ffff;
            color: #175925;
            border-radius: 0.5em;
            transition: 0.5s;
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

        <!--  Shop Head -->
        <about_us class="container-fluid ad-margin">
            <div class="container ad-background">
                <div class="row">
                <div col class="col-6 ad-description">
                    <div class="row">
                        <div class="col-12 text-center">
                            <h1>CONTACT</h1>
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

        <!-- Any Help Container -->
        <about class="container-fluid text-center about-desc">
            <div class="container">
                <div class="row d-flex align-items-center">
                    <div class="col-6 text-center">
                        <img src="/images/callcenter.png" width="650px">
                    </div>
                    <div class="col-6 text-center p-right">
                        <h1>Need Any Help?</h1>
                        <p>
                            At Greengrow, we pride ourselves on delivering exceptional customer service that goes hand in hand with our premium quality fertilizers. We understand that our customers are the backbone of our business, and we strive to exceed their expectations at every step of their journey with us.
                            From the moment you reach out to us, whether it's through a phone call, email, or visit to our website, our dedicated customer service team is ready to assist you. Our knowledgeable and friendly representatives are well-trained in all aspects of our products and services, and they are eager to address any questions or concerns you may have.
                        </p>
                    </div>
                </div>
            </div>
        </about>
        
        <!-- Our Team -->
        <div class="container-fluid">
            <div class="row">
                <div class="col-12 text-center title">
                    <h1>Get In Touch</h1>
                    <p>At Greengrow, we value feedback from our customers. We actively seek input to continuously improve our products and services. We will reply to your emails within 3 to 5 business days.</p>
                </div>
            </div>
        </div>

        <!-- Contact Us -->
        <div class="container-fluid">
            <div class="container">
                <div class="row">
                    <div class="col-12 text-center contact-form">
                        <form target="_blank" action="https://formsubmit.co/greengrow.ae@gmail.com" method="POST">
                            <div class="row d-flex align-item-center">
                                <div class="col-6">
                                    <div class="col var text-center">
                                        <input class="" type="text" name="name" placeholder="Your Name" required>
                                    </div>
                                    <div class="col var text-center">
                                        <input class="" type="email" name="email" placeholder="Your Email ID" required>
                                    </div>
                                    <div class="col var text-center">
                                        <input class="" type="text" name="phone" placeholder="Your Phone No." required>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <textarea name="message" rows="6" cols="50" placeholder="Enter your message here"></textarea>
                                </div>
                                <div class="col-12 text-center">
                                    <button type="submit">Send Message</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        

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