<?php
session_start();
$database = "omnes_scolaire";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found){
    $jours = ['Lundi','Mardi','Mercredi','Jeudi','Vendredi'];
    $moments = ['AM','PM'];
    foreach($jours as $jour){
        foreach($moments as $moment){
            $dispo = $_POST['dispo'][$jour][$moment] ?? 0;
            $id = $_POST['id'];
            if($dispo == 1){
                $sql = "SELECT * FROM disponibilites WHERE id_prof={$id} AND jour = '{$jour}'";
                $recherche = mysqli_query($db_handle,$sql);
                if(mysqli_num_rows($recherche)==0){
                    $sql = "INSERT INTO disponibilites(id_prof,jour,{$moment}) VALUES ('{$id}','{$jour}','1')";
                    mysqli_query($db_handle,$sql);
                    if($moment == 'AM'){
                        $heures = ['8:00','9:00','10:00','11:00'];
                    }
                    if($moment == 'PM'){
                        $heures = ['14:00','15:00','16:00','17:00'];
                    }
                    foreach($heures as $heure){
                        $sql = "INSERT INTO rdv(id_prof,jour,heure,dispo) VALUES ('{$id}','{$jour}','{$heure}','1')";
                        mysqli_query($db_handle,$sql);
                    }
                }
                else{
                    $sql = "UPDATE disponibilites SET {$moment} = 1 WHERE id_prof='{$id}' AND jour='{$jour}'";
                    mysqli_query($db_handle,$sql);
                    if($moment == 'AM'){
                        $heures = ['8:00','9:00','10:00','11:00'];
                    }
                    if($moment == 'PM'){
                        $heures = ['14:00','15:00','16:00','17:00'];
                    }
                    foreach($heures as $heure){
                        $sql = "INSERT INTO rdv(id_prof,jour,heure,dispo) VALUES ('{$id}','{$jour}','{$heure}','1')";
                        mysqli_query($db_handle,$sql);
                    }
                }
            }
            if($dispo == 0){
                $sql = "SELECT * FROM disponibilites WHERE id_prof={$id} AND jour = '{$jour}'";
                $recherche = mysqli_query($db_handle,$sql);
                if(mysqli_num_rows($recherche)==0){
                    $sql = "INSERT INTO disponibilites(id_prof,jour,{$moment}) VALUES ('{$id}','{$jour}','0')";
                    mysqli_query($db_handle,$sql);
                }
                else{
                    $sql = "UPDATE disponibilites SET {$moment} = 0 WHERE id_prof='{$id}' AND jour='{$jour}'";
                    mysqli_query($db_handle,$sql);
                }
            }
        }
    }
}
echo '<script>window.location.href = "index.html";</script>';
exit; 
?>