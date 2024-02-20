<?php

  include("connect.php");

  // Check if the session is not already started
  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  // USER CHECK!
  if (!isset($_SESSION["UserID"])) {
    header("Location: ../pages/login.html");
    exit;
  }

  $ReelID = isset($_GET['ReelID']) ? intval($_GET['ReelID']) : 0;
  $deleted=isset($_GET["deleted"]) ? $_GET["deleted"] : "";

  if (!empty($deleted)){
    $sql="delete from Reviews where ReviewID=?";
    $stmt=mysqli_prepare($yhteys, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $deleted);
    mysqli_stmt_execute($stmt);
  }
  mysqli_close($yhteys);

  if (isset($_SESSION['Usertype']) && $_SESSION['Usertype'] == 'Admin') {
    // Redirect admin to a different page, if needed
    header("Location: ../php/reviews.php");
    exit;

  } else {
    // Redirect regular user to reel.php with ReelID parameter
    header("Location: ../php/user-home.php");
    exit;
  }

?>