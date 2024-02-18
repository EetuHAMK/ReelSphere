<?php

  if (session_status() == PHP_SESSION_NONE) {
    session_start();
  }

  if (!function_exists('isAdmin')) {
    function isAdmin() {
      return isset($_SESSION['UserID']) && isset($_SESSION['Usertype']) && $_SESSION['Usertype'] === 'Admin';
    }
  }

  if (!isAdmin()) {
    header("Location: ../php/user-logout.php");
    exit;
}
  
?>
