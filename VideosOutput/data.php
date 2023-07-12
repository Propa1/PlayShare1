<?php
    while ($row = mysqli_fetch_assoc($sql)) {
        $userID = $row['uid'];
        
        // Retrieve publications for each user ID
        $publicationQuery = mysqli_query($conn, "SELECT * FROM publications WHERE user_uid = '{$userID}'");

        // Fetch and display the publications
        while ($publicationRow = mysqli_fetch_assoc($publicationQuery)) {
            $output .= '<div class="wrapper">
                            <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                                <div class="user-info">
                                    <img src="../img/' . $row['img'] . '" alt="User Profile Picture" />
                                    <span class="username">' . $row['firstname'] . '</span>
                                </div>
                                <div class="video">';

            $media = trim($publicationRow['media']);
            $media = str_replace('%20', '+', $media);
            $mediaType = explode('/', mime_content_type("../media/" . $media))[0];

            if ($mediaType === 'image') {
                $output .= '<img src="../media/' . urlencode($media) . '" alt="Image">';
            } elseif ($mediaType === 'video') {
                $output .= '<video src="../media/' . urlencode($media) . '" controls></video>';
            }

            $output .= '</div>
                        <div class="caption">
                            <span class="Description">' . $publicationRow['description'] . '</span>
                            <div class="engagement">';
                                
            $pub_id = $publicationRow['pub_id'];
            $pub_uid = $publicationRow['user_uid'];
            $user_uid = $_SESSION['uid'];
                                
            $likes = mysqli_query($conn, "SELECT * FROM publications_likes WHERE publication_id = '{$pub_id}'");
            $likesCount = mysqli_num_rows($likes);

            # Check if current user liked the video
            $liked = false;
            if ($likesCount > 0) {
                foreach($likes as $like) {
                    if ($like['like_giver'] == $user_uid) {
                        $liked = true;
                    }
                }
            }

            $output .=          '<span class="likes pub'.$pub_id.'" onclick="likePub('.$pub_id.')"><i class="ri-thumb-up-'.($liked ? 'fill' : 'line').' like-btn" data-pub-id=" ' . $pub_id .'"></i>' . $likesCount . '</span>
                                <span class="comments" onclick="handlecomments('.$pub_id.')"><i class="ri-message-2-line"></i>10</span>
                                <span class="shares" onclick="handleLikeAndShare('.$pub_uid.')"><i class="ri-share-forward-line"></i></span>
                            </div>
                        </div>
                    </form>
                </div>';
        }
    }

?>
