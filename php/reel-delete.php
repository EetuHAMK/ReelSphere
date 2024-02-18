<?php

  include("connect.php");

  // ADMIN CHECK,
  include("admin-check.php");
  // CONTAINS SESSION START!

  $deleted=isset($_GET["deleted"]) ? $_GET["deleted"] : "";

  if (!empty($deleted)){
    $sql="delete from Reels where ReelID=?";
    $stmt=mysqli_prepare($yhteys, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $deleted);
    mysqli_stmt_execute($stmt);
  }
  mysqli_close($yhteys);

  header("Location: ../php/reels.php");
  exit;

?>