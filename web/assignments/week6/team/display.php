<?php
require("dbConnect.php");
$db = get_db();
?>

<body>
   <div class="container">
      <?php
      $statement = $db->prepare('SELECT * FROM w6_scriptures');
      $statement->execute();
      while ($row = $statement->fetch(PDO::FETCH_ASSOC)) {
         $scripture_id = $row['id'];
         $book = $row['book'];
         $verse = $row['verse'];
         $chapter = $row['chapter'];
         $content = $row['content'];

         $state = $db->prepare("SELECT * FROM w6_topic");
         $state->execute();
         while ($fRow = $state->fetch(PDO::FETCH_ASSOC)) {
            $name = $fRow['name'];
         }
         $checkbox = $_POST['chk'];
         if ($_POST["submit"] == "submit") {
            for ($i = 0; $i < sizeof($checkbox); $i++) {
               $query = $db->prepare('INSERT INTO w6_topic_scripture (topic_id, scripture_id) VALUES (:topic, :scripture)');
               $query->bindValue(':topic', $checkbox[$i]);
               $query->bindValue(':scripture', $scripture_id);
               $query->execute();
            }
         }
      }
      ?>

   </div>
</body>

</html>