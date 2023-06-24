<?php 
ini_set('display_errors',"1");
 

$_SESSION['user-id'] = "Admin";

?> 

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="./css/products.css">
    <title>products</title>
</head>
<body>
    <?php include 'nav.html';?>
    <!-- <section class="gallery-links"> -->
        

            <div class="container"> 
                    <?php
                        
                        require_once 'includes/database-inc.php';
                        $sql = "SELECT * FROM products;";
                        $stmt = mysqli_stmt_init($conn);
                        if(!mysqli_stmt_prepare($stmt,$sql)){
                            echo "SQL statement failed";                     
                        }
                        else{
                            mysqli_stmt_execute($stmt);
                            $result = mysqli_stmt_get_result($stmt);

                            while($row = mysqli_fetch_assoc($result)){

                                echo'<div class="product">
                                        <img src="image/products/'.$row["p_image"].'" >
                                        <div class="text-box">
                                            <h3>'.$row["p_name"].'</h3>
                                            <p> '.$row["p_desc"].' </p>
                                        </div>
                                    </div>';
                                    // echo'   
                                    //  <div>
                                    //     <a href = "image/gallery/'.$row["file_full_name"].'">
                                    //     <img class="thumbnail" src = "image/gallery/'.$row["file_full_name"].'">
                                    //     </a>
                                    //     </div>';
                            }
                        }
                    ?>
                <!-- ------------------------------- -->
                <div class="product">
                        <img src="image/gallery/.64653b138fc291.02189011.jpg" >
                        <div class="text-box">
                            <h3>Product</h3>
                            <p > Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec iaculis magna. Proin ornare ipsum nec tortor posuere elementum. Aenean justo mauris, placerat et pulvinar ac, consequat vitae purus. Cras aliquet velit ipsum, sed porttitor nibh aliquet nec. Integer rutrum consectetur fringilla. Nam sed leo suscipit, bibendum nisl et, vehicula lectus. Etiam metus dolor, posuere sed sapien eu, blandit tempor metus. Mauris at scelerisque est. Sed venenatis nisi purus, in tempus elit placerat in.
                                Quisque euismod arcu at mattis volutpat. Aliquam non arcu eget dui porttitor pretium. Morbi quis venenatis nibh, in molestie sapien. Aenean nec magna ut neque hendrerit ultrices. In a fermentum ante. Donec metus risus, pharetra et consectetur et, finibus vel magna. Vivamus tristique libero eu ex ultricies, eget sollicitudin elit efficitur. Quisque porta justo erat, vitae rhoncus eros semper a. In rhoncus mauris quis velit vehicula, tempus porta justo ullamcorper. Morbi justo nibh, posuere eu erat in, gravida posuere arcu. Etiam a erat justo.
                                Donec efficitur sollicitudin massa, ac interdum augue pulvinar ut. Integer id porttitor quam, et bibendum odio. Integer leo ante, semper nec accumsan ac, eleifend et libero. Nulla enim dui, interdum eleifend mi a, mollis condimentum ligula. Suspendisse vestibulum consectetur quam. Cras pharetra est sed vestibulum varius. Suspendisse potenti.
                            </p>
                        
                        </div>
                    </div>

                <div class="product">
                        <img src="image/gallery/.64653a3ac0ba41.16349515.png" >
                        <div class="text-box">
                            <h3>Product</h3>
                            <p > Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla nec iaculis magna. Proin ornare ipsum nec tortor posuere elementum. Aenean justo mauris, placerat et pulvinar ac, consequat vitae purus. Cras aliquet velit ipsum, sed porttitor nibh aliquet nec. Integer rutrum consectetur fringilla. Nam sed leo suscipit, bibendum nisl et, vehicula lectus. Etiam metus dolor, posuere sed sapien eu, blandit tempor metus. Mauris at scelerisque est. Sed venenatis nisi purus, in tempus elit placerat in.
                                Quisque euismod arcu at mattis volutpat. Aliquam non arcu eget dui porttitor pretium. Morbi quis venenatis nibh, in molestie sapien. Aenean nec magna ut neque hendrerit ultrices. In a fermentum ante. Donec metus risus, pharetra et consectetur et, finibus vel magna. Vivamus tristique libero eu ex ultricies, eget sollicitudin elit efficitur. Quisque porta justo erat, vitae rhoncus eros semper a. In rhoncus mauris quis velit vehicula, tempus porta justo ullamcorper. Morbi justo nibh, posuere eu erat in, gravida posuere arcu. Etiam a erat justo.
                                Donec efficitur sollicitudin massa, ac interdum augue pulvinar ut. Integer id porttitor quam, et bibendum odio. Integer leo ante, semper nec accumsan ac, eleifend et libero. Nulla enim dui, interdum eleifend mi a, mollis condimentum ligula. Suspendisse vestibulum consectetur quam. Cras pharetra est sed vestibulum varius. Suspendisse potenti.
                            </p> 
                         </div>
                        
                </div>
            </div>

           
            

       
        
    </section> 
</body>
<?php include 'footer.html';?>
</html>