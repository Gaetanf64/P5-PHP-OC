<?php $title = "Accueil"; ?>

<?php require_once ROOT . 'src/Views/layout/header.php'; ?>

<main>

    <!--Section Home-->
    <section class="fond">
        <h1 class="p1 container">CV Gaétan Fouillet</h1>
        <p class="p2 container">Développeur d'application - PHP / Symfony</p>
    </section>


    <div class="container">

        <!--Section Home 2-->
        <section>
            <article class="flexAccueil">
                <p><a href="public/img/Gaetan.jpg" target="_blank"><img src="public/img/Gaetan.jpg" alt="Photo de profil" title="Cliquez pour agrandir" id="logo" /></a></p>
                <p id="coord"> E-mail : gaetan.fouillet@test.com<br />Tél : 06.33.33.33.33</p>
                <p id="btn"><a class="telecharger icone" href="public/img/CV_GAETAN_FOUILLET.pdf">TELECHARGER MON CV</a></p>
            </article>
        </section>

        <!--Skills Section-->
        <section>
            <h2 class="haut">Compétences</h2>
            <ul id="graph">
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
                            <div class="bar-percentage" data-percentage="20"></div>
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

    </div>

    <!---Presentation Section-->
    <section class="bio haut">
        <h2 class="container">Présentation</h2>
        <article class="container haut flex flexResponsive">
            <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Nisi illum, corrupti id natus nam tenetur exercitationem ipsam ratione praesentium accusantium pariatur quo, architecto libero cum repellat nostrum sunt! Consectetur, libero. Lorem ipsum dolor sit amet consectetur, adipisicing elit. Exercitationem animi, cupiditate reiciendis est nam nisi fuga non quod corporis doloremque alias obcaecati nesciunt accusantium aliquid unde deleniti voluptates officia iure! Lorem, ipsum dolor sit amet consectetur adipisicing elit. Nisi iure alias, dolores praesentium iusto at perferendis quasi magni voluptates deserunt nulla totam, eos recusandae repellat quae placeat sunt mollitia? Animi.
                Nesciunt possimus molestias doloribus modi ducimus saepe, nulla itaque illo quod, enim sunt. Laudantium sint, a explicabo voluptate aperiam ullam natus ipsa, est ipsam doloribus soluta? Fuga, ullam. Nam, amet.
                Enim, fugiat aperiam perferendis magni fugit molestiae explicabo quisquam, culpa voluptatem illo impedit voluptas alias architecto placeat nihil id non quaerat atque? Amet excepturi voluptatum id quod ex distinctio deleniti?</p>
        </article>
    </section>

    <div class="container">


        <!--Contact Section-->
        <h2 class="haut">Contactez-moi !</h2>

        <section class="haut flex flexResponsive">
            <?php require_once ROOT . 'src/Views/layout/contactform.php';
            ?>
        </section>
    </div>

</main>
<?php require_once ROOT . 'src/Views/layout/footer.php'; ?>

<script src="http://code.jquery.com/jquery.min.js" type="text/javascript"></script>
<script src="public/js/script.js"></script>