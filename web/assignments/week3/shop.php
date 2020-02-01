<?php

function browse()
{
  $products = array("anvil", "mallet", "piano", "rope", "trap");
  $browse = '<div id="products">';
  for($i=0; $i<5; $i++){
    $browse .= '<img src="../../media/products/' . $products[$i] . '.jpg" alt="' . $products[$i] . '" width="100px"';
  }
  $browse .= "<h1>Products:</h1>";
  $browse .= '</div>';
  return $browse;
}

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
};

include 'shopping.php';