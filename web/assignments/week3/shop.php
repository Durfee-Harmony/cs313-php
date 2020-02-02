<?php
$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}
$shop;
$check = NULL;
$cart = array();
$x;

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

function add($item) {
  global $cart, $x;
  echo 'x before: ';
  var_dump($x);
  $x = count($cart);
  echo ' x count: ';
  var_dump($x);
  $x++;
  echo ' x added ';
  var_dump($x);
  if($x == NULL){
    $cart[0] = $item;
    echo ' null ';
  } else {
    $cart[$x] = $item;
    echo ' zero ';
  }
  echo ' add function ';
  echo ' x after: ';
  var_dump($x);
  var_dump($cart);
}

function remove($item) {
  global $cart, $x;
  $cart[$x] = $item;
  $x++;
  echo 'remove function';
}

function cart() {
  global $cart;
  $c = '<div id="cart"><h1>Cart:</h1>';
  for ($i=0; $i<count($cart); $i++){
    $c .= '<img src="../../media/products/' . $cart[$i] . '.jpg" alt="' . $cart[$i] . '" width="100px">';
    $c .= '<a class="button" href="shop.php?action=add&item=' . $cart[$i] . '">Add ' . $cart[$i] . ' to Cart</a>';
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
  include 'shopping.php';
}