<?php
// Pagecontoller

$title = "Genre";
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
$genre = isset($_GET['search-field']) ? strip_tags($_GET['search-field']) : null;

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
                    <option value="deckare">Deckare</option>
                    <option value="sport">Sport</option>
                    <option value="rysare">Rysare</option>
                    <option value="djur">Djur</option>
                    <option value="kärlek">Kärlek</option>
                    <option value="humor">Humor</option>
                </select>

                <input type=submit name="send" value=Sök>
            </fieldset>
        </form>

        <?php
        if ($db != null) {
            //Get table data from db.
            $res = getGenreTable($db, $table, $genre);
        }

        $pagecontent = getBooks($res);
        echo $pagecontent;
        ?>
    </article>
</main>
<?php include(__DIR__ . "/view/footer.php");
