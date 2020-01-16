<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>PHP Loops</title>
</head>

<body>
  <?php for ($i = 0; $i < 10; $i++) {
    $s .= '<div';
    if ($i % 2 == 0) {
      $s .= ' style="color:red"';
    }
    $s .= '>This is div #' . $i . '</div>';
  } ?>
  <?php echo $s; ?>
</body>

</html>