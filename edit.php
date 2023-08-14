<?php
    require('./connection/config.php');

    if (isset($_POST['account_id'])) {

        $fruitsName = $_POST['editFruitsName'];
        $inStock = $_POST['editInStock'];
        $unit = $_POST['editUnit'];
        $imageUrl = $_POST['editImageUrl'];
        

        $query = "UPDATE fruits SET in_stock = '$inStock', unit_id = '$unit', imageurl = '$imageUrl' WHERE fruits_name = '$fruitsName'";
        $result = mysqli_query($connection, $query);

        echo "<script>alert('Successfully updated " . "$fruitsName!" . "')</script>";
        echo "<script>window.location.href='./index.php'</script>";
    } else {
        echo "<script>window.location.href='./index.php'</script>";
    }




?>