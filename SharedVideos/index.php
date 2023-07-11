<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/videosoutput.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
</head>
<body>
    <div class="contents">
        <?php
            include_once "../php/db_conn.php";
            $user_id = mysqli_real_escape_string($conn, $_GET['user_id']);      

            $sql = mysqli_query($conn, "SELECT * FROM publications WHERE user_uid = {$user_id}");
            $sql2 = mysqli_query($conn, "SELECT * FROM users WHERE uid = {$user_id}");
            $row = mysqli_fetch_assoc($sql);
            $row2 = mysqli_fetch_assoc($sql2);

            if(mysqli_num_rows($sql) < 1){
                echo "No Publication ";
            }elseif(mysqli_num_rows($sql) >= 1){
                    echo '<div class="wrapper">
                            <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                                <div class="user-info">
                                    <img src="../img/' . $row2['img'] . '" alt="User Profile Picture" />
                                    <span class="username">' . $row2['firstname'] . '</span>
                                </div>
                                <div class="video">';

                $media = trim($row['media']);
                $media = str_replace('%20', '+', $media);
                $mediaType = explode('/', mime_content_type("../media/" . $media))[0];

                if ($mediaType === 'image') {
                echo '<img src="../media/' . urlencode($media) . '" alt="Image">';
                } elseif ($mediaType === 'video') {
                echo '<video src="../media/' . urlencode($media) . '" controls></video>';
                }

                echo'</div>
                        <div class="caption">
                            <span class="Description">' . $row['description'] . '</span>
                        </div>
                    </form>
                    </div>';
            }
            
        ?>
    </div>
</body>
</html>