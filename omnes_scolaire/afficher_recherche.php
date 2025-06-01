<head>
<title>Omnes Scolaire</title>
<link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <h1>OMNES SCOLAIRE</h1>
    </header>

    <nav>
        <a href="index.html">Accueil</a>
        <a href="parcourir.html">Tout Parcourir</a>
        <a class="current" href="rechercher.php">Recherche</a>
        <a href="rendezvous.html">Rendez-vous</a>
        <a href="compte.php">Votre Compte</a>
    </nav>
    <main>
<?php
$database = "omnes_scolaire";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found){
    $nom = $_POST['nom'] ?? '';
    $prenom = $_POST['prenom'] ?? '';
    $departement = $_POST['departement'] ?? '';
    $profession = $_POST['profession'] ?? '';
    $action = $_POST['action'] ?? '';
    if($action== 'Rechercher'){
        $sql = "SELECT * FROM personnel WHERE 1=1";
        if($nom != ""){
            $sql .=" AND nom LIKE '%$nom%'";
        }
        if($prenom != ""){
            $sql .= " AND prenom LIKE '%$prenom%'";
        }
        if($departement != ""){
            $sql .= " AND departement LIKE '%$departement%'";
        }
        if($profession != ""){
            $sql .=" AND profession LIKE '%$profession%'";
        }
        $recherche = mysqli_query($db_handle,$sql);
        if(mysqli_num_rows($recherche) == 0){
            echo "<h2>Aucun personnel trouvé</h2>";
        }
        else {
            echo "<div class='results-container'>";
            while ($resultats = mysqli_fetch_assoc($recherche)){
            echo "
            <div class='person-card'>
                <h3>{$resultats['nom']} {$resultats['prenom']}</h3>
                <p>{$resultats['profession']}</p>
                <p>Département de {$resultats['departement']}</p>
            </div>
            ";
            }
            echo "</div>";
        }
    }
}
?>
    </main>
    <footer>
        <p>Contact : contact@omnes.fr | +33 1 23 45 67 89</p>
    </footer>
</body>