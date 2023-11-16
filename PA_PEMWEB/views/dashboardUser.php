<?php
session_start();
    require "../actions/db_connect.php";
    if (!isset($_SESSION['user_submit'])) {
      header('Location: login.php');
      exit;
  }
  if (isset($_SESSION['login'])) {
    header('Location: login.php');
    exit;
}

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
  <title>My Watchlist</title>
  <link rel="stylesheet" media="screen and (min-width: 320px)" href="../styles/mobilep2.css">
</head>

<body onload="startTime()">
  <nav>
    <div class="top-nav">
      <div class="logo">
        <img src="../assets/logoweb.png" alt="#">
      </div>
      <div class="nav-items" id="nav-items">
        <h2>Real Time:</h2>
        <div id="Time"></div>
        <a href="../views/index.php">Home</a>
        <a href="#">Now Playing</a>
        <a onclick="alert('Coming Soon!')">Upcoming</a>
        <a href="../views/logout.php">Log Out</a>
        <a href="../views/watchlist.php">Watchlist</a>
        <img src="../assets/sun.png" id="icon">
      </div>
  </nav>
  <section class="hero" id="hero">
    <img src="../assets/bgheroo.png" alt="#">
    <div class="hero-title">
      <h1>Your Favorite Cinema</h1>
      <p>YOEKA'S CINEMA</p>
    </div>
  </section>

  <div class="content-wrapper" id="content-wrapper">
    <div class="content-title">
      <h1>Most Waited Movies COMING SOON!</h1>
      <p>--Tap the content to watch the trailer!--</p>
    </div>
    <div class="film-content">
    <?php foreach ($film as $fm) : ?>
    <div class="content" onclick="playVideo('<?php echo $fm['trailer']; ?>')">
      <div class="content-img">
        <img src="../img/<?php echo $fm['gambar']; ?>" alt="#" />
      </div>
        <h2 class="film-title"><?php echo $fm['judul_film']; ?></h2>
        <h3><?php echo $fm['tgl_rilis']; ?></h3>
        <form action="../views/watchlist.php" method="post">
        <input type="hidden" name="user_id" value="<?= $_SESSION['user_id'] ?>">
        <input type="hidden" name="film_id" value="<?= $fm['film_id'] ?>">
        <button type="submit">Add to Watchlist</button>
        </form>
      </div>
    <?php endforeach; ?>
  </div>

  <footer>
    <p>©yoeka's cinema</p>
  </footer>
  <script src="../scripts/watchlist.js"></script>
  </body>

</html>