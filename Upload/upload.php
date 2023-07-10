<?php
  session_start();
  include_once "../php/db_conn.php";
  
  if (isset($_FILES['file'])) {
    $media_name = $_FILES['file']['name'];
    $media_type = $_FILES['file']['type'];
    $tmp_name = $_FILES['file']['tmp_name'];

    // Determine the file extension
    $media_explode = explode('.', $media_name);
    $media_ext = end($media_explode);

    // Specify the allowed extensions
    $allowed_extensions = ["jpeg", "png", "jpg", "JPG", "mp4", "mov", "avi"];

    if (in_array($media_ext, $allowed_extensions)) {
        // Specify the allowed file types
        $allowed_image_types = ["image/jpeg", "image/jpg", "image/png"];
        $allowed_video_types = ["video/mp4", "video/quicktime", "video/x-msvideo"];

        if (in_array($media_type, $allowed_image_types) || in_array($media_type, $allowed_video_types)) {
            $time = time();
            $new_media_name = $time . str_replace(' ', '', $media_name);

            if (move_uploaded_file($tmp_name, "../media/" . $new_media_name)) {
                // Get the current time
                $current_time = date("Y-m-d H:i:s");

                // Get the values of additional fields
                $title = mysqli_real_escape_string($conn, $_POST['title']);
                $descriptions = mysqli_real_escape_string($conn, $_POST['descriptions']);

                // Insert the file details and additional fields into the database
                    $insert_query = mysqli_query($conn, "INSERT INTO publications (user_uid, title, description, media, timestamp) VALUES ('{$_SESSION['uid']}', '{$title}', '{$descriptions}', '{$new_media_name}', '{$current_time}')");

                    if ($insert_query) {
                        echo "Successfully";
                    } else {
                        echo "Failed to insert file.";
                    }
                } else {
                    echo "Failed to upload file.";
                }
            } else {
                echo "Please upload an image or video file.";
            }
        } else {
            echo "Please upload an image or video file.";
        }
    } else {
        echo "No file selected.";
    }

?>
