<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="/public/img/profile.png" alt="">
                <div class="intro-text">
                    <span class="name">Farid TANGI</span>
                    <hr class="star-light">
                    <span class="skills"><?= $article->getTitle() ?></span>
                </div>
            </div>
        </div>
    </div>
</header>

<h1><?= $article->getTitle() ?></h1>
<small>Ecrit le <?= $article->getCreatedAt() ?></small>
<p><?= $article->getExtrait() ?></p>
<hr>
<?= $article->getContent() ?>
<?php if (count($comments) === 0) : ?>
    <h2>Il n'y a pas encore de commentaires pour cet article ... SOYEZ LE PREMIER ! :D</h2>
<?php else : ?>
    <h2>Il y a déjà <?= count($comments) ?> réactions : </h2>
    <?php foreach ($comments as $comment) : ?>
        <h3>Commentaire de <?= $comment->getAuthor() ?></h3>
        <small>Le <?=  $comment->getCreatedAt() ?></small>
        <blockquote>
            <em><?= $comment->getContent() ?></em>
        </blockquote>
        <?php if (isset($_SESSION['auth'])) { ?>
        <a href="index.php?controller=comment&task=delete&id=<?= $comment->getId() ?>" onclick="return window.confirm
        (`Êtes vous
        sûr de
        vouloir supprimer ce commentaire ?!`)">Supprimer</a>
        <?php } ?>
    <?php endforeach ?>
<?php endif ?>

<form action="index.php?controller=comment&task=validate" method="POST">
    <h3>Vous voulez réagir ? N'hésitez pas les bros !</h3>
    <label>Pseudo :</label>
    <input type="text" name="author" placeholder="Votre pseudo !">
    <label>Commentaire :</label>
    <textarea name="content" id="" cols="30" rows="10" placeholder="Votre commentaire ..."></textarea>
    <input type="hidden" name="articleId" value="<?= $article->getId() ?>">
    <button>Commenter !</button>
</form>
<br>
<br>
<br>
<button><a href="index.php?controller=article&task=blog">Retour au blog</a></button>


