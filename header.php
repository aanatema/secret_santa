<header>
    <div>
        <section>
            <img src="resoc.png" alt="Logo de notre réseau social" />
        </section>
    </div>

    <div>
        <nav id="user">
            <a href="<?php if ($userId === null) {
                echo "login.php";
            } ?>">
                <?php if ($_SESSION['connected_id'] !== null) {
                    $lInstructionSql = "SELECT * FROM users WHERE id='$userId'";
                    $res = $mysqli->query($lInstructionSql);
                    $user = $res->fetch_assoc();
                    echo $user['alias'];
                    ?>
                </a>
                <ul>
                    <li><a href="settings.php?user_id=<?php echo $userId ?>">Paramètres</a></li>
                    <li><a href="create_event.php?user_id=<?php echo $userId ?>">Créer un événement</a></li>
                    <li><a href="logout.php">Déconnexion</a></li>
                </ul>

                <?php
                } else { ?>
                <div>
                    <img src="deconnected_user.jpg" />
                </div>
                </a>
                <ul>
                    <li><a href="login.php">Connexion</a></li>
                    <li><a href="registration.php">Déconnexion</a></li>
                </ul>
                <?php
                }
                ?>
        </nav>
    </div>
</header>