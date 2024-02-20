<?php

  include("connect.php");

  // ADMIN CHECK,
  include("admin-check.php");
  // CONTAINS SESSION START!

  $Username = isset($_POST["Username"]) ? $_POST["Username"] : "";
  $Firstname = isset($_POST["Firstname"]) ? $_POST["Firstname"] : "";
  $Lastname = isset($_POST["Lastname"]) ? $_POST["Lastname"] : "";
  $Email = isset($_POST["Email"]) ? $_POST["Email"] : "";
  $Password = isset($_POST["Password"]) ? $_POST["Password"] : "";
  $UserID = isset($_POST["UserID"]) ? $_POST["UserID"] : "";

  if (empty($Username) || empty($Firstname) || empty($Lastname) || empty($Email) || empty($UserID)) {
    header("Location:../404.html");
    exit;
  }

  $sql = "UPDATE Users SET Username=?, Firstname=?, Lastname=?, Email=?";

  // Check if a new password is provided
  if (!empty($Password)) {
    $hashedPassword = password_hash($Password, PASSWORD_DEFAULT);
    $sql .= ", Password=?";
  }

  $sql .= " WHERE UserID=?";

  $stmt = mysqli_prepare($yhteys, $sql);

  if (!$stmt) {
    echo "Error: " . mysqli_error($yhteys);
  }

  // Bind parameters based on whether a new password is provided
  if (!empty($Password)) {
      mysqli_stmt_bind_param($stmt, 'sssssi', $Username, $Firstname, $Lastname, $Email, $hashedPassword, $UserID);
  } else {
      mysqli_stmt_bind_param($stmt, 'ssssi', $Username, $Firstname, $Lastname, $Email, $UserID);
  }

  mysqli_stmt_execute($stmt);

  if (mysqli_stmt_affected_rows($stmt) > 0) {
    header("Location: ../php/users.php");
    exit;
  } else {
    header("Location: ../404.html");
    exit;
  }

?>
