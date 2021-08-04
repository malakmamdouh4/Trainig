
<?php
    $hideProvider = $db ->prepare('UPDATE providers SET Hide= 1  WHERE ID = ?');
    $hideProvider->execute(array($_GET['hide']));
    if($hideProvider->rowCount() > 0){
        header('location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        echo '<p class="alert alert-danger">Failed</p>';
    }

?>