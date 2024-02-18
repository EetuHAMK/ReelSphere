<?php

  include("connect.php");
  
  $Username = isset($_POST["Username"]) ? $_POST["Username"] : "";
  $Firstname = isset($_POST["Firstname"]) ? $_POST["Firstname"] : "";
  $Lastname = isset($_POST["Lastname"]) ? $_POST["Lastname"] : "";
  $Email = isset($_POST["Email"]) ? $_POST["Email"] : "";
  $Password = isset($_POST["Password"]) ? $_POST["Password"] : "";

  $sql = "INSERT INTO Users (Username, Firstname, Lastname, Email, Password) VALUES (?, ?, ?, ?, ?)";

  $stmt=mysqli_prepare($yhteys, $sql);
  
  if (!$stmt) {
    echo "Error: " . mysqli_error($yhteys);
  } else {
  mysqli_stmt_bind_param($stmt, 'sssss', $Username, $Firstname, $Lastname, $Email, $Password);
  mysqli_stmt_execute($stmt);
  mysqli_stmt_close($stmt);
  mysqli_close($yhteys);
  }
  
  header("Location: ../pages/login.html");
  exit;

?>
