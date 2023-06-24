<?php
////////////////////////////////////////////////////////////////////////////////////
//             if($fileSize < 200000000){
//                 $uid = uniqid("",true);
//                 $fileFullName = $uid . "." . $fileActualExt;
//                 $tnFullName = "tn." .$fileFullName ;
//                 printf($fileFullName);
//                 $targetPath = $_SERVER['DOCUMENT_ROOT'] . "/image/gallery/". $fileFullName;
//                 //$fileDestination = "/image/gallery/" . $fileFullName;
//                 $fileDestination = $_SERVER['DOCUMENT_ROOT'] . "/Keshamantra/image/gallery/". $fileFullName;
//                 $tnDestination = $_SERVER['DOCUMENT_ROOT'] . "/Keshamantra/image/thumbnail/tn.". $fileFullName;
//                 if($fileType == 'image/jpeg' or $fileType == 'image/png'){
//                      $type = "image";
                     
//                      compressImg($fileDestination, $tnDestination, $fileType);
//                 }
//                 else{
//                      $type = "video";
//                      $tnFullName = "tn." .$uid . ".jpg";
//                      compressImg($fileDestination, $tnDestination, $fileType);
//                 }
                
//                 if(empty($fileDesc)) {
//                     header("Location: ../gallery.php?upload=empty_descrption");
//                     exit();
//                 }
//                 else {
//                   $sql = "SELECT * FROM gallery;";
//                   $stmt = mysqli_stmt_init($conn);
//                   if(!mysqli_stmt_prepare($stmt, $sql)){
//                      echo"SQL Statement failed!2";
//                      //header("location:../signup.php?error=stmt_failed2");
//                      //exit();
                     
//                   }
//                   else{
//                      mysqli_stmt_execute($stmt);
//                      $result = mysqli_stmt_get_result($stmt);
//                      // $rowCount = mysqli_num_rows($result);
//                      // $fileOrder = $rowCount + 1; 
//                      // echo "upload1";

//                      $sql = "INSERT INTO gallery (file_full_name, file_desc, file_type, tn_full_name ) VALUES(?, ?, ?, ?);";
//                      if(!mysqli_stmt_prepare($stmt, $sql)){
//                         echo"SQL Statement failed!3";
//                         //header("location:../signup.php?error=stmt_failed3");
//                         //exit();
//                      }
//                      else{
//                         // echo "upload";
//                         if(move_uploaded_file($fileTempName, $fileDestination)){
//                            echo $fileFullName;
//                            if(mysqli_stmt_bind_param($stmt,"ssss", $fileFullName, $fileDesc, $type, $tnFullName)){
//                               echo " \n true0 \n";
//                            }
//                            if(mysqli_stmt_execute($stmt)){
//                               echo 'true ';
//                            }
//                            else{
//                               echo "failed";
//                            }
//                            // compressImg($fileDestination, $tnDestination, $fileType);
//                         }
//                         else {
//                            echo "file not moved";
//                         }
//                         //chdir('../../');
//                         //echo chmod("../image",777);
                        
//                         //move_uploaded_file($fileTempName, $fileDestination);

//                         //header("Location: ../gallery.php?upload=successful"); 
//                         echo "last";
//                         // echo fileperms("../image");
//                         // echo getcwd();
//                      }
//                   }
//                 }
//             }
//             else{
//                 echo "File Size too big!";
//             }
//    /////////////////////////////////////////////////////////////////////////
//          }
//      }
//      else{
//         echo "File format not supported!";
//      }

// }
// else {
//    echo "no submit";
   
// }

?>