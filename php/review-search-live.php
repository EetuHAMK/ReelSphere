<?php

  include("connect.php");

  // ADMIN CHECK,
  include("admin-check.php");
  // CONTAINS SESSION START!

  $searchQuery = $_GET['q'];

  $sql = "SELECT * FROM Reviews WHERE LOWER(ReviewText) LIKE LOWER(?)";
  $stmt = $yhteys->prepare($sql);
  $searchParam = '%' . $searchQuery . '%';
  $stmt->bind_param("s", $searchParam);
  $stmt->execute();
  $result = $stmt->get_result();

  if (!$result) {
    die("Error: " . $yhteys->error);
  }

  if ($result->num_rows > 0) {
    echo "<section class='review-items'>";
      while ($rivi = mysqli_fetch_object($result)) {
        echo "<div class='review-item'>";

          echo "<div class='review-item-id'>
            <p>Review ID | {$rivi->ReviewID}</p>
          </div>";

          echo "<div class='review-item-title'>
            <p>{$rivi->Title}</p>
          </div>";

          echo "<div class='review-item-info'>
            <p>Username: | {$rivi->Username}</p>
          </div>";

          echo "<div class='review-item-info'>
            <p>{$rivi->ReviewText}</p>
          </div>";

          echo "<div class='review-item-options'>
            <a href='./review-delete.php?deleted={$rivi->ReviewID}'>Delete</a>
          </div>";

        echo "</div>";
      }
    echo "</section>";
    
  } else {
    echo 'No results found.';
  }

  $stmt->close();
  $yhteys->close();

?>
