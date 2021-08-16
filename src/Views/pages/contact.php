<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="public/css/style.css" />
    <link rel="stylesheet" href="public/css/layout.css" />
    <link rel="stylesheet" href="public/css/home.css" />
    <title>Contact</title>

<body>

    <?php require_once ROOT . 'src/Views/layout/menu.php'; ?>

    <main>
        <div class="container">


            <!--Contact Section-->
            <h2 class="haut contact">Contactez-moi !</h2>

            <section class="haut flex">
                <?php require_once ROOT . 'src/Views/layout/contactform.php'; ?>
            </section>
        </div>

    </main>
    <?php require_once ROOT . 'src/Views/layout/footer.php'; ?>
</body>

</html>