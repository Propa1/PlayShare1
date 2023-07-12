<?php
while ($row = mysqli_fetch_assoc($sql)) {
    $userID = $row['pub_id'];

    // Retrieve publications for each user ID
    $publicationQuery = mysqli_query($conn, "SELECT * FROM comments WHERE pubid = '{$userID}'");
    
    while ($publicationRow = mysqli_fetch_assoc($publicationQuery)) {
        $output .=  '<ul class="message-list">
                        <img src="../img/' . $row['img'] . '" alt="">
                        <label class="UserName">' . $row['firstname'] . '</label>
                        <div class="Comentario">
                            <label>' . $publicationRow['comment'] . '</label>
                        </div>
                    </ul>';
    }
}
?>

