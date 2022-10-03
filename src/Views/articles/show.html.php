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
<small>Ecrit le <?= $article['createdAt'] ?></small>
<p><?= $article['extrait'] ?></p>
<hr>
<?= $article['content'] ?>
<?php if (count($comments) === 0) : ?>
    <h2>Il n'y a pas encore de commentaires pour cet article ... SOYEZ LE PREMIER ! :D</h2>
<?php else : ?>
    <h2>Il y a déjà <?= count($comments) ?> réactions : </h2>
    <?php foreach ($comments as $comment) : ?>
        <h3>Commentaire de <?= $comment['author'] ?></h3>
        <small>Le <?= $comment['createdAt'] ?></small>
        <blockquote>
            <em><?= $comment['content'] ?></em>
        </blockquote>
        <a href="index.php?controller=comment&task=delete&id=<?= $comment['id'] ?>" onclick="return window.confirm
        (`Êtes vous
        sûr de
        vouloir supprimer ce commentaire ?!`)">Supprimer</a>
    <?php endforeach ?>
<?php endif ?>

<form action="index.php?controller=comment&task=insert" method="POST">
    <h3>Vous voulez réagir ? N'hésitez pas les bros !</h3>
    <label>Pseudo :</label>
    <input type="text" name="author" placeholder="Votre pseudo !">
    <label>Commentaire :</label>
    <textarea name="content" id="" cols="30" rows="10" placeholder="Votre commentaire ..."></textarea>
    <input type="hidden" name="articleId" value="<?= $article->getId() ?>">
    <button>Commenter !</button>
</form>
