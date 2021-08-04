

<?php

    $getProviders = $db -> prepare('SELECT * FROM providers WHERE Hide = 0');
    $getProviders->execute();
    $providers = $getProviders->fetchAll();
?>
<div class="container">
    <div class="row">
        <?php
            foreach ($providers as $provider){
                ?>
                <div class="col-md-4">
                    <div class="card">
                        <div class="card-body">
                            <?php echo $provider['Name']; ?>
                        </div>
                    </div>
                </div>
                <?php
            }
        ?>
    </div>
</div>
