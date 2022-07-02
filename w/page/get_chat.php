<?php
session_start();
include_once '../inc/koneksi.php';


extract($_GET);
$idSender = $_GET['idSender'];
$idReceiver = $_GET['idReceiver'];


if (isset($_GET['idSender']) && isset($_GET['idReceiver'])) {
    $output = "";

    $sql = "SELECT * FROM chat WHERE (sender_id = {$idSender} AND receiver_id = {$idReceiver}) OR (sender_id = {$idReceiver} AND receiver_id = {$idSender}) ORDER BY id ASC";
    $query = mysqli_query($koneksi, $sql);
    // print_r($query);
    if (mysqli_num_rows($query) > 0) {
        while ($row = mysqli_fetch_assoc($query)) {
            if ($row['sender_id'] === $idSender) {
                if ($row['photo'] != null) {
                    $target = '../img/chat/' . $row['photo'];
                    $output .= '<div class="chat">
                <div class="chat-avatar">
                    <a class="avatar m-0" data-toggle="tooltip" href="#"
                        data-placement="right" title="" data-original-title="">
                        <img src="../img/user/user.jpg" alt="avatar" height="40"
                            width="40" />
                    </a>
                </div>
                <div class="chat-body">
                    <div class="chat-content">
                    
                        <img src="' . $target . '"  height="120"
                            width="120" />
</div>
</div>
</div>';
                } else {
                    $output .= '<div class="chat">
                    <div class="chat-avatar">
                        <a class="avatar m-0" data-toggle="tooltip" href="#"
                            data-placement="right" title="" data-original-title="">
                            <img src="../img/user/user.jpg" alt="avatar" height="40"
                                width="40" />
                        </a>
                    </div>
                    <div class="chat-body">
                        <div class="chat-content">
                            <p>' . $row['msg'] . '</p>
                           
    </div>
    </div>
    </div>';
                }
            } else {
                if ($row['photo'] != null) {
                    $target = '../img/chat/' . $row['photo'];
                    $output .= '<div class="chat">
                <div class="chat-avatar">
                    <a class="avatar m-0" data-toggle="tooltip" href="#"
                        data-placement="right" title="" data-original-title="">
                        <img src="../img/user/user.jpg" alt="avatar" height="40"
                            width="40" />
                    </a>
                </div>
                <div class="chat-body">
                    <div class="chat-content">
                    
                        <img src="' . $target . '"  height="120"
                            width="120" />
</div>
</div>
</div>';
                } else {
                    $output .= '<div class="chat">
                    <div class="chat-avatar">
                        <a class="avatar m-0" data-toggle="tooltip" href="#"
                            data-placement="right" title="" data-original-title="">
                            <img src="../img/user/user.jpg" alt="avatar" height="40"
                                width="40" />
                        </a>
                    </div>
                    <div class="chat-body">
                        <div class="chat-content">
                            <p>' . $row['msg'] . '</p>
                           
    </div>
    </div>
    </div>';
                }
            }
        }
        echo $output;
    }
} else {
    echo "ERROR: Hush! Sorry $sql. "
        . mysqli_error($koneksi);
}