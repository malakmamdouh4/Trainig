

<?php
$hideProvider = $db ->prepare('UPDATE providers SET Hide= 0  WHERE ID = ?');
$hideProvider->execute(array($_GET['show']));
if($hideProvider->rowCount() > 0){
    header('location: ' . $_SERVER['HTTP_REFERER']);
} else {
    echo '<p class="alert alert-danger">Failed</p>';
}

?>