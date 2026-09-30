<!DOCTYPE html>
<html lang="fr">


<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="app.js" defer></script>
    <title>SITE ELIO</title>
</head>

<body>
    <div class="loader" id="loader">
        <p>Chargement...</p>
    </div>
    <header>

        <nav class="navbar">
                 <a href="#acceuil"><img src="img/logo.png" alt="LOGO DU SITE"></a>
                <a href="#acceuil" class="logo">MON SITE</a>
            <div class="nav-list">
                <ul id="menu-list">
                    <li class="active"><a href="#acceuil">Acceuil</a></li>
                    <li><a href="#a-propos">A propos</a></li>
                    <li><a href="#contact">Contact</a></li>
                </ul>
            </div>
            <img src="img\burger-menu.png" alt="" class="burger">
                
        </nav>
        
    </header>

    <div class="page-main">

        <?php
        if (isset($_GET['success'])) {
            echo "mail bien envoyé !";
        } elseif (isset($_GET['error']) && $_GET['error'] == 1) {
            echo "veuillez remplir tous les champs";
        }
        ?>
        <div class="bienvenue" id="acceuil">
            <img src="img/nat.png" alt="">

            <div class="texte">
                <h1>BIENVENUE CHEZ NOUS</h1>
                <P>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Mollitia, illo laboriosam? Ipsa quod
                    molestias
                    eveniet facilis, veritatis nihil doloribus ad?</P>
            </div>

        </div>

        <div class="separator"></div>
        <div class="a-propos" id="a-propos">
            <h2 class="title-category">A propos</h2>
            <div class="picture-propos">
                <div class="infos-picture-propos">
                    <div class="picture-propos-text">
                        <h3>Notre team</h3>
                        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Tempore quibusdam quisquam
                            perferendis
                            quaerat illum eligendi natus hic. Sit iure commodi aperiam hic nostrum, quasi vel eaque, et
                            magni nisi architecto.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="separator"></div>

        <div class="contact" id="contact">
            <h2 class="title-category">Contact</h2>
            <div class="form-contact-container">
                <form action="contact.php" method="post" class="form-contact">
                    <div class="form-top">
                        <div class="form-left">
                            <div>
                                <label for="nom">Nom</label>
                                <input autocomplete="off" type="text" id="nom" name="nom"
                                    placeholder="KELOUFAI Essotom">
                            </div>
                            <div>
                                <label for="email">E-mail</label>
                                <input autocomplete="off" type="email" name="email" placeholder="Kelessotom@gmail.com">
                            </div>


                        </div>

                        <div class="form-right">
                            <label for="message">Votre message</label>
                            <textarea name="message" cols="30" rows="5" placeholder="Je vous contacte pour"></textarea>
                        </div>

                    </div>
                    <div class="form-buttom">
                        <input type="submit" name="envoyer" value="Envoyer">
                    </div>
                </form>
            </div>
        </div>

        <div class="separator"></div>
        <div class="commentaires" id="commentaires">
            <h2 class="title-category">Commentaires</h2>
            <?php

            $user = "root";
            $pwd = "";
            $db = "mysql:host=localhost;dbname=site elio";

            try {
                $cx = new PDO($db, $user, $pwd) or die();
                $cx->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                echo "Ereur est survenue lors de la connexion : " . $e->getMessage() . "</br>";
                die();
            }

            try {

                $sql = "select * from commentairess";
                $sth = $cx->prepare($sql);
                $sth->execute();
                $result = $sth->fetchAll();
                foreach ($result as $k => $v) {

                    echo "<div class=\"commentaire\">
                <img src=\"img/Commentataie.jpg\" alt=\"logo commentataire\" class=\"commentaire-pp\">
                <div class=\"commentaire-text\">
                    <h3 class=\"commentaire-nom\">" . $v["nom"] . "</h3>
                    <h3 class=\"commentaire-nom\">" . htmlspecialchars($v["nom"]) . "</h3>
<p class=\"commentaire-message\">" . htmlspecialchars($v["commentaire"]) . " </p>
            </div>";

                }
            } catch (PDOException $e) {
                echo 'Erreur :' . $e->getMessage() . '<br/>';
                die();
            }

            ?>

        </div>
    </div>
    <footer>
        <h2>Mon site copyright 2026</h2>
    </footer>

</body>

</html>