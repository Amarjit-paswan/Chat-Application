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
    <style>
         ul{
            list-style: none;
            padding: 5px;
        }

        .pass li{
            /* width: 9rem; */
            font-size: 13px;
        }

        .pass  li span::before{
            content: ' 🔘';
            
        }

        .pass  li.active span::before{
            content: ' ✅';
            
        }

        .cursor1{
            cursor: not-allowed;
            user-select: none;
        }

        #reload{
            cursor: pointer;
        }

        .password{
    position: relative;
}

.eye{
    position: absolute;
    top: 50px;
    right: 1rem;
    font-size: 18px;
    color: grey;
}

.fa-eye:hover{
    color: black;
}

    </style>
</head>

<body class="bg-light">
    <!-- User Registration Form starts here -->
    <div class="container">
        <div class="row vh-100 d-flex justify-content-center align-items-center">
            <div class="col-4  border border-secondary rounded bg-white p-0  pb-3 ">
                <div class="col-12 text-white text-center  bg-success p-2 py-4 ">
                    <h1 class="">AJ_ChatApp</h1>
                </div>
                <div class="col-12 p-3 ">
                    <div class="col-12 mt-3">

                        <!-- form for Register Details start here -->
                        <form action="" id="signForm" enctype="multipart/form-data" autocomplete="off">
                            <div class="alert d-none alert-danger" role="alert">
                              </div>

                              <!-- When form Data will successfull this spin will active -->
                              <div class="col-12 d-flex justify-content-center align-items-center d-none loading">
                                <button class="btn btn-primary" type="button" disabled>
                                    <span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>
                                    Loading...
                                </button>
                              </div>
                            <div class="mb-3">
                                <label for="" class="form-label fs-5">Name</label>
                                <input type="text" name="S_name" id="s_name" class="form-control border border-secondary" placeholder="Enter Your Name...">
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label fs-5">Email</label>
                                <input type="text" name="S_email" id="s_email" class="form-control border border-secondary" placeholder="Enter Your Email...">
                            </div>
                            <div class="mb-3 password">
                                <label for="" class="form-label fs-5">Password</label>
                                <input type="password" name="S_password" id="s_password" class="form-control border border-secondary" placeholder="Enter Your Password...">
                                <i class="fa-solid fa-eye eye" onclick="passwordShow()"></i>
                                <i class="fa-solid eye d-none fa-eye-slash" onclick="passwordShow()"></i>
                                <ul class=" pass d-flex justify-content-around align-items-center ">
                                    <li class="s_letter"><span></span>Small letter </li>
                                    <li class="o_symbol"><span></span>One Symbol </li>
                                    <li class="o_num"><span></span>One Number </li>
                                    <li class="character"><span></span>8 Character </li>
                                </ul>
                                
                            </div>
                            <div class="mb-3">
                                <label for="" class="form-label fs-5">Upload a Image</label>
                                <input type="file" name="S_file" id="s_file" class="form-control border border-secondary" placeholder="Enter Your Password...">
                            </div>
                            <input type="submit" value="SignUp" id="s_submit" name="S_submit" class="btn btn-success float-end">
                        </form>
                        <!-- form for Register Details end here -->

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- User Registration Form end here -->

    <!-- Jquery Cdn Link -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <!-- Javascript file Link -->
    <script src="script.js"></script>
    <script>
      function password_valid(){
    $('#s_password').on('focus',function(){
    $('.pass').removeClass('d-none');
        })
        // $('#s_password').on('blur',function(){
        //     $('.pass').addClass('d-none');
        // })

        $('#s_password').on('keyup',function(){
            passValue = $(this).val();

            if(passValue.match(/[a-z]/g)){
                $('.s_letter').addClass('active');
            }else{
                $('.s_letter').removeClass('active');

            }
            if(passValue.match(/[0-9]/g)){
                $('.o_num').addClass('active');
            }else{
                $('.o_num').removeClass('active');

            }
            if(passValue.match(/[!@#$%^&*]/g)){
                $('.o_symbol').addClass('active');
            }else{
                $('.o_symbol').removeClass('active');

            }

            if(passValue.length == 8 || passValue.length > 8){
                $('.character').addClass('active');
            }else{
                $('.character').removeClass('active');
            }
        })
}

function passwordShow(){

let passwordinput = $('#s_password');
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


password_valid();

    </script>
</body>
</html>