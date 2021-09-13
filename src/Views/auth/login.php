<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css" />
    <link rel="stylesheet" href="../public/css/layout.css" />
    <link rel="stylesheet" href="../public/css/home.css" />
    <title>Se connecter</title>
</head>

<body>

    <main>
        <div class="container">


            <!--Login Section-->
            <h2 class="haut contact">Se connecter</h2>

            <form action=<?= local . "auth/loginPost" ?> method="POST">
                <input required type="text" name="username" placeholder="Nom d'utilisateur" class="input1" />
                <!--<input required type="email" name="email" placeholder="Email" class="input1" />-->
                <input required type="password" name="password" placeholder="Mot de passe" class="input1" />
                <button type="submit" class="btn">Se connecter</button>
            </form>
            <section>
                <p><a href=<?= local ?>>Annuler</a></p>
                <p><a href=<?= local . "auth/forgotPassword" ?>>Mot de passe oublié ?</a></p>
            </section>

        </div>

    </main>

</body>

</html>