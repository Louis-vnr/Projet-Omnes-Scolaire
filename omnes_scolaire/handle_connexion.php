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
        <a href="rendezvous.html">Rendez-vous</a>
        <a class="current" href="compte.php">Votre Compte</a>
    </nav>

    <main>
<?php
session_start();
$database = "omnes_scolaire";
$db_handle = mysqli_connect('localhost', 'root', '');
$db_found = mysqli_select_db($db_handle, $database);
if ($db_found){
    $email = $_POST['email'] ?? '';
    $mdp = $_POST['mdp'] ?? '';
    $type = $_POST['type'] ?? '';
    if($email == '' || $mdp ==''){
        echo "<h2>Email ou mot de passe manquant</h2>";
    }
    else{
        if($type == 'Se connecter'){
            $sql = "SELECT * FROM client WHERE email='$email' AND mdp='$mdp'";
            $recherche = mysqli_query($db_handle,$sql);
            if(mysqli_num_rows($recherche) == 0){
                echo "<h2>Email ou Mot de Passe invalide.</h2>";
            }
            else{
                $client = mysqli_fetch_assoc($recherche);
                $_SESSION['type'] = "client";
                $_SESSION['id'] = $client['id']; 
                $_SESSION['nom'] = $client['nom'];
                $_SESSION['prenom'] = $client['prenom'];
                $_SESSION['email'] = $client['email'];
                echo '<script>window.location.href = "compte_client.php";</script>';
                exit;           
            }
        }
        if($type == 'Admin'){
            $sql = "SELECT * FROM admins WHERE email='$email' AND mdp='$mdp'";
            $recherche = mysqli_query($db_handle,$sql);
            if(mysqli_num_rows($recherche) == 0){
                echo "<h2>Email ou Mot de Passe invalide.</h2>";
            }
            else{
                $admin = mysqli_fetch_assoc($recherche);
                $_SESSION['type'] = "admin";
                $_SESSION['id'] = $admin['id']; 
                $_SESSION['nom'] = $admin['nom'];
                $_SESSION['prenom'] = $admin['prenom'];
                $_SESSION['email'] = $admin['email'];
                echo '<script>window.location.href = "compte_admin.php";</script>';
                exit;           
            }
        }
        if($type == 'Personnel'){
            $sql = "SELECT * FROM personnel WHERE email='$email' AND mdp='$mdp'";
            $recherche = mysqli_query($db_handle,$sql);
            if(mysqli_num_rows($recherche) == 0){
                echo "<h2>Email ou Mot de Passe invalide.</h2>";
            }
            else{
                $personnel = mysqli_fetch_assoc($recherche);
                $_SESSION['type'] = "personnel";
                $_SESSION['id'] = $personnel['id']; 
                $_SESSION['nom'] = $personnel['nom'];
                $_SESSION['prenom'] = $personnel['prenom'];
                $_SESSION['email'] = $personnel['email'];
                echo '<script>window.location.href = "compte_personnel.php";</script>';
                exit;           
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