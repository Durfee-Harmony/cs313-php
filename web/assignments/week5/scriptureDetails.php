<?php
    require "../dbConnect.php";
    $db = get_db();

?>
<!DOCTYPE html>
<html>
<head>
    <title>Scripture Details</title>
    <meta charset="utf-8">
    <meta name="author" content="Nathan Birch">
    <link rel="shortcut icon" href="../../shared/favicon.ico" type="image/x-icon">
    <link rel="icon" href="../../shared/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../birch-week5.css">
</head>

<?php include '../../shared/header.php'; ?><br><br>
<body>
    <div class="container">
        <h1>Scripture Details</h1>
         <?php
            $id = $_GET['id'];
            $statement = $db->prepare("SELECT * FROM scripture WHERE id = $id");
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
