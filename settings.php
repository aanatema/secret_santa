<?php include("head.php"); ?>
<!doctype html>
<html lang="fr">
<title>ReSoC - Paramètres</title>

<body>
    <?php include("header.php"); ?>

    <div id="wrapper" class='profile'>

        <?php if ($_SESSION["connected_id"] == null) {
            ?>

            <aside>
                <div class='cropped'>
                    <img src="deco.png" />
                </div>
                <section>
                    <h3>Présentation</h3>
                    <p>
                        Sur cette page vous trouverez les informations de l'utilisatrice
                    </p>
                </section>
            </aside>
            <main>
                <article>
                    <h2>Information</h2>
                    <p>Veuillez vous connecter à votre compte.</p>
                    <p><a href='login.php'>Connectez-vous</a></p><br>
                    <h3>Pas de compte?</h3>
                    <p><a href='registration.php'>Inscrivez-vous</a></p>
                </article>
            </main>
        </div>
    <?php } else {
            ?>
        <aside>
            <?php include("BDD.php"); ?>

            <?php include('photoprofil.php') ?>
            <section>
                <h3>Présentation</h3>

                <p>Sur cette page vous trouverez les informations de l'utilisatrice
                    n°
                    <?php
                    echo intval($_GET['user_id']);

                    // $laQuestionEnSql = "SELECT * FROM users WHERE id= '$userId' ";
                    // $lesInformations = $mysqli->query($laQuestionEnSql);
                    // $reponse = $lesInformations->fetch_assoc();
                
                    ?>
                </p>
            </section>
        </aside>
        <main>
            <?php
            /**
             * Etape 1: Les paramètres concernent une utilisatrice en particulier
             */
            $userId = intval($_GET['user_id']);

            /**
             * Etape 2: se connecter à la base de donnée
             */

            /**
             * Etape 3: récupérer le nom de l'utilisateur
             */
            $laQuestionEnSql = "
                    SELECT users.*, 
                    count(DISTINCT posts.id) as totalpost, 
                    count(DISTINCT given.post_id) as totalgiven, 
                    count(DISTINCT recieved.user_id) as totalrecieved 
                    FROM users 
                    LEFT JOIN posts ON posts.user_id=users.id 
                    LEFT JOIN likes as given ON given.user_id=users.id 
                    LEFT JOIN likes as recieved ON recieved.post_id=posts.id 
                    WHERE users.id = '$userId' 
                    GROUP BY users.id
                    ";
            $lesInformations = $mysqli->query($laQuestionEnSql);
            if (!$lesInformations) {
                echo ("Échec de la requete : " . $mysqli->error);
            }
            $user = $lesInformations->fetch_assoc();



            ?>
            <article class='parameters'>
                <h3>Mes paramètres</h3>
                <dl>
                    <dt>Pseudo</dt>
                    <dd>
                        <?php echo ($user['alias']) ?>
                    </dd>
                    <dt>Email</dt>
                    <dd>
                        <?php echo ($user['email']) ?>
                    </dd>
                    <dt>Nombre de message</dt>
                    <dd>
                        <?php echo ($user['totalpost']) ?>
                    </dd>
                    <dt>Nombre de "J'aime" donnés </dt>
                    <dd>
                        <?php echo ($user['totalgiven']) ?>
                    </dd>
                    <dt>Nombre de "J'aime" reçus</dt>
                    <dd>
                        <?php echo ($user['totalrecieved']) ?>
                    </dd>
                </dl>

            </article>
        </main>
        </div>
    <?php }
        ?>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>

</html>