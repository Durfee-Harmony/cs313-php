<?php
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}
$action = NULL;
$shop;
$check = NULL;
$cart = '<div id="cart"><h1>Cart:</h1>';

function browse() {
  $products = array(0 => "anvil", 1 => "mallet", 2 => "piano", 3 => "rope", 4 => "trap");
  $browse = '<div id="products">';
  $browse .= "<h1>Products:</h1>";
  for($i=0; $i<5; $i++){
    $browse .= '<img src="../../media/products/' . $products[$i] . '.jpg" alt="' . $products[$i] . '" width="100px">';
    $browse .= '<a href="shop.php?action=add&item=' . $products[$i] . '">Add ' . $products[$i] . ' to Cart</a>';
  }
  $browse .= '</div>';
  return $browse;
  echo 'browse';
}

function add($product) {
  global $cart;
  $cart .= '<img src="../../media/products/' . $product . '.jpg" alt="' . $product . '" width="100px">';
  $cart .= '<a href="shop.php?action=remove&item=' . $product . '">Remove ' . $product . ' from Cart</a>';
  echo 'add function: ';
  var_dump($cart);
}

function remove($product) {
  global $cart;
  $cart -= '<img src="../../media/products/' . $product . '.jpg" alt="' . $product . '" width="100px">';
  $cart -= '<a href="shop.php?action=remove&item=' . $product . '">Remove ' . $product . ' from Cart</a>';
  echo 'remove function: ';
  var_dump($cart);
}

if ($action == "add") {
  $item = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_STRING);
  add($item);
  echo 'add';
} else if ($action == "remove") {
  $item = filter_input(INPUT_POST, 'item', FILTER_SANITIZE_STRING);
  remove($item);
  echo 'remove';
}

$cart .= '</div>';
function cart() {
  global $cart, $check;
  $check = 1;
  $shop = $cart;
  echo 'cart';
  include 'shopping.php';
}

if ($check == NULL) {
  $shop = browse();
  echo 'before include';
  include 'shopping.php';
  echo 'check';
}