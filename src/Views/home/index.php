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
    
    <main>

        <!--Section 1-->
        <section>
            <article id="Accueil">
                <p><a href="public/img/logo-girondins.jpg" target="_blank"><img src="public/img/logo-girondins_mini.jpg" alt="Logo des Girondins de Bordeaux" title="Cliquez pour agrandir" id="logo" /></a></p>
                <p id="coord"> E-mail : gaetan.fouillet@gmail.com<br />Tél : 06.59.57.92.02</p>
                <p id="btn"><a class="telecharger icone" href="public/img/CV_GAETAN_FOUILLET.pdf">TELECHARGER MON CV</a></p>
            </article>
        </section>

    </main>

    <?php require_once ROOT.'src/Views/layout/footer.php'; ?>

</body>
</html>