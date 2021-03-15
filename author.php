<?php
// Pagecontoller

$title = "Författare";
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
$author = isset($_GET['search-field']) ? strip_tags($_GET['search-field']) : null;

?>

<!-- Content on page -->
<main>
    <article>
        <h1><?=$title?></h1>

        <!-- Form -->
        <form id=search_form method="get">
            <fieldset>
                <input type="text" name="search-field" id="search-field" value="<?=$author?>">

                <input type=submit name="send" value=Sök>
            </fieldset>
        </form>

        <?php
        if ($db != null) {
            //Get table data from db.
            $res = getAuthorTable($db, $table, $author);
        }

        $pagecontent = getBooks($res);
        echo $pagecontent;
        ?>
    </article>
</main>
<?php include(__DIR__ . "/view/footer.php");
