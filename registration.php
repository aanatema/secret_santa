<?php include("head.php"); ?>
<!doctype html>
<html lang="fr">
<title>ReSoC - Inscription</title>

<body>
    <?php include("header.php"); ?>

    <div id="wrapper">

        <aside>
            <div class='cropped'>
                <img src="deco.png" />
            </div>
            <section>
                <h2>Secret Santa</h2>
                <p>Le Père Noël Secret est une tradition de Noël, surtout dans les pays anglo-saxons, au cours de
                    laquelle les membres d'un groupe ou d'une communauté s'offrent au hasard des cadeaux.</p>
            </section>
        </aside>
        <main>
            <article>
                <h2>Inscription</h2>
                <?php
                /**
                 * TRAITEMENT DU FORMULAIRE
                 */
                // Etape 1 : vérifier si on est en train d'afficher ou de traiter le formulaire
                // si on recoit un champs email rempli il y a une chance que ce soit un traitement
                $enCoursDeTraitement = isset($_POST['email']);
                if ($enCoursDeTraitement) {
                    // on ne fait ce qui suit que si un formulaire a été soumis.
                    // Etape 2: récupérer ce qu'il y a dans le formulaire
                    $new_email = $_POST['email'];
                    $new_alias = $_POST['pseudo'];
                    $new_passwd = $_POST['motpasse'];


                    //Etape 3 : Ouvrir une connexion avec la base de donnée.
                    include("BDD.php");
                    //Etape 4 : Petite sécurité
                    // pour éviter les injection sql : https://www.w3schools.com/sql/sql_injection.asp
                    $new_email = $mysqli->real_escape_string($new_email);
                    $new_alias = $mysqli->real_escape_string($new_alias);
                    $new_passwd = $mysqli->real_escape_string($new_passwd);
                    // on crypte le mot de passe pour éviter d'exposer notre utilisatrice en cas d'intrusion dans nos systèmes
                    // $new_passwd = md5($new_passwd);
                    // NB: md5 est pédagogique mais n'est pas recommandée pour une vraies sécurité
                    //Etape 5 : construction de la requete
                    $lInstructionSql = "INSERT INTO users (id, email, password, alias) "
                        . "VALUES (NULL, "
                        . "'" . $new_email . "', "
                        . "'" . $new_passwd . "', "
                        . "'" . $new_alias . "'"
                        . ");";
                    // Etape 6: exécution de la requete
                    $ok = $mysqli->query($lInstructionSql);
                    if (!$ok) {
                        echo "L'inscription a échouée : " . $mysqli->error;
                    } else {
                        echo "Votre inscription est un succès : " . $new_alias;
                        echo " <a href='login.php'>Connectez-vous.</a>";
                    }
                }
                ?>
                <form action="registration.php" method="post">
                    <dl>
                        <dt><label for='pseudo'>Pseudo</label></dt>
                        <dd><input type='text' name='pseudo'></dd>
                        <dt><label for='email'>E-Mail</label></dt>
                        <dd><input type='email' name='email'></dd>
                        <dt><label for='motpasse'>Mot de passe</label></dt>
                        <dd><input type='password' name='motpasse'></dd>
                    </dl>
                    <input type='submit'>
                </form>
                <p>
                    Déjà un compte ?
                    <a href='login.php'>Connectez-vous.</a>
                </p>
            </article>
        </main>
    </div>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>

</html>