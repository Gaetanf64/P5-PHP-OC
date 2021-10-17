<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../public/css/style.css" />
    <link rel="stylesheet" href="../../public/css/layout.css" />
    <link rel="stylesheet" href="../../public/css/pages/post.css" />
    <title>Post</title>

<body>

    <?php require_once ROOT . 'src/Views/layout/menu.php'; ?>

    <main>
        <div class="container">


            <!--Post Section-->
            <section class="haut">

                <article>

                    <h1 class="haut contact"><?= $post->getTitle() ?></h1>
                    <h3 class="miHaut"><?= $post->getChapo() ?></h3>
                    <p class="haut"><?= $post->getContent() ?></p>
                    <p class="haut italic">Ecrit par <?= $post->getUsername() ?></p>
                    <p class="haut date"><span class="gras">Date de création : </span><?= $post->getDate_creation() ?></p>
                    <p class="date"><span class="gras">Date de dernière mise à jour : </span><?= $post->getDate_update() ?></p>
                </article>
            </section>

            <!--Comment Section-->
            <section>
                <h4 class="haut comment">Commentaires</h4>
                <?php foreach ($comments as $comment) : ?>
                    <article class="border">
                        <p class="miHaut"><?= $comment->getContent_comment() ?></p>
                        <p><span class="gras">Date de dernière mise à jour : </span><?= $comment->getDate_update() ?> par <?= $comment->getUsername() ?> </p>
                    </article>
                <?php endforeach ?>
            </section>

            <!--Add Comment Section-->
            <?php if (isset($_SESSION['auth'])) : ?>
                <section class="haut">
                    <form action="" method="post" class="flexC">
                        <textarea required type="text" name="content_comment" placeholder="Ajouter un commentaire" rows="10" cols="80"></textarea>
                        <input required type="hidden" name="id_user" placeholder="Id_user" value="<?= $_SESSION['id_user'] ?>" class="" />
                        <input required type="hidden" name="id_article" placeholder="Id_article" value="<?= $post->getId_article() ?>" class="" />
                        <button name="addComment" class="addCom miHaut">Ajouter</button>
                    </form>
                </section>
            <?php endif ?>

            <!--Admin Section-->
            <?php if (isset($_SESSION['auth']) && $_SESSION['auth'] === '1') : ?>
                <section class=" haut flex space">
                    <p><a class="btnAdmin" href=<?= local . "admin/editPost/" . $post->getId_article() ?>>Modifier l'article</a></p>
                    <p><a class="btnAdmin" href=<?= local . "admin/deletePost/" . $post->getId_article() ?>>Supprimer l'article</a></p>
                </section>
            <?php endif ?>


        </div>

    </main>
    <?php require_once ROOT . 'src/Views/layout/footer.php'; ?>
</body>

</html>