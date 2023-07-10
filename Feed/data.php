<?php
    while($row = mysqli_fetch_assoc($sql)){

        $output .=  '<a href="../ProfileGlobal/?user_id='.$row['uid'].'">
                    <div class="content">
                    <img src="../img/'. $row['img'] .'" alt="">
                    <div class="details">
                        <span>'. $row['firstname'] . " " . $row['lastname'] .'</span>
                    </div>
                    </div>
                    </a>';
    }
?>