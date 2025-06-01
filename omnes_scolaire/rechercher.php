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
        <a href="rendezvous.php">Rendez-vous</a>
        <a href="compte.php">Votre Compte</a>
    </nav>

    <main>
        <h2>Recherche</h2>
        <form action="afficher_recherche.php" method="post">
            <div class="resultats-container">
                <table border = '1'>
                    <tr>
                        <th><label for="recherche">Recherche...</label></th>
                        <td><input type="text" id="recherche" name="recherche"></td>
                    </tr>
                    <tr>
                        <th colspan="2"><input type="submit" name="action" value="Rechercher"></th>
                    </tr>
                </table>
            </div>
        </form>
    </main>
    <footer>
        <p>Contact : contact@omnes.fr</p>
    </footer>
</body>
</html>
