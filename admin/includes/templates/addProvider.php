

<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST'){
       
        try{
            $createProvider = $db -> prepare('INSERT INTO providers (Name) VALUES (?)');
            $createProvider->bindParam(1,$_POST['name']);
            $createProvider->execute();
            if($createProvider->rowCount() > 0){
                echo '<p class="alert alert-success">Added Successfully</p>';
            } else {
                echo '<p class="alert alert-danger">Failed</p>';
            }
        } catch(PDOException $e){
            echo $e->getMessage();
        }
        
    }
?>


<div class="container" style="margin: 100px auto">
    <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] . '?page=providers&add' ; ?>">
    <div class="form-group">
        <label for="name">Provider Name</label>
        <input type="text" name="name" class="form-control" id="name">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
