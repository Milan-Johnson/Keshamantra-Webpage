<?php
// print_r($_FILES);
// $tnFile= $_FILES["tn-file"];
//    $fileName = $tnFile["name"];
//    $fileType = $tnFile["type"];
//    $fileTempName = $tnFile["tmp_name"];
//    $fileError = $tnFile["error"];
//    $fileSize = $tnFile["size"];

     //print_r($tnFile);
ini_set('display_errors',"1");
// echo "some1";
require_once 'database-inc.php';
require_once 'functions-inc.php';


if(isset($_POST['submit'])) {

     $fileDesc = $_POST['file-desc'];
     
     $file= $_FILES["file"];    
      $fileName = $file["name"];
      $fileType = $file["type"];
      $fileTempName = $file["tmp_name"];
      $fileError = $file["error"];
      $fileSize = $file["size"];


     $tnFile= $_FILES["tn-file"];
      $tnFileName = $tnFile["name"];
      $tnFileType = $tnFile["type"];
      $tnFileTempName = $tnFile["tmp_name"];
      $tnFileError = $tnFile["error"];
      $tnFileSize = $tnFile["size"];

     //printf($fileName);

     $temp = explode("/",$fileType);
     $fileFormat = $temp[0];
     $fileExtn = $temp[1];

     $temp = explode("/",$tnFileType);
     $tnFileExtn = $temp[1];
     
   //   echo $tnFileExtn;


     //$allowed = array("jpeg","jpg","png","mp4");

     //if (in_array($fileExt,$allowed)){
      if($fileError === 0){
         if(sizeCheck($fileSize,$fileFormat)){
            $uid = uniqid("",true);
            $fileFullName = $uid . "." . $fileExtn;
            $fileDestination = $_SERVER['DOCUMENT_ROOT'] . "/Keshamantra/image/gallery/". $fileFullName;
            
            move_uploaded_file($fileTempName, $fileDestination);
               if($fileFormat === 'image'){
                  $tnFullName = "tn." .$fileFullName ;
                  //$tnDestination = $_SERVER['DOCUMENT_ROOT'] . "/Keshamantra/image/thumbnail/tn.". $fileFullName;
                  compressImg($fileDestination, $tnDestination, $fileType);
               }
               else if($fileFormat === 'video'){
                  $tnFullName = "tn." . $uid .".". $tnFileExtn;
                  echo $tnFullName;
                  $tnFileDestination = $_SERVER['DOCUMENT_ROOT'] . "/Keshamantra/image/thumbnail/". $tnFullName;
                  move_uploaded_file($tnFileTempName, $tnFileDestination);
                  compressImg($tnFileDestination, $tnFileDestination, $fileType);
               }
               
            
            $sql = "INSERT INTO gallery (file_full_name, file_desc, file_type, tn_full_name ) VALUES(?, ?, ?, ?);";

            $stmt = mysqli_stmt_init($conn);
            if(mysqli_stmt_prepare($stmt, $sql)){
               mysqli_stmt_bind_param($stmt,"ssss", $fileFullName, $fileDesc, $fileFormat, $tnFullName);
               echo mysqli_error($conn);
               if(!mysqli_stmt_execute($stmt)){
                  echo "failed";
                  echo mysqli_error($conn);
               }
            }
            else
               echo "file not moved"; 
         }
      }
   }
//}
         
?>