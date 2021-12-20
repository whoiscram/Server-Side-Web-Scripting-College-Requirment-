<?php
    require_once '../admin/connection.php';
    session_start();
    
    if (isset($_SESSION['user'])) {
        header("location: index_logged.php");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intayo MakiConcert</title>
    <link rel="stylesheet" type="text/css" href="../styles/style.css">

</head>

<body>
    <header style="background-image: url('../imgs/fred.jpg');">
        <div class="nav">
            <nav>
                <ul>
                    <li><a href="#cont">HOME</a></li>
                    <li><a href="#concert">CONCERTS</a></li>
                    <li><a href="#aboutUs">ABOUT US</a></li>
                    <li><a href="#contactus">CONTACT US</a></li>
                    <li><a href="/user/viewProfile.php">PROFILE</a></li>
                </ul>
            </nav>
        </div>
        <div class="Container">
            <div class="cont">
                <h1>Concerts <br>For A Cause</h1>
                <p><br>We are Team Maki, a nonprofit organization dedicated to help people through music-centered
                    community events to support and increase awareness to our social cause.</p>
            </div>
        </div>
    </header>

    <article id="concert">
        <h1 style="text-align: center;">CONCERTS</h1>
        <br>
        <div class="opm" style="background-image: url('../imgs/opm.jpg');">
            <div class="concert-box">
                <h1>OPM Artists</h1>
                <p>You can watch and engage with your favorite OPM artists like Parokya ni Edgar, Imago, Moonstar88, and
                    6Cyclemind!</p>
					<a href="join_event.php"><button class="join_b">Join</button></a>
            </div>
        </div>
        <div class="awit" style="background-image: url(../imgs/awit.jpg);">
            <div class="concert-box">
                <h1>Awit Para Sa Mga Bata</h1>
                <p>Be part of Save the Children Philippines’ ongoing “eSave Natin ang Pasko” Christmas fundraising
                    campaign that
                    also promotes the importance of a nurturing home through the “Mapagkalingang Tahanan” advocacy which
                    supports both children and their parents, guardians, and caregivers in facilitating a sound learning
                    environment.</p>
					<a href="join_event.php"><button class="join_b">Join</button></a>
            </div>
        </div>
        <div class="hiraya" style="background-image: url(../imgs/hiraya.jpg);">
            <div class="concert-box">
                <h1>Hiraya</h1>
                <p>Hiraya is a two-in-one event — both a celebration for our achievements for the first half of 2021, as
                    well as
                    a fundraiser to help bridge the pressing needs for basic necessities of the chosen beneficiary — the
                    families
                    of the children under the organization’s flagship project, Project Bata Mag-aral Ka (PBMK).</p>
					<a href="join_event.php"><button class="join_b">Join</button></a>
            </div>
        </div>
    </article>


    <section id="aboutUs" style="background-image: url(../imgs/about.jpg);
    background-repeat: no-repeat;
    background-size: 100%;
    height: 100vh;">
        <div class="Container" style="padding: 25px;">
            <div class="cont" style="position: relative;
    color: #f3ca20;
    font-size: 50px;">
                <h1>About <br>Us</h1>
                <p> this is about Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo natus doloremque
                    doloribus, autem iste incidunt harum corporis nobis tenetur quia vel saepe alias repellat ducimus
                    praesentium, esse, beatae vitae repudiandae.</p>
            </div>
        </div>
    </section>

    <section id="contactus" style="background-image: url(../imgs/contact.jpg);
    background-repeat: no-repeat;
    background-size: 100%;
    height: 100vh;">
        <div class="Container" style="padding: 25px;">
            <div class="cont" style="position: relative;
    color: #f3ca20;
    font-size: 50px;">
                <h1>CONTACT <br>Us</h1>
                <p> this is about Lorem ipsum dolor sit amet consectetur adipisicing elit. Quo natus doloremque
                    doloribus, autem iste incidunt harum corporis nobis tenetur quia vel saepe alias repellat ducimus
                    praesentium, esse, beatae vitae repudiandae.</p>
            </div>
        </div>
    </section>

    <footer>
        <div class="footer" style="text-align: center;">
            <h1>© 2021 by Team Maki</h1>
        </div>
    
    </footer>
   
</body>

</html>