<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
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
    $action = $_POST['action'];
    if($action == "S'inscrire"){
        echo "<form action='handle_inscription.php' method='post'>
            <table border = '1'>
                <tr>
                    <th><label for='nom'>Nom</label></th>
                    <td><input type='text' id='nom' name='nom'></td>
                </tr>
                <tr>
                    <th><label for='prenom'>Prenom</label></th>
                    <td><input type='text' id='prenom' name='prenom'></td>
                </tr>
                <tr>
                    <th><label for='email'>Email</label></th>
                    <td><input type='text' id='email' name='email'></td>
                </tr>
                <tr>
                    <th><label for='mdp'>Mot de Passe</label></th>
                    <td><input type='password' id='mdp' name='mdp'></td>
                </tr>
                <tr>
                    <th colspan='2'><input type='submit' name='action' value=\"S'inscrire\"></th>
                </tr>
            </table>
        </form>
        ";
    }
    if($action == "Créer compte enseignant"){
        echo "<form action='handle_inscription.php' method='post'>
            <table border = '1'>
                <tr>
                    <th><label for='nom'>Nom</label></th>
                    <td><input type='text' id='nom' name='nom'></td>
                </tr>
                <tr>
                    <th><label for='prenom'>Prenom</label></th>
                    <td><input type='text' id='prenom' name='prenom'></td>
                </tr>
                <tr>
                    <th><label for='email'>Email</label></th>
                    <td><input type='text' id='email' name='email'></td>
                </tr>
                <tr>
                    <th><label for='mdp'>Mot de Passe</label></th>
                    <td><input type='password' id='mdp' name='mdp'></td>
                </tr>
                <tr>
                    <th><label for='photo'>Photo</label></th>
                    <td><input type='text' id='photo' name='photo'></td>
                </tr>
                <tr>
                    <th><label for='bureau'>Bureau</label></th>
                    <td><input type='text' id='bureau' name='bureau'></td>
                </tr>
                <tr>
                    <th><label for='departement'>Departement</label></th>
                    <td><input type='text' id='departement' name='departement'></td>
                </tr>
                <tr>
                    <th><label for='profession'>Profession</label></th>
                    <td><input type='text' id='profession' name='profession'></td>
                </tr>
                <tr>
                    <th><label for='courriel'>Courriel</label></th>
                    <td><input type='text' id='courriel' name='courriel'></td>
                </tr>
                <tr>
                    <th><label for='telephone'>Telephone</label></th>
                    <td><input type='text' id='telephone' name='telephone'></td>
                </tr>
                <tr>
                    <th colspan='2'><input type='submit' name='action' value='Ajouter'></th>
                </tr>
            </table>
        </form>
        ";
    }
?>        
    </main>
    <footer>
        <p>Contact : contact@omnes.fr</p>
    </footer>
</body>
</html>
