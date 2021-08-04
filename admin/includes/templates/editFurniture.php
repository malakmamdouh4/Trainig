


<?php
$getFurniture = $db -> prepare('SELECT * FROM furniture WHERE id= ?');   // view
$getFurniture->execute(array($_GET['edit']));      // execute
$furniture = $getFurniture->fetch();     // select one array that be updated


$getCategories = $db->prepare('SELECT * FROM category');
$getCategories->execute();
$categories = $getCategories->fetchAll();


$getProviders = $db -> prepare('SELECT * FROM providers');   // view
$getProviders->execute();      // execute
$providers = $getProviders->fetchAll();     // array




if($_SERVER['REQUEST_METHOD'] == 'POST'){
    try{
        $editFurniture = $db ->prepare('UPDATE furniture SET Name = ? , Image = ? , Description = ? , Price = ? , 
            Quantity = ? , Rate = ? , ProviderId = ? , CategoryId = ? , AdminId = ?  WHERE ID = ?');
        $editFurniture->execute(array($_POST['name'], $_POST['image'],$_POST['description'],$_POST['price'],
            $_POST['Quantity'],$_POST['Rate'],$_POST['ProviderId'],$_POST['CategoryId'],$_POST['AdminId'],$_POST['id']));
        if($editFurniture->rowCount() > 0){
            header('location: index.php?page=furniture');
        } else {
            echo '<p class="alert alert-danger">Failed</p>';
        }
    } catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>
<div class="container" style="margin: 100px auto">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?page=furniture&edit=' .  $furniture['ID']  ; ?>">
        <div class="form-group">

            <div class="form-group">
                <label for="name"> Name </label>
                <input type="hidden" name="id" value="<?php echo $furniture['ID']; ?>">
                <input type="text" name="name" value="<?php echo $furniture['Name']; ?>" class="form-control" id="name">
            </div>

            <div class="form-group">
                <label for="image">Image</label>
                <input type="hidden" name="id" value="<?php echo $furniture['ID']; ?>">
                <input type="text" name="image" value="<?php echo $furniture['Image']; ?>" class="form-control" id="image">
            </div>

            <div class="form-group">
                <label for="description">Description</label>
                <input type="hidden" name="id" value="<?php echo $furniture['ID']; ?>">
                <input type="text" name="description" value="<?php echo $furniture['Description']; ?>" class="form-control" id="description">
            </div>

            <div class="form-group">
                <label for="price">Price</label>
                <input type="hidden" name="id" value="<?php echo $furniture['ID']; ?>">
                <input type="text" name="price" value="<?php echo $furniture['Price']; ?>" class="form-control" id="price">
            </div>

            <div class="form-group">
                <label for="Quantity">Quantity</label>
                <input type="hidden" name="id" value="<?php echo $furniture['ID']; ?>">
                <input type="text" name="Quantity" value="<?php echo $furniture['Quantity']; ?>" class="form-control" id="Quantity">
            </div>

            <div class="form-group">
                <label for="Rate">Rate</label>
                <input type="hidden" name="id" value="<?php echo $furniture['ID']; ?>">
                <input type="text" name="Rate" value="<?php echo $furniture['Rate']; ?>" class="form-control" id="Rate">
            </div>

            <div class="form-group">
                <label for="ProviderId">ProviderId</label>
                <input type="hidden" name="id" value="<?php echo $provider['ID']; ?>">
                <select name="ProviderId" class="form-control">
                    <option value="0"></option>
                    <?php
                    foreach ($providers as $provider){
                        ?>
                        <option value="<?php echo $provider['ID'] ?>"><?php echo  $provider['Name']; ?></option>
                        <?php
                    }
                    ?>

                </select>
            </div>

            <div class="form-group">
                <label for="category"> CategoryId</label>
                <input type="hidden" name="id" value="<?php echo $furniture['ID']; ?>">
                <select name="CategoryId" class="form-control">
                    <option value="0"></option>
                    <?php
                    foreach ($categories as $cate){
                        ?>
                        <option value="<?php echo $cate['ID'] ?>"><?php echo  $cate['Name']; ?></option>
                        <?php
                    }
                    ?>

                </select>
            </div>

            <div class="form-group">
                <label for="Admin">AdminId</label>
                <input type="hidden" name="id" value="<?php echo $furniture['ID']; ?>">
                <input type="text" name="AdminId" value="<?php echo $furniture['AdminId']; ?>" class="form-control" id="AdminId">
            </div>
        </div>
        <button type="submit" class="btn btn-primary">Save</button>
    </form>
</div>