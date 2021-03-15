<?php
// Pagecontoller

$title = "Årtal";
//No subpages to show
$page = null;

include(__DIR__ . "/src/functions.php");
include(__DIR__ . "/config.php");
include(__DIR__ . "/view/header.php");
include(__DIR__ . "/view/navbar.php");

//Connect to database.
$db = connectToDatabase($dsn);

//Set which table to search in.
$table = 'book';

//Save input from search field in a variable if there is any.
$year = isset($_GET['search-field']) ? strip_tags($_GET['search-field']) : 2021;

?>

<!-- Form for searching in travel db table country -->
<form id=search_form method="get">
    <fieldset>
        <input type="number" name="search-field" id="search-field" value="<?=$year?>" min="1900" max="2025">

        <input type=submit name="send" value=Sök>
    </fieldset>
</form>

<?php

if ($db != null) {
    //Get table data from db.
    $res = getYearTable($db, $table, $year);
}
?>

<!-- Content on page -->
<main>
    <article>
        <h1><?=$title?></h1>

        <?php
        $pagecontent = getBooks($res);
        echo $pagecontent;
        ?>
    </article>
</main>
<?php include(__DIR__ . "/view/footer.php");
