<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Keshamantra</title>

    <link rel="stylesheet" href="./style.css">
</head>
<body>
    
    <section class="hero-section">
    <?php include 'nav.html';?>
        <div class="hero-content">
            <h1><span>Keshamantra</span></h1>
            <h3>Herbal Hair Care Products</h3>
        
            <div class="hero-btn">
                <a href="">Contact Us</a>
            </div>
        </div>
     </section>

     <!-- -------------------------------------------------------//products//------------------------------------------------------- -->
     
     <section class="products">
              
      <div class="product-scroller">
          <!-- <div class="product-element">
            <img class="product-img" src="image/gallery/.64653b138fc291.02189011.jpg" >
            <p class="product-title">Product name</p>
          </div> -->
          <?php
                    
                    require_once 'includes/database-inc.php';
                    $sql = "SELECT * FROM products ORDER BY p_id DESC;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo "SQL statement failed1";                     
                    }
                    else{
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        while($row = mysqli_fetch_assoc($result)){
                            
                           
                                echo'    
                                <div class="product-element">
                                    
                                    <img class="product-img" src = "image/products/'.$row["p_image"].'">
                                    <p class="product-title">'.$row["p_name"].'</p>
                                    
                                </div>
                                    ';
                            
                        }       
                    }
                    

                ?>
          
      </div>
<!-- 
      <h1>Products</h1>
      <p>It is a long established fact that a reader will be distracted by the readable content of a page</p>
      <div class="product-row">
       <div class="product-col">
         <h3>Hair Oil</h3>
         <img src="image/product.jpg" alt="">

         <p>
           It is a long established fact that a reader will be distracted by the readable content of a page when 
           looking at its layout. The point of g itIt is a long established fact that a reader wil
           l be distracted by the readable content of a page when looking at its layout. The point of g it
         </p>
       </div>

       <div class="product-col">
         <h3>Hair Shampoo</h3>
         <img src="image/product.jpg" alt="">

         <p>
           It is a long established fact that a reader will be distracted by the readable content of a page when 
           looking at its layout. The point of g itIt is a long established fact that a reader wil
           l be distracted by the readable content of a page when looking at its layout. The point of g it
         </p>
       </div>
      </div> -->

     </section>

    <section class="why-keshamantra">
       <h1>Why Keshamantra?</h1>
       <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of g itIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of g it</p>

    </section>

    <!-- <section class="footer">
      <h4>Keshamantra</h4>
      <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of g itIt is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of g it</p>
    </section> -->
    <?php include 'footer.html';?>



<!--      ---Java Script for Menue---      -->

<script>
  var navLinks = document.getElementById("navLinks")

  function showMenue() {
    navLinks.style.right = "0px";
  }

  function hideMenue() {
    navLinks.style.right = "-200px";
  }
</script>

</body>
</html>