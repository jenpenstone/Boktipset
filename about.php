<?php
// Pagecontoller

$title = "Om Boktipset";
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
            <p>Boktipset är ett ideellt projekt som har gjorts möjligt tack vare ett samarbete med förlaget Raben & Sjögren.
                De var det enda förlaget som tillät publicering av bilder på samtliga sina barn- och ungdomsböcker tillsammans med uppläsning av första kapitlet och vi är oerhört tacksamma för den generositeten.
                Det möjliggör att denna sida kan användas framförallt i låg- och mellanstadieskolor för att hjälpa barn att hitta böcker att läsa.
            </p>
            <p>
                Dagens barn läser ofta för lite vilket hämmar deras språkutveckling och ordförråd.
                Många skolbibliotek är idag inte bemannade med utbildade bibliotekarier som kan hjälpa eleverna att finna en bok de tycker om.
                Många elever har svårt att hitta en bok att läsa endast genom att gå runt och titta bland bokhyllorna och det är där Boktipset kommer in i bilden.
            </p>
            <p>
                Här kan böckerna sorteras utifrån genre eller författare eller svårighetsnivå.
                Och det bästa av allt, många böcker går det att lyssna på början av berättelsen.
                Det gör att barnen kan få kliva in i bokens värld för en stund och förhoppningsvis bli hungrig efter mer, att låna och läsa boken för att få veta hur det går.
            </p>
            <p>
                I framtiden hoppas vi att fler förlag vill vara med och låta barn och unga bli inspirerade av deras böcker!
            </p>
        </div>

    </article>
</main>
<?php include(__DIR__ . "/view/footer.php");
