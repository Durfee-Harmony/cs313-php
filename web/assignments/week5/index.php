<?php
    require "team/dbConnect.php";
    $db = get_db();
    $scriptureData = NULL;
?>
<!DOCTYPE html>
<html>
<head>
    <title>Scripture List</title>
    <meta charset="utf-8">
    <meta name="author" content="Nathan Birch">
</head>

<body>
    <div class="container">
        <h1 style="text-align:center">Scripture Resources</h1><br>
        <div class="row">
            <div class="col-lg-6">
                <h2>Database Scripture List</h2>
                <?php
                    $statement = $db->prepare("SELECT * FROM w5_scriptures");
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
                        $scriptureData = $db->prepare("SELECT * FROM w5_scriptures WHERE book = '$searchString'");
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
