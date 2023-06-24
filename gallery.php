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

    <link rel="stylesheet" href="./css/gallery.css">
    <title>Gallery</title>
</head>
<body>
    <?php include 'nav.html';?>
    <section class="gallery-links">
        <div class="wrapper">

            <h2>Gallery</h2>

            <div class="container">
                <?php
                    
                    require_once 'includes/database-inc.php';
                    $sql = "SELECT * FROM gallery ORDER BY file_id DESC;";
                    $stmt = mysqli_stmt_init($conn);
                    if(!mysqli_stmt_prepare($stmt,$sql)){
                        echo "SQL statement failed1";                     
                    }
                    else{
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        while($row = mysqli_fetch_assoc($result)){
                            
                            if($row["file_type"] === 'video'){ 
                                //echo'
                                // <div>
                                // <a href = "image/gallery/'.$row["file_full_name"].'">
                                // <img class="thumbnail" src = "image/thumbnail/'.$row["tn_full_name"].'">
                                // </a>
                                // </div>';
                                echo'
                                <div>
                                <a href = "play.php?file='.$row["file_full_name"].'&id='.$row["file_id"].'">
                                <img class="thumbnail" src = "image/thumbnail/'.$row["tn_full_name"].'">
                                </a>
                                </div>';


                            }
                            else{
                                echo'    <div>
                                    <a href = "image/gallery/'.$row["file_full_name"].'">
                                    <img class="thumbnail" src = "image/thumbnail/'.$row["tn_full_name"].'">
                                    </a>
                                    </div>';
                            }
                        }       
                    }
                    

                ?>
                

            </div>

            <?php
            
            if(isset($_SESSION['user-id']))
            
            echo'<div class="gallery-upload">
                    <form action="includes/gallery-inc.php" method="post" enctype="multipart/form-data">
                        <input type="text" name="file-name" placeholder="Name of File">
                        <input type="text" name="file-desc"  placeholder="File Description">
                        <input type="file" name="file">
                        <button type="submit" name="submit">Upload</button>
                    </form>
                </div>'
   
        ?>
            

        </div>
    </section>
    <?php include 'footer.html';?>
    
</body>
</html>