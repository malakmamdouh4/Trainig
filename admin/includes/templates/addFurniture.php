


<?php

$getCategories = $db->prepare('SELECT * FROM category');
$getCategories->execute();
$categories = $getCategories->fetchAll();

$getProviders = $db -> prepare('SELECT * FROM providers');   // view
$getProviders->execute();      // execute
$providers = $getProviders->fetchAll();     // array


if($_SERVER['REQUEST_METHOD'] == 'POST'){

    $extensions = array('jpg','png','jpeg','gif');
    $imageName = $_FILES['image']['name'];
    $array = explode('.',$imageName);
    $extension  = end($array);
    if(in_array($extension,$extensions)){
        $image = time() . '.' . $extension;
        move_uploaded_file($_FILES['image']['tmp_name'],'../uploads/' . $image);
        try{
            $createFurniture = $db -> prepare('INSERT INTO furniture (Name, Image, Description, Price, Quantity
             ,Rate, ProviderId, CategoryId, AdminId) VALUES (?,?,?,?,?,?,?,?,?)');
            $createFurniture->bindParam(1,$_POST['name']);
            $createFurniture->bindParam(2,$image);
            $createFurniture->bindParam(3,$_POST['description']);
            $createFurniture->bindParam(4,$_POST['price']);
            $createFurniture->bindParam(5,$_POST['Quantity']);
            $createFurniture->bindParam(6,$_POST['Rate']);
            $createFurniture->bindParam(7,$_POST['ProviderId']);
            $createFurniture->bindParam(8,$_POST['CategoryId']);
            $createFurniture->bindParam(9,$_POST['AdminId']);
            $createFurniture->execute();
            if($createFurniture->rowCount() > 0){
                echo '<p class="alert alert-success">Added Successfully</p>';
            } else {
                echo '<p class="alert alert-danger">Failed</p>';
            }
        } catch(PDOException $e){
            echo $e->getMessage();
        }
    } else {
        echo '<p class="alert alert-danger">File Should Be Image</p>';
    }


}
?>


<div class="container" style="margin: 100px auto">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?page=furniture&add' ; ?>" enctype="multipart/form-data">

        <div class="form-group">
            <label for="name">Furniture Name</label>
            <input type="text" name="name" class="form-control" id="name">
        </div>

        <div class="form-group">
            <label for="image">Image</label>
            <input type="file" name="image" class="form-control" id="image">
        </div>

        <div class="form-group">
            <label for="price">Furniture Price</label>
            <input type="text" name="price" class="form-control" id="price">
        </div>

        <div class="form-group">
            <label for="description">Furniture Description</label>
            <input type="text" name="description" class="form-control" id="description">
        </div>

        <div class="form-group">
            <label for="Quantity">Quantity</label>
            <input type="text" name="Quantity" class="form-control" id="Quantity">
        </div>

        <div class="form-group">
            <label for="Rate">Rate</label>
            <input type="text" name="Rate" class="form-control" id="Rate">
        </div>

        <div class="form-group">
            <label for="ProviderId">Provider</label>
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
            <label for="category">Furniture CategoryId</label>
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
            <label for="Admin">Admin</label>
            <input type="text" name="AdminId" class="form-control" id="Admin">
        </div>

        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
