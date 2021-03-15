<?php
// Pagecontoller

$title = "Nivå";
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
$level = isset($_GET['search-field']) ? strip_tags($_GET['search-field']) : null;

?>

<!-- Content on page -->
<main>
    <article>
        <h1><?=$title?></h1>

        <!-- Form -->
        <form id=search_form method="get">
            <fieldset>
                <select id="search-field" name="search-field">
                    <option value="" selected></option>
                    <option value="Lättläst">Lättläst</option>
                    <option value="6-9 år">6-9 år</option>
                    <option value="9-12 år">9-12 år</option>
                    <option value="12-15 år">12-15 år</option>
                </select>

                <input type=submit name="send" value=Sök>
            </fieldset>
        </form>

        <?php

        if ($db != null) {
            //Get table data from db.
            $res = getLevelTable($db, $table, $level);
        }

        $pagecontent = getBooks($res);
        echo $pagecontent;
        ?>
    </article>
</main>
<?php include(__DIR__ . "/view/footer.php");
