<?php

  session_start();

  include("connect.php");

  $Email = isset($_POST["Email"]) ? $_POST["Email"] : "";
  $Password = isset($_POST["Password"]) ? $_POST["Password"] : "";

  $sql = "SELECT * FROM Users WHERE Email = ? AND Password = ? AND Usertype = 'User'";

  $stmt = mysqli_prepare($yhteys, $sql);
  mysqli_stmt_bind_param($stmt, 'ss', $Email, $Password);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {

    $_SESSION["UserID"] = $row["UserID"];
    $_SESSION["Username"] = $row["Username"];
    $_SESSION["Usertype"] = 'User';

    header("Location: ../php/user-home.php");
    exit;
    
  } else {
    header("Location: ../pages/login.html");
    exit;
  }

?>
