<?php 
ini_set('display_errors',"1");

if(isset($_POST["submit"])){
    $userid = $_POST["uid"];
    $password = $_POST["pwd"];

    require_once 'database-inc.php';
    require_once 'functions-inc.php';

    if (empty($userid)) {
        // die("User id is required");
        header("location:../login.php?error=user_id_required");
        exit();
    }
    
    if (strlen($password)<8) {
        header("location:../login.php?error=no_8_char");
        exit();
    }

    loginUser($conn, $userid, $password);

}
else {
    header("location:../login.php");
    exit();
}


?>