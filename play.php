<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery Display</title>
</head>
<body>
    <?php
        $file = $_GET["file"];
        $id = $_GET['id'];
        $path = "image/gallery/".$file;
        echo'<video src='.$path.' autoplay="" controls=""></video>';

        require_once 'includes/database-inc.php';
        $sql = "SELECT file_desc FROM gallery WHERE file_id = $id;";
        $stmt = mysqli_stmt_init($conn);
        mysqli_stmt_prepare($stmt,$sql);                    
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $row = mysqli_fetch_assoc($result);
        echo $row['file_desc'];

    ?>
    <!-- <video src=$path autoplay="" controls=""></video> -->
    
    
</body>
</html>