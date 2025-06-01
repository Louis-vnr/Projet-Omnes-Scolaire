<?php
session_start();
$database = "omnes_scolaire";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);

if ($db_found){
    $id_prof = $_POST['id_prof'];
    $id_client = $_SESSION['id'];
    $jour = $_POST['jour'];
    $heure = $_POST['heure'];
    $sql = "UPDATE rdv SET dispo = 1,id_client= 0 WHERE id_prof='{$id_prof}' AND jour='{$jour}' AND heure='{$heure}' AND id_client='{$id_client}'";
    mysqli_query($db_handle,$sql);
    echo '<script>window.location.href = "rendezvous.php";</script>';
    exit; 
}
?>