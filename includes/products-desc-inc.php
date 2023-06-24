<?php

ini_set('display_errors',"1");
echo "some1";
//echo ($_POST['submit']);

if(isset($_POST['submit'])) {
   // print_r($_POST);
   echo "some";
   $productName = $_POST['pr-name'];
   $productDesc = $_POST['pr-desc'];
   
   $productImg = $_FILES['pr-img'];

   if(empty($productName) or empty($productDesc) or empty($productImg)){
      header("location:../uploads.php?error=all_data_required");
      exit();
   }
   else{
      $newFileName = strtolower(str_replace(" ","-",$productName));

      $fileName = $productImg["name"];
      $fileType = $productImg["type"];
      $fileTempName = $productImg["tmp_name"];
      $fileError = $productImg["error"];
      $fileSize = $productImg["size"];

      $fileExt = explode(".",$fileName);
      $fileActualExt = strtolower(end($fileExt));
      $allowed = array("jpeg","jpg","png");
      echo "some2";
      if (in_array($fileActualExt,$allowed)){

         if($fileError === 0){
            if($fileSize < 20000000){
               $fileFullName = $newFileName . "." . uniqid("",true) . "." . $fileActualExt;
               $targetPath = $_SERVER['DOCUMENT_ROOT'] . "/image/products/". $fileFullName;
               $fileDestination = $_SERVER['DOCUMENT_ROOT'] . "/Keshamantra/image/products/". $fileFullName;

               require_once 'database-inc.php';

               $sql = "SELECT * FROM products;";
               $stmt = mysqli_stmt_init($conn);
               echo "some3";

               if(!mysqli_stmt_prepare($stmt, $sql)){
                  echo"SQL Statement failed!2";
               }
               // else {
               //    mysqli_stmt_execute($stmt);
               //    $result = mysqli_stmt_get_result($stmt);
               //    $rowCount = mysqli_num_rows($result);
               //    $fileOrder = $rowCount + 1; 

                  $sql = "INSERT INTO products ( p_name, p_desc, p_image) VALUES(?, ?, ?);";

                  if(!mysqli_stmt_prepare($stmt, $sql)){
                     echo"SQL Statement failed!";
                     
                  }
                  else{
                     if(move_uploaded_file($fileTempName, $fileDestination)){
                        mysqli_stmt_bind_param($stmt,"sss",$productName, $productDesc, $fileFullName);
                        mysqli_stmt_execute($stmt);
                        echo "some4";
                     }
                     else {
                        echo "file not moved";
                     }
                     
                     
                  }
               // }
            }
            else{
               echo "File Size too big!";
            }
         }
          
      }
      else {
         echo "File format not supported!";
      }
   }
}
?>