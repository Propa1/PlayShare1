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
                            <div class="engagement">
                                <span class="likes"><i class="ri-thumb-up-line"></i>10</span>
                                <span class="comments"><i class="ri-message-2-line"></i>10</span>
                                <span class="shares"><i class="ri-share-forward-line"></i>10</span>
                            </div>
                        </div>
                    </form>
                </div>';
        }
    }

?>
