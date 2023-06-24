<?php 
ini_set('display_errors',"1");

if(isset($_POST["submit"])){
    
    $userId = $_POST["userid"];
    $password = $_POST["password"];
    $passwordRepeat = $_POST["password-repeat"];
    
    require_once 'database-inc.php';
    require_once 'functions-inc.php';


    if (empty($userId)) {
        // die("User id is required");
        header("location:../signup.php?error=user_id_required");
        exit();
    }
    
    if (strlen($password)<8) {
        header("location:../signup.php?error=no_8_char");
        exit();
    }
    
    
    if( ! preg_match("/[a-z]/i", $password)) {
        header("location:../signup.php?error=no_letter");
        exit();
    }

    if( ! preg_match("/[0-9]/", $password)) {
        header("location:../signup.php?error=no_number");
        exit();
    }
    
    if($password !== $passwordRepeat) {
        header("location:../signup.php?error=psd_not_match");
        exit();
    }
   
    if(user_idExists($conn, $userId) !== false) {
        header("location:../signup.php?error=user_name_taken");
        exit();
    }
        
    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    createUser($conn, $userId, $password_hash);
        header("location:../signup.php?error=none");
        exit();
    
    //print_r($_POST);


}
else {
    header("location:../signup.php");
}


?>