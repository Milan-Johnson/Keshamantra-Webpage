<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/contact.css">
    <title>Document</title>
</head>
<body>

    <section class="contact">
      <div>
    <?php include 'nav.html';?>

    
        <div class="container">
            <form action="contact-inc.php">
          
              <div class="input-field">
                <!-- <label for="name">Name</label> -->
              <input type="text" id="name" name="name" placeholder="Your name..">
              </div>
          
              <div class="input-field">
                <!-- <label for="p-number">Phone Number</label> -->
              <input type="text" id="p-number" name="p-number" placeholder="Your Phone no..">
            </div>
              <div class="input-field">
                <!-- <label for="subject">Addres</label> -->
              <textarea id="subject" name="subject" placeholder="Your Address..." style="height:100px"></textarea>
            </div>
              <div class="input-field">
                <!-- <label for="p-number">District</label> -->
              <input type="text" id="district" name="district" placeholder="Your district..">
            </div>
              <div class="input-field">
                <!-- <label for="p-number">PIN</label> -->
              <input type="text" id="pin" name="pin" placeholder="Your pin code..">
            </div>
              <div class="input-field">
                <!-- <label for="product">Product</label> -->
                <select id="product" name="product">

                <?php
                    
                    require_once 'includes/database-inc.php';
                    $sql = "SELECT * FROM product_details;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo "SQL statement failed";                     
                    }
                    else{
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        while($row = mysqli_fetch_assoc($result)){
                            $fullName= $row["p_full_name"];
                            
                            echo'<option value = '.$fullName.'> '.$fullName.'</option>';
                          }
                        }
                  ?>
                                
                    
                    

                

                <option value="hair-oil-100ml">Hair Oil 500ml</option>
                <option value="hair-oil-500ml">Hari Oil 100ml</option>
                <option value="other">Shampoo</option>
            </div>
              </select>
          
              
          
              <input type="submit" value="Submit">
              <!-- $order = "\n Product Name =". $productName . "\n Product Price = " .$productPrice . "\n Product Quantity = " . $productQnty . $productUnit;
                echo $order;

              echo '<a href="https://wa.me/9847128517?text='.$order.'">link</a>'; -->
              <!-- <a href="https://wa.me/9847128517?text=tesing wa">link</a> -->
              
            </form>
          </div>
          </div>
          
    </section> 
    <?php include 'footer.html';?>
</body>
</html>