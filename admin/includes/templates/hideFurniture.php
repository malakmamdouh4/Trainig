

<?php
$hideFurniture = $db ->prepare('UPDATE furniture SET Hide= 1  WHERE ID = ?');
$hideFurniture->execute(array($_GET['hide']));
if($hideFurniture->rowCount() > 0){
    header('location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo '<p class="alert alert-danger">Failed</p>';
}
?>
