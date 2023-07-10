<?php
    session_start();
    if(isset($_SESSION['uid'])){
        include_once "../php/db_conn.php";
        $sender_uid = mysqli_real_escape_string($conn, $_POST['outgoing_id']);
        $incoming_uid = mysqli_real_escape_string($conn, $_POST['incoming_id']);
        $output = "";

        $sql = "SELECT * FROM messages 
                WHERE (sender_uid = {$sender_uid} AND recipient_uid = {$incoming_uid})
                OR (sender_uid = {$incoming_uid} AND recipient_uid = {$sender_uid}) 
                ORDER BY msg_id ASC";

        $query = mysqli_query($conn, $sql);
        if(mysqli_num_rows($query) > 0){
            while($row = mysqli_fetch_assoc($query)){
                if($row['sender_uid'] == $sender_uid){
                    $output .= '<div class="chat outgoing">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }else{
                    $incomingUserQuery = mysqli_query($conn, "SELECT img FROM users WHERE uid = {$incoming_uid}");
                    $incomingUser = mysqli_fetch_assoc($incomingUserQuery);

                    $output .= '<div class="chat incoming">
                                <img src="../img/'. $incomingUser['img'] . '" alt="">
                                <div class="details">
                                    <p>'. $row['msg'] .'</p>
                                </div>
                                </div>';
                }
            }

            echo $output;
        }        
    }else{
        header("Location: ../Login");
    }
?>
