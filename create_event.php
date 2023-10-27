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
                <input name="title" value="Titre" /><br>
                <input name="date" type="date" value="Date de l'événement" /><br>
                <textarea name="lieu" value="Lieu de l'événement" rows="3" cols="25"> </textarea><br>
                <textarea name="description" value="Invitation" rows="55" cols="150"> </textarea><br>
                <input name="budget" type="number" value="Budget" /><br>
                <input name="invité" type="mail" value="Invité" /><br>
                <input type="submit" value="Ajouter un invité" /><br>

                <input type="submit" />

            </form>
        </main>

    </div>
    <footer>
        <?php include("footer.php"); ?>
    </footer>
</body>

</html>