
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat Application</title>
    <!-- bootstrap cdn for css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome Cdn Link -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"/>
    <!-- Css link  -->
    <link rel="stylesheet" href="style.css">
    <style>
        .password{
    position: relative;
        }

        .eye{
            position: absolute;
            top: 50px;
            right: 1rem;
            font-size: 18px;
            color: grey;
            cursor: pointer;
        }

        

        .eye:hover{
            color: black;
        }

     </style>
</head>
<body class="bg-light">
    <!-- User Login Form starts here -->
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center align-items-center">
            <div class="col-4  border border-secondary rounded bg-white p-0  pb-3 ">
                <div class="col-12 text-white text-center  bg-success p-2 py-4 ">
                    <h1 class="">AJ_ChatApp</h1>
                </div>
                <div class="col-12 p-3 ">
                    <div class="col-12 mt-2">
                        <!-- form for Register Details start here -->
                        <form action="" id="loginForm"  autocomplete="off">

                        <!-- All Error Will Display here -->
                        <div class="alert d-none alert-danger" role="alert"></div>

                            <!-- When form Data will successfull this spin will active -->
                            <div class="col-12 d-flex justify-content-center align-items-center d-none loading">
                                <button class="btn btn-primary" type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                           </div>

                        <!-- When user come from successfull register process -->
                        <?php 
                        session_start();

                        if(isset($_SESSION['name'])){
                            $ss_name = $_SESSION['name'];
                            echo ' <div class="alert  alert-success" role="alert">'.'Congratulations! '. $ss_name. ' Your account has Register  '.
                            '</div>';

                            echo '<script>
                                    setTimeout(function(){
                                        $(".alert-success").addClass("d-none");
                                    },2500);
                                  </script>';
                        }


                        ?>
                      
                            <div class="mb-3">
                                <label for="" class="form-label fs-5">Email</label>
                                <input type="text" name="L_email" id="l_email" class="form-control border border-secondary" placeholder="Enter Your Email...">
                            </div>
                            <div class="mb-3 password">
                                <label for="" class="form-label fs-5">Password</label>
                                <input type="password" name="L_password" id="l_password" class="form-control border border-secondary" placeholder="Enter Your Password...">
                                <i class="fa-solid fa-eye eye" onclick="passwordShow()"></i>
                                <i class="fa-solid eye d-none fa-eye-slash" onclick="passwordShow()"></i> 
                            </div>
                            <div class="  d-flex justify-content-end align-items-center ">

                                <a href="index.php" class="btn btn-primary ">Go to Register From</a>
                                <input type="submit" value="Login"  id="l_submit" class="btn btn-success mx-2 float-end">
                            </div>
                        </form>
                        <!-- form for login Details end here -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- User login Form end here -->
     <!-- Jquery Cdn Link -->
     <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
     <!-- Javascript file Link -->
     <script src="script.js"></script>
     <script>

function passwordShow(){
            
            let passwordinput = $('#l_password');
            let icon = $('.eye');
        
            if(passwordinput.prop('type') === 'password'){
                passwordinput.prop('type','text');
                icon.removeClass('fa-eye');
                icon.addClass('fa-eye-slash');
                icon.css('color','black');
        
            }else{
                passwordinput.prop('type','password');
                icon.removeClass('fa-eye-slash');
                icon.addClass('fa-eye');
                icon.css('color','grey');
            }
        }
$(document).ready(function(){
  
        $('#loginForm').submit(function(e){
    e.preventDefault();

    let email = $('#l_email').val();
    let password = $('#l_password').val();

    if(email === '' || password === ''){
        $('.alert-success').addClass('d-none');
        $('.alert-danger').removeClass('d-none');
        $('.alert-danger').html('All Fields are require..');
        setTimeout(function(){
            $('.alert-danger').addClass('d-none');
        },3000);
    }else{
        
        $.ajax({
            url:'backend/action.php',
            type:'POST',
            data:$('#loginForm').serialize()+'&action=login',
            
            success:function(res){
                if(res.trim() === "Login"){
                    $('.loading').removeClass('d-none');
                    console.log(res);

                        setTimeout(function(){
                            $('.loading').addClass('d-none');
                            $('#loginForm').trigger('reset');
                            window.location.href = 'chat.php';
                        },3500)
                }else{
                    $('.alert-success').addClass('d-none');
                    $('.alert-danger').removeClass('d-none');
                    $('.alert-danger').html('Email and Password are Invalid..');
                    setTimeout(function(){
                        $('.alert-danger').addClass('d-none');
                    },3000);
                    console.log(res);
                    console.log('not');
                }
            }
        })
    }

})







})   

     </script>
</body>
</html>