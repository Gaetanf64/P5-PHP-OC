<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css" />
    <link rel="stylesheet" href="../../public/css/layout.css" />
    <<link rel="stylesheet" href="../../public/css/admin.css" />
    <title>Editer un Article</title>
</head>

<body>
    <?php require_once ROOT . 'src/Views/layout/menu.php'; ?>


    <main>
        <div class="container">

            <h1 class="haut contact adminH1">Modifier un article</h1>

            <form action="" method="POST" class="flexC">
                <label for="title">Titre</label>
                <input required type="text" name="title" placeholder="Titre" value="<?= htmlentities($postUpdate->getTitle()) ?>" class="input1" />
                <label for="chapo">Chapo</label>
                <textarea required type="text" name="chapo" placeholder="Chapo" cols="40" rows="30"><?= $postUpdate->getChapo() ?></textarea>
                <label for="content">Contenu</label>
                <textarea required type="text" name="content" placeholder="Contenu" cols="40" rows="30"><?= $postUpdate->getContent() ?></textarea>
                <input required type="hidden" name="id_user" placeholder="Id_user" value="<?= $postUpdate->getId_user() ?>" />
                <button class="btnEdit haut" type="submit" name="btnAjouter">Valider</button>
            </form>
        </div>
    </main>

    <?php require_once ROOT . 'src/Views/layout/footer.php'; ?>
</body>

</html>