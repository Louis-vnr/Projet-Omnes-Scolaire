<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Recherche</title>
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
        <h2>Recherche</h2>
        <form action="afficher_recherche.php" method="post">
            <table border = '1'>
                <tr>
                    <th><label for="nom">Nom</label></th>
                    <td><input type="text" id="nom" name="nom"></td>
                </tr>
                <tr>
                    <th><label for="prenom">Prenom</label></th>
                    <td><input type="text" id="ville" name="ville"></td>
                </tr>
                <tr>
                    <th><label for="departement">Departement</label></th>
                    <td><input type="text" id="departement" name="departement"></td>
                </tr>
                <tr>
                    <th><label for="profession">Profession</label></th>
                    <td><input type="text" id="profession" name="profession"></td>
                </tr>
                <tr>
                    <th colspan="2"><input type="submit" name="action" value="Rechercher"></th>
                </tr>
            </table>
        </form>
    </main>
    <footer>
        <p>Contact : contact@omnes.fr</p>
    </footer>
</body>
</html>
