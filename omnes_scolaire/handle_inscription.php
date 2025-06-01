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
        <a href="rechercher.php">Recherche</a>
        <a href="rendezvous.php">Rendez-vous</a>
        <a class="current" href="compte.php">Votre Compte</a>
    </nav>

    <main>
<?php
$database = "omnes_scolaire";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found){
    $action = $_POST['action'];
    if($action == "S'inscrire"){
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $mdp = $_POST['mdp'] ?? ''; 
    }
    if($action == "Ajouter"){
        $nom = $_POST['nom'] ?? '';
        $prenom = $_POST['prenom'] ?? '';
        $email = $_POST['email'] ?? '';
        $mdp = $_POST['mdp'] ?? '';
        $profession = $_POST['profession'] ?? '';
        $departement = $_POST['departement'] ?? '';
        $photo = $_POST['photo'] ?? '';
        $bureau = $_POST['bureau'] ?? '';
        $telephone = $_POST['telephone'] ?? '';
        $courriel = $_POST['courriel'] ?? '';

    }
    if($action == "S'inscrire"){
        if($email=='' or $mdp==''){
        echo "Mot de Passe ou Email manquant";
        }
        else{
        $sql = "SELECT * FROM client WHERE email = '$email'";
        $recherche = mysqli_query($db_handle,$sql);
        if(mysqli_num_rows($recherche) != 0){
            echo "Email déjà utilisé.";
        }
        else{
            $sql = "INSERT INTO client(nom,prenom,email,mdp) VALUES ('$nom','$prenom','$email','$mdp')";
            mysqli_query($db_handle,$sql);
            echo "<h2>Compte crée</h2>";
        }
    }
    }
    if($action == "Ajouter"){
        if($email=='' or $mdp==''){
        echo "Mot de Passe ou Email manquant";
        }
        else{
            $sql = "SELECT * FROM personnel WHERE email = '$email'";
            $recherche = mysqli_query($db_handle,$sql);
            if(mysqli_num_rows($recherche) != 0){
                echo "Email déjà utilisé.";
            }
            else{
                $sql = "INSERT INTO personnel(nom,prenom,email,mdp,profession,departement,photo,bureau,telephone,courriel) VALUES ('$nom','$prenom','$email','$mdp','$profession','$departement','$photo','$bureau','$telephone','$courriel')";
                mysqli_query($db_handle,$sql);
                echo "<h2>Compte crée</h2>";
            }
        }
    }
}
?>
    </main>
    <footer>
        <p>Contact : contact@omnes.fr | +33 1 23 45 67 89</p>
    </footer>
</body>