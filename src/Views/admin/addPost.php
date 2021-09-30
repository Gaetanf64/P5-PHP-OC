<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/css/style.css" />
    <link rel="stylesheet" href="../public/css/layout.css" />
    <!--<link rel="stylesheet" href="../public/css/home.css" />-->
    <title>Ajouter un Article</title>
</head>

<body>

    <?php require_once ROOT . 'src/Views/layout/menu.php'; ?>


    <main>
        <div class="container">
            <h2 class="haut contact">Ajouter un article</h2>


            <form action="" method="POST">
                <input required type="text" name="title" placeholder="Titre" class="" />
                <textarea required type="text" name="chapo" placeholder="Chapo" cols="40" rows="30" class=""></textarea>
                <textarea required type="text" name="content" placeholder="Contenu" cols="40" rows="30" class=""></textarea>
                <input required type="hidden" name="id_user" placeholder="Id_user" value=<?= $_SESSION['id_user'] ?> class="" />
                <button class="btn" type="submit" name="btnAjouter">Ajouter un article</button>
            </form>
        </div>
    </main>

    <?php require_once ROOT . 'src/Views/layout/footer.php'; ?>
</body>

</html>