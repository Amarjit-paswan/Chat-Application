<?php 
session_start();
class Users{
    private $db_connection = '';
    public function __construct()
    {
        $this->db_connection = new mysqli('localhost','root','','chat_app');
    }

    public function addUser($name,$email,$password,$image){
        $check_sql = "SELECT * FROM users WHERE user_email = '$email'";
        $result_check = $this->db_connection->query($check_sql);

        if($result_check->num_rows > 0){
            echo "email exists";
            // exit();
        }else{
            $add_sql = "INSERT INTO users (user_name,user_email,password,image_path) VALUES ('$name','$email','$password','$image')";

            $result_add = $this->db_connection->query($add_sql);

            $_SESSION['name'] = $name;

            if($result_add){
                echo "Successfull";
                return true;
            }else{
                echo "Error" . $this->db_connection->error;
                die();
            }
        }
    }

    public function loginUser($email2,$password2){
        $sql_pass = "SELECT * FROM users WHERE user_email = '$email2' AND password = '$password2'";
        $result_pass = $this->db_connection->query($sql_pass);

        if($result_pass->num_rows > 0){
            $user = $result_pass->fetch_assoc();
            $_SESSION['login_id'] = $user['id'];
            $_SESSION['login_email'] = $user['user_email'];
            $_SESSION['login_name'] = $user['user_name'];
            $_SESSION['login_image'] = $user['image_path'];
            echo "Login";
            return true;
        }else{
            echo $this->db_connection->error;
            die();
        }
        
    }

    public function allChat(){
        $user_email = $_SESSION['login_email'];
        $sql_chat = "SELECT * FROM users WHERE user_email != '$user_email'";
        $result_chat = $this->db_connection->query($sql_chat);

        if($result_chat->num_rows > 0){
           

            while( $result_assoc = $result_chat->fetch_assoc()){
                echo ' <div class="col-12 all-chat mt-3 my-2 border border-secondary p-2 rounded-3 d-flex  align-items-center justify-content-around shadow" data-image-path = "'. $result_assoc['image_path'].'" data-user-name = "'. $result_assoc['user_name'] .'" data-user-id = "'.$result_assoc['id'].'">
                <img src="images/'.$result_assoc["image_path"].'" alt="" srcset="" class="rounded-circle me-3">
                <div class="user-name w-75  p-1 ">
                    <h1 class="fs-3 mb-0">'.$result_assoc["user_name"].'</h1>
                </div>
                <i class="fa-solid fs-4 fa-circle text-success me-3"></i>
            </div>';
            }

        }

        

    }

  public function sendMessage($senderID,$receiverID,$message){
    $sql_message = "INSERT INTO messages (sender_id,receiver_id,message_text)
                    VALUES('$senderID','$receiverID','$message')";
    $message_result = $this->db_connection->query($sql_message);

    if($message_result){
        echo "send";
        return true;
    }else{
        echo "Error: " . $this->db_connection->error;
    }
  }

  public function getMessage($receiver){
    $senderid = $_SESSION['login_id'];

    $sql_getMess = "SELECT messages.*,users.image_path FROM messages INNER JOIN users ON messages.sender_id = users.id WHERE (sender_id = '$senderid' AND receiver_id = '$receiver')  OR (sender_id = '$receiver' AND receiver_id = '$senderid') ORDER BY created_at ASC
           ";
    $result_get = $this->db_connection->query($sql_getMess);

    $message = '';

    while($row = $result_get->fetch_assoc()){
        $timestamp = date('H:i:s',strtotime($row['created_at']));
        if($row['sender_id'] == $senderid){

        $message .= '<div class="prentchat w-100"> <div class="chatBox chatBox-me float-end   w-50 my-3 d-flex justify-content-end px-5">
        <div class = "d-flex flex-column justify-content-end align-items-end" >
        <div class="chat-me py-1 px-3  mx-2 bg-success d-flex justify-content-center               align-items-center mb-2 ">'.
           $row['message_text'].'<br>
        </div><p class = "text-secondary">'.$timestamp.'</p>
        </div>
           
           <img src="images/'.$_SESSION['login_image'].'" alt=""  class="chat-img rounded-circle ">
        </div>
    </div> 

    </div>';
}else{
    $message .= '<div class="prentchat w-100 "> <div class="chatBox chatBox-sender w-50 my-3 d-flex  px-3">

        <img src="images/'.$row['image_path'].'" alt="" srcset="" class="chat-img rounded-circle ">
        <div class = "d-flex flex-column justify-content-center align-items-center" >
        <div class="chat py-1 px-3  mx-2 bg-grey d-flex justify-content-center align-items-center  ">'.
           $row['message_text']
        .'</div><p class = "text-secondary">'.$timestamp.'</p>
        </div>
       
    </div> </div>';
}
    }
    return  $message;

  }


    

  
}




?>