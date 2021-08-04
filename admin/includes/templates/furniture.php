

<?php

   if(isset($_GET['add']))
   {
       include 'includes/templates/addFurniture.php';
   }
   elseif(isset($_GET['edit']))
   {
       include 'includes/templates/editFurniture.php';
   }
   elseif(isset($_GET['hide']))
   {
       include 'includes/templates/hideFurniture.php';
   }
   elseif(isset($_GET['show']))
   {
       include 'includes/templates/showFurniture.php';
   }
   elseif(isset($_GET['delete']))
   {
    $deleteFurniture = $db -> prepare('DELETE FROM furniture WHERE ID = ?');
    $deleteFurniture->execute(array($_GET['delete']));
    header('location: index.php?page=furniture');
   }
   else
   {
    $getFurniture = $db -> prepare('SELECT * FROM furniture');   // view
    $getFurniture->execute();      // execute
    $furnitures = $getFurniture->fetchAll();     // array
    ?>



    <div class="container" style="margin:100px auto">
        <a href="index.php?page=furniture&add" class="btn btn-primary">Add</a> <br> <br>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Description</th>
                <th scope="col">Price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Rate</th>
                <th scope="col">Options</th>
                <th scope="col">Show</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($furnitures as $furniture){
                ?>
                <tr>
                    <td>
                        <?php echo $furniture['ID'] ?>
                    </td>
                    <td>
                        <?php echo $furniture['Name'] ?>
                    </td>
                    <td>
                        <img src="../uploads/<?php echo $furniture['Image'] ?>" height="200" width="200">
                    </td>
                    <td>
                        <?php echo $furniture['Description'] ?>
                    </td>
                    <td>
                        <?php echo $furniture['Price'] ?>
                    </td>
                    <td>
                        <?php echo $furniture['Quantity'] ?>
                    </td>
                    <td>
                        <?php echo $furniture['Rate'] ?>
                    </td>
                    <td>
                        <a href="index.php?page=furniture&delete=<?php echo $furniture['ID'] ?>" class="btn btn-danger">Delete</a>
                        <a href="index.php?page=furniture&edit=<?php echo $furniture['ID'] ?>" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                        <?php
                        if($furniture['Hide'] == 0){
                            ?>
                            <a href="index.php?page=furniture&hide=<?php echo $furniture['ID'] ?>" class="btn btn-success">On</a>
                            <?php
                        } else {
                            ?>
                            <a href="index.php?page=furniture&show=<?php echo $furniture['ID'] ?>" class="btn btn-danger">Off</a>
                            <?php
                        }
                        ?>
                    </td>
                </tr>
                <?php
            }
            ?>
            </tbody>
        </table>
    </div>


    <?php
}
?>









































