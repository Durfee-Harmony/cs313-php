<?php
require_once "team/dbConnect.php";
$db = get_db();

$quotes = $db->prepare("SELECT q.txt, a.name
                        FROM quote q
                          JOIN author_quote aq ON aq.quote_id = q.id
                          JOIN author a ON a.id = aq.author_id");
$quotes->execute();

echo "<h1>Quotes:</h1>";

while ($row = $quotes->fetch(PDO::FETCH_ASSOC)) {
  $author = $row["a.name"];
  $quote = $row["q.txt"];
  echo "<h3>$author</h3>";
  echo "<p>\"$quote\"</p>";
}
