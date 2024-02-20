<?php

  session_start();

  include("connect.php");

  $Username = isset($_POST["Username"]) ? $_POST["Username"] : "";
  $Password = isset($_POST["Password"]) ? $_POST["Password"] : "";

  $sql = "SELECT * FROM Users WHERE Username = ? AND Usertype = 'Admin'";

  $stmt = mysqli_prepare($yhteys, $sql);
  mysqli_stmt_bind_param($stmt, 's', $Username);
  mysqli_stmt_execute($stmt);

  $result = mysqli_stmt_get_result($stmt);

  if ($row = mysqli_fetch_assoc($result)) {
    // Verify the hashed password
    if (password_verify($Password, $row["Password"])) {
      $_SESSION["UserID"] = $row["UserID"];
      $_SESSION["Username"] = $row["Username"];
      $_SESSION["Usertype"] = 'Admin';

      header("Location: ../php/admin-home.php");
      exit;
    }
  }

  // Incorrect username or password
  header("Location: ../php/admin-login-I.php");
  exit;

?>
