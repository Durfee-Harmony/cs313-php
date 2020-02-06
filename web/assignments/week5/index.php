<?php
    require "../dbConnect.php";
    $db = get_db();
    $scriptureData = NULL;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Scripture List</title>
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
        <h1 style="text-align:center">Scripture Resources</h1><br>
        <div class="row">
            <div class="col-lg-6">
                <h2>Database Scripture List</h2>
                <?php
                    $statement = $db->prepare("SELECT * FROM scripture");
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
                        $id = $row['id'];
                        // $content = $row['content'];
                        // echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
                        echo "<p><strong><a href='scriptureDetails.php?id=$id'>$book $chapter:$verse</a></strong><p>";
                    }
                ?>
            </div>
            <div class="col-lg-6">
                <h2>Search</h2>
                <form id="" method="post" action="" class="form-inline">
                    <input type="text" name="scriptureSearch" class="form-control mb-2 mr-sm-2" style="width:70%" id="inlineFormInputName2" placeholder="Search for a book of scripture">
                    <button type="submit" value="Search" name="search" class="btn btn-primary mb-2" style="width:25%">Search</button>
                </form>
                <?php 
                    if (isset($_POST['search'])) {
                        $searchString = $_POST['scriptureSearch'];
                        $scriptureData = $db->prepare("SELECT * FROM scripture WHERE book = '$searchString'");
                        $scriptureData->execute();
                        while ($row = $scriptureData->fetch(PDO::FETCH_ASSOC))
                        {
                            $book = $row['book'];
                            $chapter = $row['chapter'];
                            $verse = $row['verse'];
                            $content = $row['content'];
                            
                            echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
                        }
                    }
                ?>
            </div>
        </div>
    </div>
    
</body>
</html>
