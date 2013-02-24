<?php

  switch($_GET['type']) {

    case "database":
      $errorMessage = "A database error occurred, please try again!";
      return;

    default:
      $errorMessage = "An undefined error occurred, please try again";

  }

?>
