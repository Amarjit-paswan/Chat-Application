<?php 

include('database.php');
// User Register Values start
if(isset($_POST['action']) && $_POST['action'] == 'add'){
    $name = $_POST['S_name'];
    $email = $_POST['S_email'];
    $password = $_POST['S_password'];
    if(isset($_FILES['S_file'])){

    $image_name = $_FILES['S_file']['name'];
    $temp_name = $_FILES['S_file']['tmp_name'];

   if(move_uploaded_file($temp_name,"../images/".$image_name)){
    $test = new Users();
    $test->addUser($name,$email,$password,$image_name);
   }else{
    echo "Error uploading file: " . $_FILES['S_file']['error'];
   }

}else{
    echo "not include";
}
// User Register Values end

   
}

// Login User Values Start
if(isset($_POST['action']) && $_POST['action'] == 'login'){
    $email = $_POST['L_email'];
    $password = $_POST['L_password'];

    $test = new Users();
    $test->loginUser($email,$password);
}else{
    echo "false";
    die();
}
// Login User Values end

//Message Send 




?>
