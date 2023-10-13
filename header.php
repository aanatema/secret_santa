<header>
    <div>
        <section>
            <img src="resoc.png" alt="Logo de notre réseau social" />
        </section>
    </div>

    <div>
        <nav id="user">
            <a href="<?php if ($_SESSION['connected_id'] === null) {
                echo "login.php";
            } ?>">
                <?php if ($_SESSION['connected_id'] !== null) {
                    $lInstructionSql = "SELECT * FROM users WHERE id='$userId'";
                    $res = $mysqli->query($lInstructionSql);
                    $user = $res->fetch_assoc();
                    echo $user['alias'];
                } else { ?>
                    <img src="deconnected_user.jpg" style="border-radius:100%" />
                    <?php
                }
                ?>
            </a>
            <ul>
                <li><a href="settings.php?user_id=<?php echo $userId ?>">Paramètres</a></li>
                <li><a href="followers.php?user_id=<?php echo $userId ?>">Mes suiveurs</a></li>
                <li><a href="subscriptions.php?user_id=<?php echo $userId ?>">Mes abonnements</a></li>
                <li><a href="login.php">Connexion</a></li>
                <li><a href="logout.php">Déconnexion</a></li>
            </ul>
        </nav>
    </div>
</header>