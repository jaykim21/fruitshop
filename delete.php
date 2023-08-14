<?php 
    require('./connection/config.php');

    if(isset($_POST['delete'])) {
        $id = $_POST['account_id'];
        $query = "DELETE FROM fruits WHERE fruits_id= $id";
        $result = mysqli_query($connection, $query);
        echo "<script>alert('Successfully deleted')</script>";
        header("location: index.php");
    } else {
        header("location: index.php");
    }
?>