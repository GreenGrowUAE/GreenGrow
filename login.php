<?php
// SESSION
session_start();
    // Includes multiple PHP
    include("classes/connect.php");
    include("classes/login.php");

    // Variable
    $email = "";
    $password = "";

    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $login = new Login();
        $result = $login->evaluate($_POST);

        if($result != "")
        {

            echo "<div style='text-align: center; font-size: 12px; color: white; background-color: grey;'>";   
            echo "<br>The following Error occurred<br><br>";
            echo $result;
            echo "</div>";
        }else
        {
            header("Location: index.php");
            die;
        }

        $email = $_POST['email'];
        $password = $_POST['password'];

    }
?>
<htm lang="eng">
    <head>
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
        <link rel="stylesheet" href="/css/layout2.css">
        <link rel="icon" href="/images/icon_logo.png">

        <!-- JS -->
        <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js'></script>
        <script src="https://unpkg.com/flickity@2/dist/flickity.pkgd.min.js"></script>

    </head>
    <style>
        body{
            background-repeat: no-repeat;
            background-size: cover;
            background-color: #ffffff;
        }
        .maxh{
            height: 100%;
        }
        .signup{
            background-color: rgb(255, 255, 255);
            padding: 2rem;
        }
        .var{
            height: 2.5rem;
            width: 100%;
            margin-bottom: 0.5rem;
            font-family: Roboto;
            font-size: 14px;
        }
        .desc{
            margin-bottom: 2rem;
            color: #ffffff;
        }
        .var_i{
            padding: 0.5rem;
            color: #1a1a1a;
            width: 100%;
            height: 100%;
            border-radius: 0.5em;
            border: 1px solid #afafaf;
        }
        .var_text{
            font-family: Inter;
            font-size: 18px;
            font-weight: bold;
        }
        #login{
            padding-top: 0.4rem;
            font-family: Inter;
            font-size: 14px;
        }
        #login a{
            text-decoration: none;
            color: #076eb7;
        }
        .title{
            margin-bottom: 0.1rem;
        }
        .title p{
            font-family: Lobster;
            font-weight: bolder;
            font-size: 40px;
            color: rgb(75, 183, 17);
        }
        #button{
            height: 2.5rem;
            width: 100%;
            border-radius: 0.6em;
            font-size: 14px;
            font-weight: bold;
            border: none;
            background-color: #20632e;
            color: #ffff;
        }
        #button:hover{
            height: 2.5rem;
            width: 100%;
            border-radius: 0.6em;
            font-size: 14px;
            font-weight: bold;
            border: none;
            background-color: #20731f;
            color: #ffff;
        }
        .background{
            background-image: url("/images/background.jpg");
            background-repeat: no-repeat;
            background-size: cover;
            background-color: #ffd9d9;
        }
        .ad h1{
            font-family: Fredoka;
            color: #ffffff;
            font-weight:bolder;
            font-size: 70px;
        }
        .ad p{
            font-family: Inter;
            color: #ffffff;
            font-weight:lighter;
            font-size: 30px;
        }
    </style>

    <body>    
        <!-- Signup -->
        <header class="container-fluid text-center">
            <div class="row align-items-center maxh">
                <div class="col-5 signup d-flex align-items-center maxh">
                    <div class="container">
                        <form method="POST">
                            <div class="container" style="padding-left: 20%; padding-right: 20%;">
                                <div class="col title text-center">
                                    <img src="/images/GreenGrow.png" width="350rem">
                                </div>
                                <div class="col var_text text-start">
                                    Email
                                </div>
                                <div class="col var">
                                    <input class="var_i" value="<?php echo $email ?>" name="email" type="text">
                                </div>
                                <div class="col var_text text-start">
                                    Password
                                </div>
                                <div class="col var">
                                    <input class="var_i" name="password" type="password">
                                </div>
                                <div class="col var_text">
                                    <input type="submit" id="button" value="LOGIN">
                                </div>
                                <div class="col text-start" id="login">
                                    Don't have an account?
                                    <a href="signup.php">Sign up</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-7 d-flex align-items-end maxh background">
                    <div class="col desc text-end">
                            <h1>WELCOME BACK</h1>
                            <p>The fun begin with you and our community.</p>
                    </div>
                </div>
            </div>
        </header>
    </body>
</htm>