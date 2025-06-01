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
    $action = $_POST['action'];
        echo "
        <form action= 'handle_connexion.php' method='post'>
        <input type='hidden' name='type' value='$action'>
        <div class ='resultats-container'>
            <table border = '1'>
                <tr>
                    <th><label for='email'>E-Mail</label></th>
                    <td><input type='text' id='email' name='email'></td>
                </tr>
                <tr>
                    <th><label for='mdp'>Mot de Passe</label></th>
                    <td><input type='password' id='mdp' name='mdp'></td>
                </tr>
                <tr>
                    <th colspan='2'><input type='submit' name='action' value='Se connecter'></th>
                </tr>
            </table>
        </div>    
        </form>
        ";
?>
    </main>
    <footer>
        <p>Contact : contact@omnes.fr | +33 1 23 45 67 89</p>
    </footer>
</body>