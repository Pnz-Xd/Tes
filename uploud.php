<?php

// Check if the form has been submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Check if the file has been uploaded
  if (isset($_FILES["file"])) {
    // Get the file information
    $file_name = $_FILES["file"]["name"];
    $file_temp = $_FILES["file"]["tmp_name"];
    $file_size = $_FILES["file"]["size"];
    $file_type = $_FILES["file"]["type"];

    // Check if the file is an MP3 file
    if ($file_type == "audio/mp3") {
      // Move the file to the uploads directory
      $upload_dir = "uploads/";
      $upload_file = $upload_dir . basename($file_name);
      move_uploaded_file($file_temp, $upload_file);

      // Get the URL of the uploaded file
      $upload_url = "https://github.com/Pnz-Xd/Tes/upload" . $upload_file;

      // Output the direct link to the uploaded file
      echo "<a href='$upload_url'>$upload_file</a>";
    } else {
      echo "Only MP3 files are allowed.";
    }
  } else {
    echo "No file has been uploaded.";
  }
} else {
  ?>
  <form action="

<?php echo $_SERVER["PHP_SELF"]; ?>" method="post" enctype="multipart/form-data">
    <input type="file" name="file" />
    <input type="submit" value="Upload File" />
  </form>
  

    <?php
}

?>