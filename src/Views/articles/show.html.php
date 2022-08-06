<?php
session_start();
?>
<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="/public/img/profile.png" alt="">
                <div class="intro-text">
                    <span class="name">Farid TANGI</span>
                    <hr class="star-light">
                    <span class="skills"><?= $article['title'] ?></span>
                </div>
            </div>
        </div>
    </div>
</header>
<h1><?= $article['title'] ?></h1>
<small>Ecrit le <?= $article['created_at'] ?></small>
<p><?= $article['extrait'] ?></p>
<hr>
<?= $article['content'] ?>

<?php if (count($commentaires) === 0) : ?>
    <h2>Il n'y a pas encore de commentaires pour cet article ... SOYEZ LE PREMIER ! :D</h2>
<?php else : ?>
    <h2>Il y a déjà <?= count($commentaires) ?> réactions : </h2>
    <?php foreach ($commentaires as $commentaire) : ?>
        <h3>Commentaire de <?= $commentaire['author'] ?></h3>
        <small>Le <?= $commentaire['created_at'] ?></small>
        <blockquote>
            <em><?= $commentaire['content'] ?></em>
        </blockquote>
    <?php if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) :?>
        <a href="index.php?controller=comment&task=delete&id=<?= $commentaire['id'] ?>" onclick="return window.confirm
        (`Êtes vous
        sûr de
        vouloir supprimer ce commentaire ?!`)">Supprimer</a>
    <?php endif ?>
    <?php endforeach ?>
<?php endif ?>
<h3>Vous voulez réagir ? N'hésitez pas les bros !</h3>

<?php if (isset($_SESSION['isAdmin'])) : ?>
<form action="index.php?controller=comment&task=insert" method="POST">
    <label>Pseudo :</label>
    <input type="text" name="author" placeholder="Votre pseudo !">
    <label>Commentaire :</label>
    <textarea name="content" id="" cols="30" rows="10" placeholder="Votre commentaire ..."></textarea>
    <input type="hidden" name="article_id" value="<?= $article_id ?>">
    <button>Commenter !</button>
</form>
<?php else : ?>
<p><a href="index.php?controller=user&task=login" >Connectez-vous pour réagir<a/></p>
<?php endif ?>
