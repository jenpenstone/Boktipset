<?php
/**
* Funtions
**/




/**
 * Start a named session.
 *
 * @return void
 */
function startSession()
{
    // Start the named session,
    // the name is based on the path to this file.
    $name = preg_replace("/[^a-z\d]/i", "", __DIR__);
    session_name($name);
    session_start();
}


/**
 * Destroy a session, the session must be started.
 *
 * @return void
 */
function destroySession()
{
    // Unset all of the session variables.
    $_SESSION = [];

    // If it's desired to kill the session, also delete the session cookie.
    // Note: This will destroy the session, and not just the session data!
    if (ini_get("session.use_cookies")) {
        $params = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 42000,
            $params["path"],
            $params["domain"],
            $params["secure"],
            $params["httponly"]
        );
    }

    // Finally, destroy the session.
    session_destroy();
}

/* ---- Database functions ----- */

/**
* Creating a connection to a database. Returns $db with the link to the database.
* @return PDO $db
*/
function connectToDatabase($dsn)
{
    $db = null;
    // Open the database file with $dns and catch the exception if it fails.
    try {
        $db = new PDO($dsn);
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch (PDOException $e) {
        echo "Failed to connect to the database using DSN:<br>$dsn<br>";
        throw $e;
    }
    return $db;
}



/**
*Get all content from a table in the database as an array.
*/
function getWholeTable($db, $table)
{
    // Prepare and execute the SQL statement
    $stmt = $db->prepare("SELECT * FROM $table;");
    $stmt->execute();

    // Get the results as an array with column names as array keys
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $res;
}



/**
*Get all content from a table in the database as an array.
*/
function getAuthorTable($db, $table, $author)
{
    // Prepare and execute the SQL statement
    $sql = "SELECT * FROM $table WHERE author LIKE ?";
    $stmt = $db->prepare($sql);

    $param = "%{$author}%";
    $params = [$param];
    $stmt->execute($params);

    // Get the results as an array with column names as array keys
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $res;
}

/**
*Get all content from a table in the database as an array.
*/
function getGenreTable($db, $table, $genre)
{
    // Prepare and execute the SQL statement
    $sql = "SELECT * FROM $table WHERE genre LIKE ?;";
    $stmt = $db->prepare($sql);
    $params = [$genre];
    $stmt->execute($params);

    // Get the results as an array with column names as array keys
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $res;
}


/**
*Get all content from a table in the database as an array.
*/
function getLevelTable($db, $table, $level)
{
    // Prepare and execute the SQL statement
    $sql = "SELECT * FROM $table WHERE level LIKE ?;";
    $stmt = $db->prepare($sql);
    $params = [$level];
    $stmt->execute($params);

    // Get the results as an array with column names as array keys
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $res;
}

/**
*Get all content from a table in the database as an array.
*/
function getYearTable($db, $table, $year)
{
    // Prepare and execute the SQL statement
    $sql = "SELECT * FROM $table WHERE year = ?;";
    $stmt = $db->prepare($sql);
    $params = [$year];
    $stmt->execute($params);

    // Get the results as an array with column names as array keys
    $res = $stmt->fetchAll(PDO::FETCH_ASSOC);

    return $res;
}

/**
*Get all content from a table in the database as an array.
*/
function getBooks($res)
{
    $htmlString = "<div class='books'>";
    $htmlString .= "<div class='bookrow'>";
    $count = 1;

    foreach ($res as $book) {
        $title = $book["title"];
        $author = $book["author"];
        $year = $book["year"];
        $level = $book["level"];
        $genre = $book["genre"];
        $image = $book["image"];
        $sound = $book["sound"];

        $htmlString .= "<div class='book'>";
        $htmlString .= "<h3>$title</h3>";
        $htmlString .= "<img src='$image' alt='Omslagsbild' class='bookcover'>";
        $htmlString .= "<p>Författare: $author</p>";
        $htmlString .= "<p>År: $year</p>";
        $htmlString .= "<p>Nivå: $level</p>";
        $htmlString .= "<p>Genre: $genre</p>";
        if ($sound != "") {
            $htmlString .= "<a target='_blank' href='$sound'>";
            $htmlString .= "<img src='./img/volume_up-24px.svg' alt='Lyssna'>";
            $htmlString .= "</a>";

        }
        $htmlString .= "</div> <!--End book-->";

        if ($count == 3) {
            $htmlString .= "</div> <!--End bookrow-->";
            $htmlString .= "<div class='bookrow'>";
            $count = 0;
        }
        $count += 1;

    }

    $htmlString .= "</div>";

    return $htmlString;
}
