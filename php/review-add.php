<?php

  include("connect.php");

  session_start();

  // USER CHECK!
  if (!isset($_SESSION["UserID"])) {
    header("Location: ../pages/login.html");
    exit;
  }

  $ReelID = isset($_GET['ReelID']) ? intval($_GET['ReelID']) : 0;
  $UserID = $_SESSION['UserID'];
  $Username = $_SESSION['Username'];

  // Check if the user has already submitted a review for this ReelID
  $existingReviewCheck = mysqli_query($yhteys, "SELECT * FROM Reviews WHERE ReelID = $ReelID AND UserID = $UserID");

  if (mysqli_num_rows($existingReviewCheck) > 0) {
    // User has already submitted a review for this ReelID, handle accordingly
    header("Location: ../php/reel.php?ReelID=$ReelID");
    exit;
  }

  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $Title = isset($_POST["Title"]) ? htmlspecialchars(trim($_POST["Title"])) : "";
    $Rating = isset($_POST["Rating"]) ? floatval($_POST["Rating"]) : "";
    $ReviewText = isset($_POST["ReviewText"]) ? htmlspecialchars(trim($_POST["ReviewText"])) : "";

    $sql = "INSERT INTO Reviews (ReelID, UserID, Username, Title, Rating, ReviewText) VALUES (?, ?, ?, ?, ?, ?)";
    $stmt = mysqli_prepare($yhteys, $sql);

    if (!$stmt) {
      echo "Error: " . mysqli_error($yhteys);
    } else {
      mysqli_stmt_bind_param($stmt, 'iissds', $ReelID, $UserID, $Username, $Title, $Rating, $ReviewText);
      mysqli_stmt_execute($stmt);
      mysqli_stmt_close($stmt);
      mysqli_close($yhteys);

      header("Location: ../php/reel.php?ReelID=$ReelID");
      exit;
    }
  }
?>
