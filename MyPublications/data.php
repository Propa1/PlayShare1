<?php
    while($row = mysqli_fetch_assoc($sql)){

        $output .=  '<div class="publication-info">
                        <h3>'. $row['title'] .'</h3>
                        <div class="img-area" data-img="">';

        $media = trim($row['media']);
        $media = str_replace('%20', '+', $media);
        $mediaType = explode('/', mime_content_type("../media/" . $media))[0];

        if ($mediaType === 'image') {
            $output .= '<img src="../media/' . urlencode($media) . '" alt="Image">';
        } elseif ($mediaType === 'video') {
            $output .= '<video src="../media/' . urlencode($media) . '" controls></video>';
        }

        $output .= '</div>
                        <span class="publication-date">' . $row['timestamp'] . '</span>
                    </div>
                    <div class="publication-actions">
                        <a href="#" class="edit-button">Edit</a>
                        <a href="#" class="delete-button">Delete</a>
                    </div>';
    }
?>
