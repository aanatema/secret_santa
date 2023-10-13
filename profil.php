<?php include("session.php"); ?>
<?php include("head.php"); ?>
<!doctype html>
<html lang="fr">

<title>ReSoC - Mur</title>

<body>
    <?php include("BDD.php");
    include("header.php"); ?>

    <div id="wrapper">
        <?php
        $userId = intval($_GET['user_id']);

        if ($userId == null) {
            ?>
            <aside>
                <div class='cropped'>
                    <img src="deco.png" />
                </div>
                <section>
                    <h3>Secret Santa</h3>
                    <p> Connectez-vous ou Créez votre compte pour créer votre événement Secret Santa ! </p>
                </section>
            </aside>

            <main>
                <article>
                    <h2>Secret Santa</h2>
                    <p>Veuillez vous connecter à votre compte.</p>
                    <p><a href='login.php'>Connectez-vous</a></p><br>
                    <h3>Pas de compte?</h3>
                    <p><a href='registration.php'>Inscrivez-vous</a></p>
                </article>
            </main>
        <?php } else { ?>
            <aside>
                <div class='cropped'>
                    <img src="deco.png" />
                </div>
                <section>
                    <h3>Secret Santa</h3>
                    <p>Assurez-vous que tous vos invités reçoivent un cadeau, Organisez votre Secret Santa.

                    </p>
                </section>
            </aside>
            <main>
                <form method="post" action="<?php echo ("create_event.php?user_id=" . $userId) ?>">
                    <!-- <input type="hidden" name="user_id" value="$userId" /> -->
                    <input type="submit" value="Créer un événement" />
                </form>
            </main>
        <?php } ?>
    </div>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>

</html>