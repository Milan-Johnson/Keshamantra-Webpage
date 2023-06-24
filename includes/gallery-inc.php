<?php

ini_set('display_errors',"1");
echo "some1";

//echo ($_POST['submit']);
require_once 'database-inc.php';
require_once 'functions-inc.php';


if(isset($_POST['submit'])) {
   // print_r($_POST);
   echo "some";
     $newFileName = $_POST['file-name'];
     if($_POST['file-name']) {
        $newFileName = "gallery";
     }
     else {
        $newFileName = strtolower(str_replace(" ","-",$newFileName));
     }
     //$FileTitle = $_POST['file-title'];
     $fileDesc = $_POST['file-desc'];
     
     $file= $_FILES["file"];
   //   print_r($_FILES);
     
     
     $fileName = $file["name"];
     $fileType = $file["type"];
     $fileTempName = $file["tmp_name"];
     $fileError = $file["error"];
     $fileSize = $file["size"];

   //   $tnile= $_FILES["tn-file"];
   // //   print_r($_FILES);
     
     
   //   $fileName = $tnile["name"];
   //   $fileType = $tnile["type"];
   //   $fileTempName = $tnile["tmp_name"];
   //   $fileError = $tnile["error"];
   //   $fileSize = $tnile["size"];

   //   printf($fileName);
   //   echo "c\n";

     $fileExt = explode(".",$fileName);
     //echo' ext: ';
     //print_r($fileExt);
     $fileActualExt = strtolower(end($fileExt));
     //print_r($fileActualExt);

     $allowed = array("jpeg","jpg","png","mp4");

     if (in_array($fileActualExt,$allowed)){
        if($fileError === 0){
            if($fileSize < 200000000){
                $uid = uniqid("",true);
                $fileFullName = $uid . "." . $fileActualExt;
                $tnFullName = "tn." .$fileFullName ;
                printf($fileFullName);
                $targetPath = $_SERVER['DOCUMENT_ROOT'] . "/image/gallery/". $fileFullName;
                //$fileDestination = "/image/gallery/" . $fileFullName;
                $fileDestination = $_SERVER['DOCUMENT_ROOT'] . "/Keshamantra/image/gallery/". $fileFullName;
                $tnDestination = $_SERVER['DOCUMENT_ROOT'] . "/Keshamantra/image/thumbnail/tn.". $fileFullName;
                if($fileType == 'image/jpeg' or $fileType == 'image/png'){
                     $type = "image";
                }
                else{
                     $type = "video";
                     $tnFullName = "tn." .$uid . ".jpg";
                }
                
                if(empty($fileDesc)) {
                    header("Location: ../gallery.php?upload=empty_descrption");
                    exit();
                }
                else {
                  $sql = "SELECT * FROM gallery;";
                  $stmt = mysqli_stmt_init($conn);
                  if(!mysqli_stmt_prepare($stmt, $sql)){
                     echo"SQL Statement failed!2";
                     //header("location:../signup.php?error=stmt_failed2");
                     //exit();
                     
                  }
                  else{
                     mysqli_stmt_execute($stmt);
                     $result = mysqli_stmt_get_result($stmt);
                     // $rowCount = mysqli_num_rows($result);
                     // $fileOrder = $rowCount + 1; 
                     // echo "upload1";

                     $sql = "INSERT INTO gallery (file_full_name, file_desc, file_type, tn_full_name ) VALUES(?, ?, ?, ?);";
                     if(!mysqli_stmt_prepare($stmt, $sql)){
                        echo"SQL Statement failed!3";
                        //header("location:../signup.php?error=stmt_failed3");
                        //exit();
                     }
                     else{
                        // echo "upload";
                        if(move_uploaded_file($fileTempName, $fileDestination)){
                           echo $fileFullName;
                           if(mysqli_stmt_bind_param($stmt,"ssss", $fileFullName, $fileDesc, $type, $tnFullName)){
                              echo " \n true0 \n";
                           }
                           if(mysqli_stmt_execute($stmt)){
                              echo 'true ';
                           }
                           else{
                              echo "failed";
                           }
                           compressImg($fileDestination, $tnDestination, $fileType);
                        }
                        else {
                           echo "file not moved";
                        }
                        //chdir('../../');
                        //echo chmod("../image",777);
                        
                        //move_uploaded_file($fileTempName, $fileDestination);

                        //header("Location: ../gallery.php?upload=successful"); 
                        echo "last";
                        // echo fileperms("../image");
                        // echo getcwd();
                     }
                  }
                }
            }
            else{
                echo "File Size too big!";
            }
        }
     }
     else{
        echo "File format not supported!";
     }

}
else {
   echo "no submit";
   
}

?>