<?php
$database = "omnes_scolaire";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found){
    $id = $_POST['id'];
    $sql = "DELETE FROM personnel WHERE id = {$id}";
    mysqli_query($db_handle,$sql);
    echo '<script>window.location.href = "liste_personnel_admin.php";</script>';
    exit;  
}
?>


