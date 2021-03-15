<?php
// Pagecontoller

$title = "Alla böcker";
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

if ($db != null) {
    //Get table data from db.
    $res = getWholeTable($db, $table);

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
