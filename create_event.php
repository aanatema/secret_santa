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
        $userId = intval($_GET['user_id']); ?>
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
            <form method="post">
                <input name="title" value="Titre" />
                <input name="date" type="date" value="Date de l'événement" />
                <input name="lieu" type="textarea" value="Lieu de l'événement" />
                <input name="description" type="textarea" value="Invitation" />
                <input name="budget" type="number" value="Budget" />
                <input name="invité" type="mail" value="Invité" />
                <input type="submit" value="Ajouter un invité" />

                <input type="submit" />

            </form>
        </main>

    </div>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>

</html>