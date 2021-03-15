<?php
// Pagecontoller

$title = "Boktipset";
//No subpages to show
$page = null;

include(__DIR__ . "/src/functions.php");
include(__DIR__ . "/config.php");
include(__DIR__ . "/view/header.php");
include(__DIR__ . "/view/navbar.php");


?>

<!-- Content on page -->
<main>
    <article>
        <h1><?=$title?></h1>

        <div class="textdiv">
            <h3>Välkommen till Boktipset!</h3>
            <p>Här finner du tips på böcker att läsa. Du kan även lyssna på första kapitlet för många av böckerna.</p>
            <p>Tanken med boktipset är att hjälpa barn och unga att hitta böcker de tycker om att läsa och därigenom bidra till att de läser mer och så småningom bli riktiga bokslukare.</p>
            <p>Att läsa mycket är det bästa sättet för att få ett stort ordförråd, ett rikare språk, samt en god språkutveckling.</p>
        </div>

    </article>
</main>
<?php include(__DIR__ . "/view/footer.php");
