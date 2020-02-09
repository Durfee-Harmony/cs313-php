<?php
require_once "team/dbConnect.php";
$db = get_db();

$quotes = $db->prepare("SELECT quote.txt, author.name
                        FROM quote
                          JOIN author_quote ON author_quote.quote_id = quote.id
                          JOIN author ON author.id = author_quote.author_id");
$quotes->execute();

echo "<h1>Quotes:</h1>";

while ($row = $quotes->fetch(PDO::FETCH_ASSOC)) {
  $author = $row["a.name"];
  $quote = $row["q.txt"];
  echo "<h3>$author</h3>";
  echo "<p>\"$quote\"</p>";
}
