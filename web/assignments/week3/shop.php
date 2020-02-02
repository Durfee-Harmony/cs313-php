<?php
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}
$shop;
$check = NULL;
$cart = array();
$x = 0;

function browse() {
  $products = array(0 => "anvil", 1 => "mallet", 2 => "piano", 3 => "rope", 4 => "trap");
  $browse = '<h1>Products:</h1>';
  $browse .= '<div id="products">';
  for($i=0; $i<5; $i++){
    $browse .= '<img src="../../media/products/' . $products[$i] . '.jpg" alt="' . $products[$i] . '" width="100px">';
    $browse .= '<a class="button" href="shop.php?action=add&item=' . $products[$i] . '">Add ' . $products[$i] . ' to Cart</a>';
  }
  $browse .= '</div>';
  return $browse;
  echo 'browse';
}

function add($product) {
  global $cart, $x;
  var_dump($x);
  $cart[$x] = $product;
  $x++;
  echo 'add function';
  var_dump($x);
}

function remove($product) {
  global $cart, $x;
  $cart[$x] = $product;
  $x++;
  echo 'remove function';
}

function cart() {
  global $cart;
  $c = '<div id="cart"><h1>Cart:</h1>';
  for ($i=0; $i<count($cart); $i++){
    $c .= '<img src="../../media/products/' . '.jpg" alt="' . '" width="100px">';
    $c .= '<a class="button" href="shop.php?action=add&item=' . '">Add ' . ' to Cart</a>';
    echo 'cart for loop';
  }
  $c .= '</div>';

  echo 'cart function';
  var_dump($c);
  return $c;
}

if ($action == "add") {
  $item = filter_input(INPUT_GET, 'item', FILTER_SANITIZE_STRING);
  add($item);
  echo 'add ' . $item;
} else if ($action == "remove") {
  $item = filter_input(INPUT_GET, 'item', FILTER_SANITIZE_STRING);
  remove($item);
  echo 'remove ' . $item;
} else if ($action == "cart") {
  global $check;
  $check = 1;
  $shop = cart();
  include 'shopping.php';
}

if ($check == NULL) {
  $shop = browse();
  echo 'before include';
  include 'shopping.php';
  echo 'check';
}