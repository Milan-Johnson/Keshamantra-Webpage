<?php

ini_set('display_errors',"1");
echo "some1";
//echo ($_POST['submit']);

if(isset($_POST['submit'])) {
   // print_r($_POST);
   echo "some";
   $productName = $_POST['pr-name'];
   $productQnty = $_POST['pr-quantity'];
   $productUnit = $_POST['pr-unit'];
   $productPrice = $_POST['pr-price'];
   
    print_r($_POST);
   $productQnty = $productQnty.$productUnit;
   $productFullName= $productName." ".$productQnty;
   echo $productQnty;

// $order = "\n Product Name =". $productName . "\n Product Price = " .$productPrice . "\n Product Quantity = " . $productQnty . $productUnit;
// echo $order;

// echo '<a href="https://wa.me/9847128517?text='.$order.'">link</a>';
   require_once 'database-inc.php';

   $sql = "INSERT INTO product_details (p_full_name, price) VALUES(?, ?);";
   $stmt = mysqli_stmt_init($conn);
   if(!mysqli_stmt_prepare($stmt, $sql)){
      echo"SQL Statement failed!3";
   }
   else{
      
         mysqli_stmt_bind_param($stmt,"ss", $productFullName, $productPrice);
         mysqli_stmt_execute($stmt);
      
   }

}