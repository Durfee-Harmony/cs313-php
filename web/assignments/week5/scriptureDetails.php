<?php
    require "team/dbConnect.php";
    $db = get_db();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Scripture Details</title>
    <meta charset="utf-8">
    <meta name="author" content="Nathan Birch">
</head>

<body>
    <div class="container">
        <h1>Scripture Details</h1>
         <?php
            $id = $_GET['id'];
            $statement = $db->prepare("SELECT * FROM w5_scriptures WHERE id = $id");
            $statement->execute();
            // Go through each result
            while ($row = $statement->fetch(PDO::FETCH_ASSOC))
            {
               // The variable "row" now holds the complete record for that
               // row, and we can access the different values based on their
               // name
               $book = $row['book'];
               $chapter = $row['chapter'];
               $verse = $row['verse'];
               $content = $row['content'];
               echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
            }
         ?>
    </div>
</body>
</html>
