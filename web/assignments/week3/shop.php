<?php

function browse()
{
  $products = array(0 => "anvil", 1 => "mallet", 2 => "piano", 3 => "rope", 4 => "trap");
  $browse = '<div id="products">';
  $browse .= "<h1>Products:</h1>";
  for($i=0; $i<5; $i++){
    $browse .= '<img src="../../media/products/' . $products[$i] . '.jpg" alt="' . $products[$i] . '" width="100px"';
    var_dump($products[$i]);
  }
  $browse .= '</div>';
  return $browse;
}

include 'shopping.php';