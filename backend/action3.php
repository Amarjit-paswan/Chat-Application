<?php 
include 'database.php';

if($_POST['action'] && $_POST['action'] == 'getMessage'){
    $senderId = $_POST['send'];
    $receiverId = $_POST['receiveid'];
    // $image = $_POST['image'];
    // $message = $_POST['messageContent'];

    $test = new Users();
    $message =  $test->getMessage($receiverId);
    //  $test->receiverMessage($receiverId);
    
     echo $message;
}

?>