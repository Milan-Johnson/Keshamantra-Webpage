<?php
ini_set('display_errors',"1");

function user_idExists($conn, $userid){
    $sql = "SELECT * FROM users WHERE user_id = ?;";
    $stmt = mysqli_stmt_init($conn); 
    if(!mysqli_stmt_prepare($stmt,$sql)) {
        header("location:../signup.php?error=stmt_failed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$userid);
    mysqli_stmt_execute($stmt);
    
    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    
    mysqli_stmt_close(($stmt));
}

function createUser($conn, $userid, $password) {
    $sql = "INSERT INTO users (user_id, password_hash) VALUES (?, ?);";
    $stmt = mysqli_stmt_init($conn); 
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location:../signup.php?error=stmt_failed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ss", $userid, $password);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close(($stmt));
    header("location:../signup.php?error=signup_succesfull");
        exit();
}

function loginUser($conn, $userid, $password) {
    $uidExists = user_idExists($conn, $userid);

    if($uidExists === false) {
        header("location:../login.php?error=user_not_found");
        exit();
    }

    $password_hash = $uidExists["password_hash"];
    $chekPassword = password_verify($password,$password_hash);

    if($chekPassword === false) {
        header(("location:../login.php?error=wrong_login"));
        exit();
    }
    else if ($chekPassword === true) {
        session_start();
        $_SESSION["userid"] = $uidExists["userId"];
        header(("location:../index.html"));
        exit();
    }
}
function sizeCheck($fileSize,$fileFormat){
    if($fileFormat === 'image' and $fileSize < 200000000){
        return true;
    }
    else if($fileFormat === 'video' and $fileSize < 200000000){
        return true;
    }
    else{
        return false;
    }
}

function compressImg($fileFullname, $tnDestination, $fileType) {
    if($fileType == 'image/jpeg'){
        $image = imagecreatefromjpeg($fileFullname);
        imagejpeg($image, $tnDestination, 50);
    }
    else if ($fileType == 'image/png'){
        $image = imagecreatefrompng($fileFullname);
        imagepng($image, $tnDestination, 5);
    }
}