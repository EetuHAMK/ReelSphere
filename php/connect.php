<?php

  mysqli_report(MYSQLI_REPORT_ERROR | MYSQLI_REPORT_STRICT);

  $init = parse_ini_file(".ht.asetukset.ini");

  try {
    $yhteys = mysqli_connect(
      $init["palvelin"],
      $init["tunnus"],
      $init["pass"],
      $init["tk"]
    );
    } catch (Exception $e) {
      header("Location: ../404.html");
      exit;
  }
  
?>
