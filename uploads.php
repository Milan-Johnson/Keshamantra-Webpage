<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/uploads.css">
    <title>Uploads</title>
</head>
<body>
<!-- <h3>Gallery Uploads</h3> -->
<div class="gallery-upload"><br>
        <form action="includes/gallery-inc2.php" method="post" enctype="multipart/form-data">
        <h3>Gallery Uploads</h3>
            <input type="text" name="file-name" placeholder="Name of File">
            <input type="text" name="file-desc"  placeholder="File Description">
            <input type="file" name="file"><br>
            <p>thumbnail if video</p> 
            <input type="file" name="tn-file">
            <button type="submit" name="submit">Upload</button>
        </form>
    </div>
    <br>

    <!-- <h3>Product with Description Uploads</h3> -->
    <div class="product-upload">
        <form action="includes/products-desc-inc.php" method="post" enctype="multipart/form-data">
        <h3>Product with Description Uploads</h3>
            
            <input type="text" name="pr-name"  placeholder="Product Name with Quantity">
            <textarea  name="pr-desc" placeholder="Product Description" style="height:100px"></textarea>
            <input type="file" name="pr-img">
            <button type="submit" name="submit">Upload</button>
        </form>
    </div>
    <br>
    <!-- <h3>Product with Quantity Uploads</h3> -->
    <form action="includes/products-details-inc.php" method="post" enctype="multipart/form-data">
    <h3>Product with Quantity Uploads</h3>
            <input type="text" name="pr-name"  placeholder="Product Name">
            <!-- <textarea  name="pr-desc" placeholder="Product Description" style="height:100px"></textarea> -->
            <input type="text" name="pr-quantity" style="width:60%" placeholder="Product Quantity in ml/gram">
            <select id="cars" name="pr-unit" style="width:20%";>
                <option value="ml" > ml</option>
                <option value="g">g</option> 
            </select>
            <input type="text" name="pr-price" placeholder="Product Price">
            <br><br><br><br>

            <button type="submit" name="submit">Upload</button>
            <br><br><br><br><br><br>
        </form>


</body>
</html>