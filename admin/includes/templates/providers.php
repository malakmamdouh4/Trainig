
<?php

   if(isset($_GET['add']))
   {
       include 'includes/templates/addProvider.php';
   }
   elseif(isset($_GET['edit']))
   {
      include 'includes/templates/editProvider.php';
   }
   elseif(isset($_GET['hide']))
   {
       include 'includes/templates/hideProvider.php';
   }
   elseif(isset($_GET['show']))
   {
       include 'includes/templates/showProvider.php';
   }
   elseif(isset($_GET['delete']))
   {
       $deleteProviders = $db -> prepare('DELETE FROM providers WHERE id = ?');
       $deleteProviders->execute(array($_GET['delete']));
       header('location: index.php?page=providers');
   }
   else
   {
       $getProviders = $db -> prepare('SELECT * FROM providers ');   // view
       $getProviders->execute();      // execute
       $providers = $getProviders->fetchAll();     // array
    ?>




    <div class="container" style="margin:100px auto">
        <a href="index.php?page=providers&add" class="btn btn-primary">Add </a>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Options</th>
                <th scope="col">Show</th>
            </tr>
            </thead>
            <tbody>
            <?php
            foreach($providers as $provider){
                ?>
                <tr>
                    <td>
                        <?php echo $provider['ID'] ?>
                    </td>
                    <td>
                        <?php echo $provider['Name'] ?>
                    </td>
                    <td>
                        <a href="index.php?page=providers&delete=<?php echo $provider['ID'] ?>" class="btn btn-danger">Delete</a>
                        <a href="index.php?page=providers&edit=<?php echo $provider['ID'] ?>" class="btn btn-success">Edit</a>
                    </td>
                    <td>
                        <?php
                            if($provider['Hide'] == 0){
                                ?>
                                <a href="index.php?page=providers&hide=<?php echo $provider['ID'] ?>" class="btn btn-success">On</a>
                                <?php
                            } else {
                                ?>
                                <a href="index.php?page=providers&show=<?php echo $provider['ID'] ?>" class="btn btn-danger">Off</a>
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



