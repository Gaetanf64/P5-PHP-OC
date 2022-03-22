<?php $title = "Contact"; ?>

<?php require_once ROOT . 'src/Views/layout/header.php'; ?>

<main>
    <div class="container">


        <!--Contact Section-->
        <h2 class="haut contact">Contactez-moi !</h2>

        <section class="haut flex flexResponsive">
            <?php require_once ROOT . 'src/Views/layout/contactform.php'; ?>
        </section>
    </div>

</main>
<?php require_once ROOT . 'src/Views/layout/footer.php'; ?>