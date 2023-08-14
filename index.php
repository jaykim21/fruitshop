<?php
    require("./read.php");
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fruit Shop</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    </head>
    <body>
        <h3>Create Fruit</h3>
        <form action="./create.php" method="POST">
        <input id="fruits_name" name="fruits_name" type="text" placeholder="Enter Fruit Name">

        <input id="in_stock" name="in_stock" type="text" placeholder="Enter In Stock">
        
        <select id="unit_id" name="unit_id">
            <option value="" readonly>Select Unit</option>
            <option id="unit_id" name="unit_id" value="1">Kilogram/s</option>
            <option id="unit_id" name="unit_id" value="2">Gram/s</option>
            <option id="unit_id" name="unit_id" value="3">Piece/s</option>
            <option id="unit_id" name="unit_id" value="4">Pound/s</option>
            <option id="unit_id" name="unit_id" value="5">Box/es</option>
            <option id="unit_id" name="unit_id" value="6">Sack/s</option>
        </select>

        <input id="imageurl" name="imageurl" type="file" placeholder="Select a file">
        
        <input id="create" name="create" type="submit" value="Create" class="btn btn-primary">

        </form>
        <?php
        if (mysqli_num_rows($result) > 0){
        ?>
        
        <table class="table table-striped mt-5 w-50">
            <thead>
                <tr>
                    <th>
                        <a class="text-decoration-none" href="?col=fruits_name&sort=<?php echo $sort?>">Fruit Name</a>
                    </th>
                    <th>
                        <a class="text-decoration-none" href="?col=in_stock&sort=<?php echo $sort?>">In Stock</a>
                    </th>
                    <th>
                        <a class="text-decoration-none" href="?col=unit_id&sort=<?php echo $sort?>">Unit</a>
                    </th>
                    <th>
                        <a class="text-decoration-none" href="?col=imageurl&sort=<?php echo $sort?>">Image URL</a>
                    </th>
                    <th>
                        Action
                    </th>
                </tr>
            </thead>
            <tbody>
                <?php
                    while ($row = mysqli_fetch_array($result)){
                        
                ?>
                <tr>
                    <td><?php echo $row["fruits_name"]; ?></td>
                    <td><?php echo $row["in_stock"]; ?></td>
                    <td><?php echo $row["unit_id"]; ?></td>
                    <td><?php echo $row["imageurl"]; ?></td>
                    <td>
                        <form action="./edit.php" method="POST">
                            <button class='btn btn-warning btn-sm p-2' type="button" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $row['fruits_id']?>">Edit</button>
                            <input type="hidden" name="account_id" value=<?php echo $row['fruits_id']?>>
                            <!-- MODAL -->
                            <div class="modal fade" id="exampleModal<?php echo $row['fruits_id']?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" role="dialog">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fw-bold" id="exampleModalLabel">Edit User <span class="text-primary"><?php echo $row['fruits_name'] ?></span>.</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body d-flex flex-column row-gap-3">
                                            <div class="form-group row">
                                                <label for="editFruitsName" class="col-sm-3 col-form-label">Fruits Name</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="editFruitsName" name="editFruitsName" value="<?php echo $row['fruits_name']?>" readonly>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="editInStock" class="col-sm-3 col-form-label">In Stock</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="editInStock" name="editInStock" value="<?php echo $row['in_stock']?>">
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="editUnit" class="col-sm-3 col-form-label">Gender</label>
                                                <div class="col-sm-9">
                                                    <select name="editUnit" id="editUnit" class="form-select">
                                                        <option value="" disabled>Select Unit</option>
                                                        <option value="1" <?php echo ($row['unit_id'] == "Kilogram/s") ? "selected" : "" ;?>>Kilogram/s</option>
                                                        <option value="2" <?php echo ($row['unit_id'] == "Gram/s") ? "selected" : "" ;?>>Gram/s</option>
                                                        <option value="3" <?php echo ($row['unit_id'] == "Piece/s") ? "selected" : "" ;?>>Piece/s</option>
                                                        <option value="4" <?php echo ($row['unit_id'] == "Pound/s") ? "selected" : "" ;?>>Pound/s</option>
                                                        <option value="5" <?php echo ($row['unit_id'] == "Box/es") ? "selected" : "" ;?>>Box/es</option>
                                                        <option value="6" <?php echo ($row['unit_id'] == "Sack/s") ? "selected" : "" ;?>>Sack/s</option>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="form-group row">
                                                <label for="editImageUrl" class="col-sm-3 col-form-label">Image URL</label>
                                                <div class="col-sm-9">
                                                    <input type="text" class="form-control" id="editImageUrl" name="editImageUrl" value="<?php echo $row['imageurl']?>" readonly>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" class="btn btn-primary">Save changes</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </td>


                    <td>
                        <form action="./delete.php" method="POST">
                            <input class="btn btn-danger" id="delete" name="delete" type="submit" value="delete" onclick="return confirm('Are you sure you want to delete this record?')">
                            <input id="account_id" name="account_id" type="hidden" value="<?php echo $row['fruits_id']; ?>">
                        </form>
                    </td>
                </tr>
                <?php
                    };
                ?>
            </tbody>
        </table>
        <?php
            } else{
                echo "<div class='alert alert-danger'>No records were found</div>";
            }
        ?>  





        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    </body>
</html>