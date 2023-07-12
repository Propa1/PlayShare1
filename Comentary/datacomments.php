<?php
    while ($row = mysqli_fetch_assoc($sql)) {

        // Retrieve publications for each user ID
        $publicationQuery = mysqli_query($conn, "SELECT * FROM comments WHERE pubid = '{$pub_id}'");
        
        while ($publicationRow = mysqli_fetch_assoc($publicationQuery)) {
            $userId = $publicationRow['user_id'];
            $userQuery = mysqli_query($conn, "SELECT * FROM users WHERE uid = '{$userId}'");
            $user = mysqli_fetch_assoc($userQuery);

            $output .=  '<ul class="message-list">
                            <img src="../img/' . $user['img'] . '" alt="">
                            <label class="UserName">' . $user['firstname'] . '</label>
                            <div class="Comentario">
                                <label>' . $publicationRow['comment'] . '</label>
                            </div>
                        </ul>';
        }
    }
?>
