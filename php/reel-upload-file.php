<?php

  // ADMIN CHECK,
  include("admin-check.php");
  // CONTAINS SESSION START!

function uploadFile($inputName, $uploadDirectory)
{
  $file = $_FILES[$inputName];

  // Check for errors in the file upload
  if ($file['error'] !== UPLOAD_ERR_OK) {
    echo "File upload failed with error code: " . $file['error'];
    exit;
  }

  // Check if the file is an actual image or fake image
  if (!getimagesize($file['tmp_name'])) {
    echo "File is not an image.";
    exit;
  }

  // Set allowed file types (adjust as needed)
  $allowedFileTypes = ['jpg', 'jpeg', 'png', 'gif'];
  $fileExtension = strtolower(pathinfo($file['name'], PATHINFO_EXTENSION));

  if (!in_array($fileExtension, $allowedFileTypes)) {
    echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
    exit;
  }

  // Set a maximum file size (adjust as needed)
  $maxFileSize = 16 * 1024 * 1024; // 16 MB

  if ($file['size'] > $maxFileSize) {
    echo "Sorry, your file is too large. Maximum file size is 5 MB.";
    exit;
  }

  $fileName = $file['name'];
  $targetPath = $uploadDirectory . $fileName;

  // Move the uploaded file to the specified directory
  if (move_uploaded_file($file['tmp_name'], $targetPath)) {
    return $fileName;
  } else {
    echo "File upload failed.";
    exit;
  }
}
?>
