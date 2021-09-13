<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css" />
    <link rel="stylesheet" href="../public/css/layout.css" />
    <link rel="stylesheet" href="../public/css/home.css" />
    <title>Mot de Passe oublié</title>
</head>

<body>


    <main>
        <div class="container">


            <!--Login Section-->
            <h2 class="haut contact">Mot de passe oublié</h2>

            <?php require_once(ROOT . 'src/Views/home/mail.php'); ?>
            <form action="" method="POST">
                <input required type="email" name="emailPassword" placeholder="Email" class="input1" />
                <button type="submit" name="forgotPassword" class="btn">Envoyer un mail</button>
                <?php if (isset($valid)) {
                    echo $valid;
                }
                if (isset($error)) {
                    echo $error;
                }
                ?>
            </form>

        </div>

    </main>

</body>

</html>