<!-- HTML form to register or sign in -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Register</title>
</head>

<body>
    <main>

        <form action="registration_login.php" method="post">
            <h1>Sign Up</h1>
            <?php
            if ($enCoursDeTraitement) {
                // on créé des variables qui contiendront les informations des nouveaux utilisateurs,
                // qu'on récupère depuis les input HTML name
                $new_email = $_POST['email'];
                $new_alias = $_POST['username'];
                $new_passwd = $_POST['password'];

                include("connexion_bdd.php"); //connexion à la base de donnée

                //real_escape_string permet d'éviter que la présence de caractères spéciaux 
                // ou du code, casse l'envoi des données
                //mysqli fait le lien entre la valeur contenue dans la variable avec la BDD
                $new_email = $mysqli->real_escape_string($new_email);
                $new_alias = $mysqli->real_escape_string($new_alias);
                $new_passwd = $mysqli->real_escape_string($new_passwd);

                //chiffre le mot de passe / A CHANGER PLUS TARD 
                $new_passwd = md5($new_passwd);

                $insertSql =
                    "INSERT INTO users (id, email, password, alias) 
                    'VALUES (NULL, $new_email, $new_passwd, $new_alias)';";

                $ok = $mysqli->query($insertSql);
                if (!$ok) {
                    echo "L'inscription a échouée : " . $mysqli->error;
                } else {
                    echo "Hey " . $new_alias . " !";
                    echo " <a href='login.php'>Connectez-vous.</a>";
                }
            }
            ?>
            <div>
                <label for="username">Username:</label>
                <input type="text" name="username" id="username">
            </div>
            <div>
                <label for="email">Email:</label>
                <input type="email" name="email" id="email">
            </div>
            <div>
                <label for="password">Password:</label>
                <input type="password" name="password" id="password">
            </div>
            <div>
                <label for="password2">Password Again:</label>
                <input type="password" name="password2" id="password2">
            </div>
            <button type="submit">Register</button>
            <footer>Already a member? <a href="login.php">Login here</a></footer>
        </form>

    </main>
</body>

</html>