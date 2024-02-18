<?php

  include("connect.php");

  // ADMIN CHECK,
  include("admin-check.php");
  // CONTAINS SESSION START!

  $searchQuery = $_GET['q'];

  $sql = "SELECT * FROM Users WHERE LOWER(Username) LIKE LOWER(?)";
  $stmt = $yhteys->prepare($sql);
  $searchParam = '%' . $searchQuery . '%';
  $stmt->bind_param("s", $searchParam);
  $stmt->execute();
  $result = $stmt->get_result();

  if (!$result) {
    die("Error: " . $yhteys->error);
  }

  if ($result->num_rows > 0) {
    echo "<section class='user-items'>";
      while ($rivi = $result->fetch_assoc()) {
        echo "<div class='user-item'>

          <div class='user-item-title'>
            <p>{$rivi['Username']}</p>
          </div>

          <div class='user-item-info'>
            <p>{$rivi['Firstname']} | {$rivi['Lastname']} | {$rivi['Email']} | {$rivi['Password']}</p>
          </div>

          <div class='user-item-options'>
            <a href='./user-edit.php?edited={$rivi['UserID']}'>Edit</a> |
            <a href='./user-delete.php?deleted={$rivi['UserID']}'>Delete</a>
          </div>
          
        </div>";
      }

    "</section>";
    
  } else {
    echo 'No results found.';
  }

  $stmt->close();
  $yhteys->close();

?>
