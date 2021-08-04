



<?php
$hideFurniture = $db ->prepare('UPDATE furniture SET Hide= 0  WHERE ID = ?');
$hideFurniture->execute(array($_GET['show']));
if($hideFurniture->rowCount() > 0){
    header('location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo '<p class="alert alert-danger">Failed</p>';
}

?>