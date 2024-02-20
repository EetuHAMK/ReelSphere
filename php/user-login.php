<?php

  session_start();

  include("connect.php");

  $Email = isset($_POST["Email"]) ? $_POST["Email"] : "";
  $Password = isset($_POST["Password"]) ? $_POST["Password"] : "";

  $sql = "SELECT * FROM Users WHERE Email = ? AND Usertype = 'User'";

  $stmt = mysqli_prepare($yhteys, $sql);
  mysqli_stmt_bind_param($stmt, 's', $Email);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {
    // Verify the hashed password
    if (password_verify($Password, $row["Password"])) {
      $_SESSION["UserID"] = $row["UserID"];
      $_SESSION["Username"] = $row["Username"];
      $_SESSION["Usertype"] = 'User';

      header("Location: ../php/user-home.php");
      exit;
    }
  }

  // Incorrect email or password
  header("Location: ../pages/login.html");
  exit;

?>
