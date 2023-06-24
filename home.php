<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style3.css">
    <link rel="stylesheet" href="css/all.min.css">
    <title>HOME PAGE</title>
</head>
<body>
    <!-- start header -->
    <div class="header">
        <div class="container">
            <img src="images/logo.png" alt="logo" class="logo">
            <div class="links">
                <span class="icon">
                    <span></span>
                    <span></span>
                    <span></span>
                </span>
                <ul >
                    <li><a href="#Services">Services</a></li>
                    <li><a href="#Portfolio">Portofolio</a></li>
                    <li><a href="#Rooms">Rooms</a></li>
                    <li><a href="#Book">Reserve</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!-- end header -->
    <!-- start landing -->
    <div class="landing" >
        <div class="introText">
            <h1>HEllo There!</h1>
            <p>Welcome To Luna Hotel & Best Service - Best Hotel</p>
        </div>
    </div>
    <!-- end landing -->
    <!-- start figures -->
    <div class="figures" id="Services">
        <div class="container">
            <div class="feat">
                <i class="fa-solid fa-person"></i>
                <h3>Our Stuff is the Best</h3>
                <p>we have stuff with high quality of politness and know many languages overall the world so if you were from any country we can comunicate very very easy and it is not complecated problem becase they are very clever in languages </p>
            </div>
            <div class="feat">
                <i class="fa-solid fa-bed"></i>
                <h3>Your Service is High Quality</h3>
                <p>we have very high quality service such as your room will be clean all time of the day and you will enjoy our beach as time as you like it is free and not only beach but also gardens and natural trees and grass then enjoy playing football and many sports</p>
            </div>
            <div class="feat">
                <i class="fa-solid fa-earth-americas"></i>
                <h3>Our Product is Worldwide</h3>
                <p>You can find our services all over the world because we have hotel branches all over the world in more than hundred country allover the world and we are inmportant in each country not only serve but also gives you high quality of services</p>
            </div>
        </div>
    </div>
    <!-- end figures -->
    <!-- start portfolio -->
    <div class="portfolio" id="Portfolio">
        <div class="title">
            <h1>Portfolio</h1>
            <p>If you do it right, it will last forever</p>
        </div>
        <div class="container">
            <div class="project">
                <img src="images/310242395.jpg" alt="">
                <h4>Reseptionists</h4>
                <p>after you enter the hotel go to reseption to check your resevation and make someone take your bags to your room</p>
            </div>
            <div class="project">
                <img src="images/hotel-bed-room-21064950.jpg" alt="">
                <h4>Room</h4>
                <p>when you reach your room you will enter and sleep well with comefortable bed and room after taking shower in beutiful toilet</p>
            </div>
            <div class="project">
                <img src="images/WhatsApp Image 2022-12-22 at 10.04.00 AM.jpeg" alt="">
                <h4>Fun Places</h4>
                <p>You will not feel bored because if you were bored you can go to any fun place from fun places in our hotel that we made fo you</p>
            </div>
        </div>
    </div>
    <!-- end portfolio -->
    <!-- start rooms -->
    <div class="portfolio" id="Rooms">
        <div class="title">
            <h1>SomeRooms</h1>
            <p>If you do it right, it will last forever</p>
        </div>
        <div class="container">
            <div class="project">
                <img src="images/room1.jpg" alt="">
                <h4>Room1 for you</h4>
                <p>This room for you if you like seilence and heat light</p>
            </div>
            <div class="project">
                <img src="images/room2.jpg" alt="">
                <h4>Room2 for you</h4>
                <p>This room for you if you like mix seilence and fun and mix between heat light and whight</p>
            </div>
            <div class="project">
                <img src="images/room3.jpg" alt="">
                <h4>Room3 for you</h4>
                <p>This room for you if you like sea and sun light and beach view</p>
            </div>
        </div>
    </div>
    <!-- end rooms  -->
    <!-- start contact -->
    <div class="contact" id="Book">
        <div class="title">
            <h1>Reserve</h1>
            <p>We are born to create</p>
        </div>
        <div class="container">
            <h1>Feel free to drop us aline at:</h1>
            <form action="reserve.php" method="post">
                <input type="submit" value="Reserve">
                <br><br><br>
                <h2>rooms reserved : </h2>
                <?php
                    $mail=$_SESSION['mail'];
                    include 'config.php';
                    $stmt= $conn->prepare(" select * from  room");
                    $stmt->execute();
                    $res=$stmt->get_result();
                    while($row=$res->fetch_assoc())
                    {
                        if($row['email']==$mail)
                        {
                            echo "<br>"."Room Number => ".$row['number']."<br>";
                        }
                    }
                ?>
            </form>
            <br><br><br>
            <form action="update.php" method="post">
                <input type="submit" value="Change Password">
            </form>
            <br><br>
            <form action="cancel.php" method="post">
                <input type="submit" value="Cancel reservation">
            </form>
            <br><br>
            <p>Find us on social networks:</p>
            <span class="social">
                <i class="fa-brands fa-facebook"></i>
                <i class="fa-brands fa-google-plus-g"></i>
                <i class="fa-brands fa-twitter"></i>
            </span>
        </div>
    </div>
    <!-- end contact -->
    <!-- start footer -->
    <div class="footer">&copy; 2022 <span>Luna</span> All Right Reserved</div>
    <!-- end footer  -->
</body>
</html>