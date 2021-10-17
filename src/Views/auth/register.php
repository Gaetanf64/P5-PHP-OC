<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css" />
    <link rel="stylesheet" href="../public/css/layout.css" />
    <link rel="stylesheet" href="../public/css/auth.css" />
    <title>Création du compte</title>
</head>

<body>


    <main>
        <div class="container">


            <!--Login Section-->
            <h2 class="haut contact">Création de votre compte</h2>

            <form action=<?= local . "auth/register" ?> method="POST">
                <input required type="text" name="username" placeholder="Nom d'utilisateur" maxlength='50' class="input1" />
                <input required type="email" name="email" placeholder="Email" maxlength='50' class="input1" />
                <input required type="password" name="password" placeholder="Mot de passe" maxlength='255' class="input1" />
                <input required type="password" name="confirmPassword" placeholder="Confirmer mot de passe" maxlength='255' class="input1" />
                <button type="submit" name="create" class="btnCo haut">Enregistrer</button>
            </form>

            <?php if (isset($_SESSION['erreur']) && ($_SESSION['erreur']) === 'error') :
            ?>
                <p class="error haut">Mots de passes ne correspondent pas</p>
                <?php session_destroy() ?>
            <?php endif ?>
            <?php if (isset($_SESSION['erreur']) && ($_SESSION['erreur']) === 'verifyUser') :
            ?>
                <p class="error haut">Nom d'utilisateur ou Email déjà pris</p>
                <?php session_destroy() ?>
            <?php endif ?>

            <p class="haut droiteAnnuler"><a class="annuler" href=<?= local ?>>Retour à la page d'accueil</a></p>



        </div>

    </main>

</body>

</html>