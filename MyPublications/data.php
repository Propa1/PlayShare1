<?php
    while($row = mysqli_fetch_assoc($sql)){

        $output .= '<div class="wrapper">
                            <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                                <div class="user-info">
                                    <img src="../img/' . $row['img'] . '" alt="User Profile Picture" />
                                    <span class="username">' . $row['firstname'] . '</span>
                                </div>
                                <div class="video">';

            $media = trim($row['media']);
            $media = str_replace('%20', '+', $media);
            $mediaType = explode('/', mime_content_type("../media/" . $media))[0];

            if ($mediaType === 'image') {
                $output .= '<img src="../media/' . urlencode($media) . '" alt="Image">';
            } elseif ($mediaType === 'video') {
                $output .= '<video src="../media/' . urlencode($media) . '" controls></video>';
            }

            $output .= '</div>
                        <div class="caption">
                            <span class="Description">' . $row['description'] . '</span>
                            <div class="engagement">
                                <input type="button" value="Delete" class="delete">
                            </div>
                        </div>
                    </form>
                </div>';
    }
?>
