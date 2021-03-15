<?php

$uri = $_SERVER["REQUEST_URI"];
$uriFile = basename($uri);
$user = $_SESSION["user"] ?? null;
?>

<nav class="navbar">
    <a class="button_pink <?= $uriFile == "index.php" ? "selected" : ""; ?>" href="index.php">Hem</a>
    <a class="button_green <?= $uriFile == "allbooks.php" ? "selected" : ""; ?>" href="allbooks.php">Alla böcker</a>
    <a class="button_darkblue <?= $uriFile == "author.php" ? "selected" : ""; ?>" href="author.php">Författare</a>
    <a class="button_orange <?= $uriFile == "genre.php" ? "selected" : ""; ?>" href="genre.php">Genre</a>
    <a class="button_lightblue <?= $uriFile == "level.php" ? "selected" : ""; ?>" href="level.php">Nivå</a>
    <a class="button_yellow <?= $uriFile == "year.php" ? "selected" : ""; ?>" href="year.php">Årtal</a>
    <a class="button_purple <?= $uriFile == "about.php" ? "selected" : ""; ?>" href="about.php">Om boktipset</a>
</nav>
