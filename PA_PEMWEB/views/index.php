<?php
    require "../actions/db_connect.php";

    $result = mysqli_query($conn, "SELECT * FROM film");
    $film = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $film[] = $row;
    }
?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" href="../assets/logoweb.png">
  <title>Cinematic Universe</title>
  <link rel="stylesheet" media="screen and (min-width: 320px)" href="../styles/mobilep2.css">
</head>

<body onload ="startTime()">
  <nav>
    <div class="top-nav">
      <div class="logo">
        <img src="../assets/logoweb.png" alt="#">
      </div>
      <button id="burgerbar">
        <svg id="show" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="M120-240v-80h720v80H120Zm0-200v-80h720v80H120Zm0-200v-80h720v80H120Z"/></svg>
        <svg id="close" xmlns="http://www.w3.org/2000/svg" viewBox="0 -960 960 960"><path d="m256-200-56-56 224-224-224-224 56-56 224 224 224-224 56 56-224 224 224 224-56 56-224-224-224 224Z"/></svg>
      </button>
      <div class="nav-items" id="nav-items">
      <h2>Real Time:</h2>
      <div id="Time"></div>
        <a class="smooth-scroll" href="index.php">Home</a>
        <a class="smooth-scroll" href="#about-me">About</a>
        <a onclick="alert('Theres Nothing To See Here Yet!')">Now Playing</a>
        <a onclick="alert('Coming Soon!')">Upcoming</a>
        <a class="smooth-scroll" href = "../views/login.php" >Show More</a>
        <img src="../assets/sun.png" id="icon">
      </div>
  </nav>
  <section class="hero" id="hero">
    <img src="../assets/herobgasli.png" alt="#">
    <div class="hero-title">
      <h1>Your Favorite Cinema</h1>
      <p>Cinematic Universe</p>
    </div>
  </section>

  <div class="content-wrapper" id="content-wrapper">
    <div class="content-title">
      <h1>Most Waited Movies COMING SOON!</h1>
      <p> --Tap the content to watch the trailer!--</p>
    </div>
    <div class="film-content">
    <?php foreach ($film as $fm) : ?>
    <div class="content" onclick="playVideo('<?php echo $fm['trailer']; ?>')">
      <div class="content-img">
        <img src="../img/<?php echo $fm['gambar']; ?>" alt="#" />
      </div>
        <h2 class="film-title"><?php echo $fm['judul_film']; ?></h2>
        <h3><?php echo $fm['tgl_rilis']; ?></h3>
      </div>
    <?php endforeach; ?>


  <section class="about-me" id="about-me">
    <div class="about-me-box">
      <h2>About Us</h2>
      <p>Greetings! This is Cinematic Universe!</p>
      <p>Welcome to Cinematic Universe where cinema comes to life!</p>
      <p>At Cinematic Universe, we're passionate about movies. Our mission is simple that is to celebrate cinema and create a
      community for film lovers.</p>

      <div class="contact-info">
      <h2>Find us on:</h2>
      <p id="cp"> follow <a href="https://www.instagram.com/aryukaapn/"  target="_blank" id="sosmed"><i
                  class="fa-brands fa-instagram"></i>
              aryukaapn</a> on instagram! </p>
      </div>
    </div>
  </section>  
      <footer>
        <p>©Cinematic Universe</p>
      </footer>
      <script src="../scripts/script.js"></script>
      <script>
        document.getElementById('burgerbar').addEventListener('click', showMenu);

function showMenu() {
    var navItems = document.getElementById('nav-items');
    var smBtn = document.getElementById('sm-btn');
    var open = document.getElementById('show');
    var close = document.getElementById('close');

    if (navItems.style.display === "flex") {
        navItems.style.display = "none";
        smBtn.style.display = "none";
        open.style.display = "block";
        close.style.display = "none";
    } else {
        navItems.style.display = "flex";
        smBtn.style.display = "block";
        open.style.display = "none";
        close.style.display = "block";
    }
}
      </script>
</body>

</html>