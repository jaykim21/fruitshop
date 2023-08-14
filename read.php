<?php 
    require('./connection/config.php');

    $sort = "ASC";
    $col = "fruits_id";

    if (isset($_GET['col']) && isset($_GET['sort'])) {
        $col = $_GET['col'];
        $sort = $_GET['sort'];

        ($sort == "ASC") ? $sort = "DESC" : $sort = "ASC";
    };

    $query = "SELECT * FROM fruits ORDER BY $col $sort";

    $result = mysqli_query($connection, $query);

?>