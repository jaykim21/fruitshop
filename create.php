<?php 
    require('./connection/config.php');

    if(isset($_POST['create'])){
        $fldFruitName = $_POST['fruits_name'];
        $fldInStock = $_POST['in_stock'];
        $fldUnit = $_POST['unit_id'];
        $fldImageUrl = $_POST['imageurl'];

        $query = "INSERT INTO fruits(fruits_name, in_stock, unit_id, imageurl) VALUES('$fldFruitName', '$fldInStock', '$fldUnit', '$fldImageUrl')";

        $result = mysqli_query($connection, $query) || trigger_error("Query failed $query" . mysqli_error($connection), E_USER_ERROR);
        
        echo "<script>alert('Successfully created')</script>";
        // echo "<script>window.location.href - 'index.php'</script>";
        header("location: index.php");
    } else {
        // echo "<script>window.location.href - 'index.php'</script>";
        header("location: index.php");
    }

?>