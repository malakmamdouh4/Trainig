

<?php
    $getProvider = $db -> prepare('SELECT * FROM providers WHERE id= ?');   // view 
    $getProvider->execute(array($_GET['edit']));      // execute 
    $provider = $getProvider->fetch();     // select one array that be updated
    if($getProvider->rowCount() > 0){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            try{
                $editProvider = $db ->prepare('UPDATE providers SET Name = ? WHERE ID = ?');
                $editProvider->execute(array($_POST['name'],$_POST['id']));
                if($editProvider->rowCount() > 0){
                    header('location: index.php?page=providers');
                } else {
                    echo '<p class="alert alert-danger">Failed</p>';
                }
            } catch(PDOException $e){
                echo $e->getMessage();
            }
        }
        ?>
        <div class="container" style="margin: 100px auto">
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?page=providers&edit=' .  $provider['ID']  ; ?>">
                <div class="form-group">
                    <label for="name">Provider Name</label>
                    <input type="hidden" name="id" value="<?php echo $provider['ID']; ?>">
                    <input type="text" name="name" value="<?php echo $provider['Name']; ?>" class="form-control" id="name">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
        <?php
    } else {
        ?>
        <div class="container" style="margin: 100px auto">404 Not Found</div>
        <?php
    }




?>
