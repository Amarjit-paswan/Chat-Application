$(document).ready(function(){



    // Register Account Code Start
    $('#s_submit').click(function(e){
        e.preventDefault();
        
        //Store all value of details
        let name = $('#s_name').val();
        let email = $('#s_email').val();
        let password = $('#s_password').val();
        let name_regx = /^[a-zA-z]{4,}$/;
        let file = $('#s_file').val();
        let fileInput = $('#s_file');

      

        function extension(filename){
            let extension = ['png','jpeg','jpg'];
            let file_extension = filename.split('.').pop();
            let lowercase = file_extension.toLowerCase();
            let check = extension.includes(lowercase);
            if(!check){
                $('.alert-danger').removeClass('d-none');
                 $('.alert-danger').html('Image file must be PNG, JPEG, JPG...');
                setTimeout(function(){
                $('.alert-danger').addClass('d-none');
                },3000);
                }
            return check;
        }
        
        // Displaying if user give any uncorrect details
        if(name === '' || email === '' || password === '' || file === ''){
            $('.alert-danger').removeClass('d-none');
            $('.alert-danger').html('All Fields are require...');
            setTimeout(function(){
            $('.alert-danger').addClass('d-none');
            },3000);
        }else if(!name_regx.test(name)){
            $('.alert-danger').removeClass('d-none');
            $('.alert-danger').html('Name must be 4 letter or more...');
            setTimeout(function(){
            $('.alert-danger').addClass('d-none');
            },3000);
        }else if(password.length < 5){
            $('.alert-danger').removeClass('d-none');
            $('.alert-danger').html('Password length must be minimum 5 letters...');
            setTimeout(function(){
            $('.alert-danger').addClass('d-none');
            },3000);
        }else if(!extension(file)){
            // All function code will execute here
        }else{
            let formData = new FormData($('#signForm')[0]);
            formData.append('action', 'add');
            $.ajax({
                url:'backend/action.php',
                type:'POST',
                data:formData,
                contentType: false,
                processData: false,
                success:function(res){
                    if(res === 'email exists'){
                            $('.alert-danger').removeClass('d-none');
                            $('.alert-danger').html('Email already exists...');
                            setTimeout(function(){
                            $('.alert-danger').addClass('d-none');
                            },3000);
                        }else{
                            $('.loading').removeClass('d-none');
                            setTimeout(function(){
                                $('.loading').addClass('d-none');
                                $('#signForm').trigger('reset');
                                window.location.href = 'login.php';
                                console.log(res);
                            },3500)
                        }
                            }
            })
        }
    })
    // Register Account Code end

// ------------------------------------------------------------------------------






})