<?php
    while($row = mysqli_fetch_assoc($sql)){
        $sql2 = "SELECT * FROM messages WHERE sender_uid ={$row['uid']} AND (sender_uid ={$outgoing_id}
                    OR recipient_uid ={$outgoing_id}) ORDER BY msg_id DESC LIMIT 1";
        $query2 = mysqli_query($conn, $sql2);
        $row2 = mysqli_fetch_assoc($query2);
        if(mysqli_num_rows($query2) > 0){
            $result = $row2['msg'];
        }else{
            $result = "No messages available";
        }

        (strlen($result) > 28) ? $msg = substr($result, 0, 28).'...' : $msg = $result;

        ($row2 && $outgoing_id == $row2['sender_uid']) ? $you = "You: " : $you = "";

        ($row['status'] == "Offline now") ? $offline = "offline" : $offline = "";

        $currentTime = date('H:i:s', strtotime(date('H:i:s').'-2 second'.'-1 hour'));
        
        ($row['last_activity']) ? $last_activity = $row['last_activity'] : $last_activity = "null";

        if ($last_activity < $currentTime) {
            $status = "Offline now";
            $sql5 = mysqli_query($conn, "UPDATE users SET status = '{$status}' WHERE uid = {$row['uid']}");
            $offline = "offline";
        }

        $output .=  '<a href="../Chat?user_id='.$row['uid'].'">
                    <div class="content">
                    <img src="../img/'. $row['img'] .'" alt="">
                    <div class="details">
                        <span>'. $row['firstname'] . " " . $row['lastname'] .'</span>
                        <p>'. $you . $msg .'</p>
                    </div>
                    </div>
                    <div class="status-dot '.$offline.'"><i class="fas fa-circle"></i></div>
                    </a>';
    }
?>  