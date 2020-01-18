<?php

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
  $action = filter_input(INPUT_GET, 'action');
}
if($action == 'myA') {
  include 'view/assignments.php';
} else {
  include 'view/home.php';
}

?>