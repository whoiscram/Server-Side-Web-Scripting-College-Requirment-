<?php
require_once '../admin/connection.php';
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    // redirect to home.php
} else {
    // redirect to login page
    header("location: login.php");
}

try {
    require '../admin/config.php';

    $sql = "SELECT * from events WHERE status = 'Upcoming' OR status = 'Ongoing'";
    $stmt = $db->query($sql);
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Intayo MakiConcert</title>
    <link rel="stylesheet" type="text/css" href="../styles/home.css">

    <style>
        @font-face {
            font-family: "font_h1";
            src: url(/fonts/Bellota\ Text.ttf);
        }

        @font-face {
            font-family: "font_p";
            src: url(/fonts/Baloo\ Bhaijaan\ 2.ttf);
        }


    </style>
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
                    <li><a href="view_profile.php">PROFILE</a></li>
                </ul>
            </nav>
        </div>
        <div class="Container">
            <div class="cont">
                <h1>Concerts <br>For A Cause</h1>
                <p><br>We are Maki, a nonprofit organization dedicated to help people through music-centered
                    community events to support and increase awareness to our social cause.</p>
            </div>
        </div>
    </header>

    <article id="concert">
        <h1 style="text-align: center;">CONCERTS</h1>
        <br>
        <div>
            <table>
                <thead>
                    <tr>
                        <th><strong>Event Title</strong></th>
                        <th><strong>Event Performer(s)</strong></th>
                        <th><strong>Event Venue</strong></th>
                        <th><strong>Event Description</strong></th>
                        <th><strong>Event Date Start</strong></th>
                        <th><strong>Event Date End</strong></th>
                        <th><strong>Event Ticket Price</strong></th>
                        <th><strong>Event Status</strong></th>
                        <th><strong>Actions</strong></th>
                    </tr>
                </thead>

                <tbody>
                    <?php while ($row = $stmt->fetch()) : ?>
                        <tr>
                            <td width="20%"><?php echo htmlspecialchars($row['title']); ?></td>
                            <td width="20%"><?php echo htmlspecialchars($row['performer']); ?></td>
                            <td width="10%"><?php echo htmlspecialchars($row['venue']); ?></td>
                            <td width="20%"><?php echo htmlspecialchars($row['description']); ?></td>
                            <td width="10%"><?php echo htmlspecialchars($row['date_start']); ?></td>
                            <td width="10%"><?php echo htmlspecialchars($row['date_end']); ?></td>
                            <td width="5%"><?php echo htmlspecialchars($row['ticket_price']); ?></td>
                            <td width="20%"><?php echo htmlspecialchars($row['status']); ?></td>
                            <td>
                                <div class="button_actions">
                                    <div style="display: inline-block;">
                                        <form action="join_event.php" method="request">
                                            <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
                                            <input type="submit" name="join" value="Join">
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endwhile; ?>
                </tbody>
            </table>
        </div>

        <!--
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
        -->
    </article>

    <section id="aboutUs" style="background-image: url(../imgs/about.jpg);
    background-repeat: no-repeat;
    background-size: 100%;
    height: 100vh;">
        <div class="Container" style="padding: 25px;">
            <div class="cont" style="position: relative;
    color: #f3ca20;
    font-size: 50px;
    text-align: center;">
                <h1>ABOUT US</h1>
                <p> Maki-Concert is a nonprofit organization that is dedicated to increasing awareness of various causes through
                    music-centered community events such as concerts. It began in 2019 with just a simple project here in Baguio
                    in support of local music artists' causes and funding. After two years of hard work and dedication, the project
                    became an established nonprofit organization that focuses on concerts for a cause here in the Philippines. </p>
                <br>
                <p> Each year we host a variety of events to further our mission and allow us to support our community partners.
                    Thanks to our small business sponsors, we host monthly fundraising events at local restaurants and shops.
                    In addition to that, we have community and university organization partners that graciously host events on our
                    behalf throughout the year. </p>
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
    font-size: 20px;">
                <h1>CONTACT US</h1>
                <p> Thank you for your interest in Concert for a Cause! If you are curious about volunteering with us,
                    becoming our sponsor, or inquiries you have in mind, just feel free to reach out through email or
                    check our social media accounts linked below.
                </p>
                <br>

                <ul>
                    <li>Email:</li>
                    <li><a href="#h">makiconcert@gmail.com</a></li>
                    <br>
                    <li>Social Media Accounts:</li>
                    <li><a href="#h">facebook.com/makiconcert</a></li>
                    <li><a href="#h">twitter.com/makiconcert</a></li>
                    <li><a href="#h">instagram.com/makiconcert</a></li>
                </ul>

                <br>
                <p>You can also text or call us via Globe/Smart:</p>
                <br>
                <p>Globe: 09274411986<br></p>
                <p>Smart: 09616935772</p>
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