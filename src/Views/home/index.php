<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css" />
    <title>Accueil</title>
</head>
<body>

    <?php require_once ROOT.'src/Views/layout/menu.php'; ?>
    
    <!--Section Home-->
    <section class="fond">
        <h1 class="p1 main">CV Gaétan Fouillet</p><p class="p2 main">Développeur d'application - PHP / Symfony</h1>
    </section>

    <main>

        <!--Section Home 2-->
        <section>
            <article id="Accueil">
                <p><a href="public/img/logo-girondins.jpg" target="_blank"><img src="public/img/logo-girondins_mini.jpg" alt="Logo des Girondins de Bordeaux" title="Cliquez pour agrandir" id="logo" /></a></p>
                <p id="coord"> E-mail : gaetan.fouillet@gmail.com<br />Tél : 06.59.57.92.02</p>
                <p id="btn"><a class="telecharger icone" href="public/img/CV_GAETAN_FOUILLET.pdf">TELECHARGER MON CV</a></p>
            </article>
        </section>

        <!--Competences Section-->
        <section>
            <h2 class="haut">Compétences</h2>
            <ul id ="graph">
                <li class="compet">HTML
                    <div id="bar-1" class="bar-main-container azure">
                    <div class="wrap">
                    <div class="bar-percentage" data-percentage="90"></div>
                    <div class="bar-container">
                    <div class="bar"></div>
                    </div>
                    </div>
                    </div>
                </li>
                <li class="compet">CSS
                    <div id="bar-1" class="bar-main-container azure">
                    <div class="wrap">
                    <div class="bar-percentage" data-percentage="75"></div>
                    <div class="bar-container">
                    <div class="bar"></div>
                    </div>
                    </div>
                    </div>
                </li>
                <li class="compet">Javascript
                    <div id="bar-1" class="bar-main-container azure">
                    <div class="wrap">
                    <div class="bar-percentage" data-percentage="50"></div>
                    <div class="bar-container">
                    <div class="bar"></div>
                    </div>
                    </div>
                    </div>
                </li>
                <li class="compet">PHP
                    <div id="bar-1" class="bar-main-container azure">
                    <div class="wrap">
                    <div class="bar-percentage" data-percentage="70"></div>
                    <div class="bar-container">
                    <div class="bar"></div>
                    </div>
                    </div>
                    </div>
                </li>
                <li class="compet">Angular
                    <div id="bar-1" class="bar-main-container azure">
                    <div class="wrap">
                    <div class="bar-percentage" data-percentage="40"></div>
                    <div class="bar-container">
                    <div class="bar"></div>
                    </div>
                    </div>
                    </div>
                </li>
                <li class="compet">Symfony
                    <div id="bar-1" class="bar-main-container azure">
                    <div class="wrap">
                    <div class="bar-percentage" data-percentage="20"></div>
                    <div class="bar-container">
                    <div class="bar"></div>
                    </div>
                    </div>
                    </div>
                </li>
                <li class="compet">WordPress
                    <div id="bar-1" class="bar-main-container azure">
                    <div class="wrap">
                    <div class="bar-percentage" data-percentage="50"></div>
                    <div class="bar-container">
                    <div class="bar"></div>
                    </div>
                    </div>
                    </div>
                </li>
                <li class="compet">MySQL
                    <div id="bar-1" class="bar-main-container azure">
                    <div class="wrap">
                    <div class="bar-percentage" data-percentage="60"></div>
                    <div class="bar-container">
                    <div class="bar"></div>
                    </div>
                    </div>
                    </div>
                </li>
            </ul>			
        </section>

    </main>
        <!---Presentation Section-->
        
    <section class="bio haut">
        <h2 class="main">Présentation</h2>
        <article class="main haut flex">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi illum, corrupti id natus nam tenetur exercitationem ipsam ratione praesentium accusantium pariatur quo, architecto libero cum repellat nostrum sunt! Consectetur, libero. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem animi, cupiditate reiciendis est nam nisi fuga non quod corporis doloremque alias obcaecati nesciunt accusantium aliquid unde deleniti voluptates officia iure! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi iure alias, dolores praesentium iusto at perferendis quasi magni voluptates deserunt nulla totam, eos recusandae repellat quae placeat sunt mollitia? Animi.
            Nesciunt possimus molestias doloribus modi ducimus saepe, nulla itaque illo quod, enim sunt. Laudantium sint, a explicabo voluptate aperiam ullam natus ipsa, est ipsam doloribus soluta? Fuga, ullam. Nam, amet.
            Enim, fugiat aperiam perferendis magni fugit molestiae explicabo quisquam, culpa voluptatem illo impedit voluptas alias architecto placeat nihil id non quaerat atque? Amet excepturi voluptatum id quod ex distinctio deleniti?</p></article>
    </section>

    <main>
        

        <!--Contact Section-->
        <h2 class="haut">Contactez-moi !</h2>

        <section class="haut flex">
            <form method="post" action="traitement.php">
                    <input type="text" name="nom" placeholder="Nom" class="input1" />
                    <input type="text" name="prenom" placeholder="Prenom" class="input1" />
                    <input type="email" name="mail" placeholder="Adresse email" class="input1" />
                    <textarea name="message" placeholder=" Votre message" rows="10" cols="40"></textarea>
                    <button class="btn">Envoyer</button>
            </form>
            <aside><iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2903.3264364715346!2d-0.34809628451344604!3d43.30742547913466!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd5648f288e8e225%3A0xe99a2fb59ff759e9!2s50%20Avenue%20des%20Lilas%2C%2064000%20Pau!5e0!3m2!1sfr!2sfr!4v1628418148162!5m2!1sfr!2sfr" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe></aside>
        </section>

    </main>

    <?php require_once ROOT.'src/Views/layout/footer.php'; ?>

    <script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
	<script src="public/js/script.js"></script>
</body>
</html>