<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css" />
    <link rel="stylesheet" href="../public/css/auth.css" />
    <title>Mot de Passe oublié</title>
</head>

<body>


    <main>
        <div class="container">


            <!--Forgot Password Section-->
            <h1 class="haut contact">Mot de passe oublié</h1>

            <form action=<?= local . "mail/forgotPassword" ?> method="POST">
                <input required type="email" name="emailPassword" placeholder="Email" maxlength='50' class="input1" />
                <button type="submit" name="forgotPassword" class="btnCo haut">Envoyer un mail</button>
            </form>
            <?php if (isset($_SESSION['erreur']) && ($_SESSION['erreur']) === 'error') :
            ?>
                <p class="error haut">Email saisi n'existe pas. Veuillez recommencer</p>
                <?php session_destroy() ?>
            <?php endif ?>

        </div>

    </main>

</body>

</html>