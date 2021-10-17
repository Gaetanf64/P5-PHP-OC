<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href=<?= local . "public/css/style.css" ?> />
    <link rel="stylesheet" href=<?= local . "public/css/layout.css" ?> />
    <link rel="stylesheet" href=<?= local . "public/css/auth.css" ?> />
    <title>Gestion de votre compte</title>
</head>

<body>

    <?php require_once ROOT . 'src/Views/layout/menu.php'; ?>

    <main>
        <div class="container">

            <!--Profil Section-->
            <h1 class="haut contact">Gestion de votre compte</h1>

            <form action="" method="POST">
                <input required type="text" name="username" placeholder="Nom d'utilisateur" value="<?= $userUpdate->getUsername() ?>" class="input1" />
                <input required type="email" name="email" placeholder="Email" value="<?= $userUpdate->getEmail() ?>" class=" input1" />
                <button type="submit" name="editBtn" class="btnCo haut">Enregistrer</button>
            </form>
        </div>

    </main>

    <?php require_once ROOT . 'src/Views/layout/footer.php'; ?>

</body>

</html>