<?php 
  include 'backend/database.php';
  $userObj = new Users();

  if (!isset($_SESSION['login_email'])) {
    header("Location: login.php");
    exit();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- bootstrap cdn for css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Css link  -->
    <link rel="stylesheet" href="style.css">
    <!-- font awesome cdn -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
</head>
<style>
 
</style>
<body>
    <!-- All User's Chat will Display code start here -->
    <div class="container-fluid p-3 bg-dark vh-100 overflow-hidden ">
        <div class="row d-flex">
            <!-- Side User Message code start here -->
            <div class="col-4 bg-white mx-3  p-0">
                <!-- User Account Display code start -->
                <div class="col-12 ">
                    <!-- User Profile code start -->
                    <div class="user-profile p-3 py-2 d-flex align-items-center justify-content-around bg-success ">
                        <?php 
                        
                        // session_start();

                        if(isset($_SESSION['login_email'])){
                            $name = $_SESSION['login_name'];
                            $image = $_SESSION['login_image'];
                            // $id = $_SESSION['login_id'];
                        
                        ?>
                        <img src="images/<?php echo $image;  ?>" alt="" srcset="" class="rounded-circle">
                        <div class="user-header  w-50 ">
                            <h1 class="fs-1 mb-0 "><?php echo $name;?></h1>
                            <p class="fs-5 text-white">Active Now</p>
                        </div>
                       
                        <div class="logout-btn">
                            <a href="logout.php" class="btn  btn-primary btn-lg">Logout</a>
                        </div>
                    </div>
                    </div>
                    <!-- User Profile code end -->
                    <!-- User All contact chat code start -->
                    <div class="user-chat col-12  p-3 bg-white ">
                        <!-- Search for friends code start -->
                        <div class="search-bar p-2 pe-0 py-0 mb-2  d-flex">
                            <input type="text" name="C_search" id="c_search" class="  " placeholder="Search your friends..">
                            <i class="fa-solid fa-magnifying-glass fs-2 bg-dark text-white p-2 px-3"></i>
                        </div>
                        <!-- Search for friends code end -->

                        <!-- Chat Details code start -->
                        <div class="col-12 chat-display ">
                            <?php 
                              $userObj->allChat();
                            ?>
                           
                        </div>
                        <!-- Chat Details code end -->

                    </div>
                    <!-- User All contact chat code end -->
                <!-- User Account Display code end -->
            </div>
            <!-- Side User Message code end here -->

            <!-- Conversation Chat code start -->
            <div class="  conversation p-0  bg-white  ">
                <!-- User name code start -->
                <div class="col-12 bg-success p-3 py-2 d-none head">
                    <div class="user-name  d-flex">
                        <img src="images/1250573.jpg" alt="" srcset="" class="rounded-circle me-3">
                        <div class="user-header  w-50 ">
                            <h1 class="fs-1 mb-0 heading">Amarjit</h1>
                            <p class="fs-5 text-white">Active Now</p>
                        </div>
                    </div>
                </div>

                <div class="welcome d-flex h-100 justify-content-center align-items-center ">
                    <img src="images/download.png" alt="" srcset="" class="h-25 me-5">
                    <h1>Welcome to AJ_Chat</h1>
                </div>
                
                <!-- User name code end -->
                
                <!-- User conversation code start -->
                <div class="messagebox  d-flex justify-content-center align-items-center pt-5 mt-3 flex-column">

                  <div class="prentchat w-100">
                    <div class="chatBox chatBox-sender w-50 m-3  d-flex">
                        <img src="images/1250573.jpg" alt="" srcset="" class="chat-img rounded-circle ">
                        <div class="chat py-1 px-3  mx-2">
                            djfsdsfzsdfgzsdgdfgsdfjsdkljflskdjflaksdjfkasdlfj;sdakfj;ldksjfklsjfal;jdl
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore ab dolorum, aspernatur repellendus veritatis quas totam aut explicabo similique aliquid ex mollitia expedita. Minima velit suscipit optio quis, ea enim?
                        </div>
                    </div>
                  </div>
                    <!-- User conversation code end -->
                   

                    

                    <div class="prentchat w-100">
                    <div class="chatBox chatBox-sender w-50 m-3  d-flex">
                        <img src="images/1250573.jpg" alt="" srcset="" class="chat-img rounded-circle ">
                        <div class="chat py-1 px-3  mx-2">
                            djfsdsfzsdfgzsdgdfgsdfjsdkljflskdjflaksdjfkasdlfj;sdakfj;ldksjfklsjfal;jdl
                            Lorem ipsum, dolor sit amet consectetur adipisicing elit. Labore ab dolorum, aspernatur repellendus veritatis quas totam aut explicabo similique aliquid ex mollitia expedita. Minima velit suscipit optio quis, ea enim?
                        </div>
                    </div>
                  </div>
                </div>
                <!-- Conversation Chat code end -->

                <!-- Typing Message code start -->
                <div class="typing d-none d-flex justify-content-between align-items-center shadow-sm mx-2  ">
                    <i class="fa-solid fa-link p-1 mx-2 "></i>
                    <form action="" id="messageForm" class="w-100">
                        <input type="text" name="T_message" id="t_message" class="py-3 w-75 fs-4" placeholder="Type Your Message................">
                        <input type="hidden" name="ReceiverId" id="receiverId">
                        <input type="hidden" name="SenderId" id="senderId" value="<?php echo $_SESSION['login_id'];  ?>">
                    </form>
                    <i class="fa-solid fa-paper-plane fs-3 mx-3 bg-success p-3 rounded-circle d-flex align-items-center justify-content-center text-white" id="messageSubmit"></i>
                </div>
                <!-- Typing Message code end -->
            </div>
        </div>
        <?php } ?>
        
        <!-- All User's Chat will Display coed end here -->
            <!-- Jquery Cdn Link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="script.js"></script>
   <script>
    $(document).ready(function(){
        
   let initialReceiverId = $('#receiverId').val();
let imagePath = $('.chat-img').attr('src');
console.log(imagePath+'dkd');
fetchMessage(initialReceiverId);
receiverMessage(initialReceiverId,imagePath);
scrollToBottom();

$('body').on('click','.all-chat',function(e){
    e.preventDefault();

    let selectId = $(this).data('user-id');
    let imagePath = $(this).data('image-path');
    let name = $(this).data('user-name');
    $('.welcome').addClass('d-none');
     $('.head').removeClass('d-none');
     $('.typing').removeClass('d-none');

    $('.all-chat').removeClass('bg-success text-white');
    $('.all-chat .fa-circle').removeClass('text-white');

    $(this).addClass('bg-success text-white');
    $(this).find('.fa-circle').addClass('text-white');
    $('.user-name img').attr('src','images/'+imagePath);
    $('.chatBox-sender img').attr('src','images/'+imagePath);
    $('.user-header .heading').text(name);

    $('#receiverId').val(selectId);
    console.log(imagePath);
    console.log(selectId);
    $receiveId = $('#receiverId').val();
    $senderId = $('#senderId').val();
    $message = $('#t_message').val();

    console.log($receiveId+'dd ');
        
        fetchMessage($receiveId);
scrollToBottom();

    });

$('#messageSubmit').click(function(e){
    e.preventDefault();
    $receiveId = $('#receiverId').val();
    $senderId = $('#senderId').val();
    $message = $('#t_message').val();

    if($message != ''){

   
    $.ajax({
        url:'backend/action2.php',
        type:'POST',
        data:{
            action:'sendMessage',
            send:$senderId,
            receive:$receiveId,
            
            messageContent:$message},
        success:function(res){
            if(res != 'not send'){
                fetchMessage($receiveId);
                receiverMessage($receiveId);       
                $('#t_message').val('');
scrollToBottom();

            console.log('successfully Send');

            }else{
                console.log('failed');
            }
            // window.location.href = 'backend/action.php';
        }

    })
   
    }
    

})
function scrollToBottom() {
var messagebox = $('.messagebox');
messagebox.scrollTop(messagebox[0].scrollHeight);
}


function fetchMessage(receive){
    let imagePath = $(this).data('image-path');
    console.log(imagePath);
    $.ajax({
        url:'backend/action3.php',
        type:'POST',
        data:{
            action:'getMessage',
            send:$('#senderId').val(),
            receiveid:receive
            
        },
        success:function(res){
            $('.chatBox-me').addClass('d-none');
                $('.messagebox').html(res);
     
                console.log(res);
                console.log('fetch');
            }
    })
}
function receiverMessage(receive,imagess){
    $.ajax({
        url:'backend/action3.php',
        type:'POST',
        data:{

            action:'getMessage',
            send:$('#senderId').val(),
            receiveid:receive,
            image:imagess
            
        },
        success:function(res){
            $('.chatBox-sender').addClass('d-none');
                $('.messagebox').empty().append(res);
                console.log(res);
                console.log('fetch');
            }
    })
}


    })
   </script>
</body>
</html>