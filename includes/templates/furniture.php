


<?php

$getFurniture = $db -> prepare('SELECT * FROM furniture WHERE Hide = 0');
$getFurniture->execute();
$furnitures = $getFurniture->fetchAll();
?>
<div class="container">
    <div class="row">
        <?php
        foreach ($furnitures as $furniture){
            ?>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body">
                        <?php echo $furniture['Name']; ?> <br>
                        <?php echo $furniture['Image']; ?> <br>
                        <?php echo $furniture['Description']; ?> <br>
                        <?php echo $furniture['Price']; ?> <br>
                        <?php echo $furniture['Quantity']; ?> <br>
                        <?php echo $furniture['Rate']; ?>

                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

