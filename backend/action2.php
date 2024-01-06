<?php 

include 'database.php';


if (isset($_POST['action']) && $_POST['action'] == 'sendMessage') {
    // Check if required parameters are set
    if (isset($_POST['send'], $_POST['receive'], $_POST['messageContent'])) {
        $senderId = $_POST['send'];
        $receiverId = $_POST['receive'];
        $message = $_POST['messageContent'];

        $test = new Users();

        // Handle potential errors in sendMessage function
        if ($test->sendMessage($senderId, $receiverId, $message)) {
            echo "senddd";
        } else {
            echo "Failed to send message.";
        }
    } else {
        echo "Missing required parameters.";
    }
} else {
    echo "Invalid action.";
}







?>