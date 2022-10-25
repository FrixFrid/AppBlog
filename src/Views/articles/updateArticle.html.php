<?php
if (session_status() === PHP_SESSION_NONE){
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
<form action="index.php?controller=article&task=update&id=<?= $article->getId() ?>" method="POST">
    <h1>Modifier l'article</h1>
    <label>Titre :</label>
    <input type="text" name="title" value="<?= $article->getTitle(); ?>">
    <label>Catégorie :</label>
    <input type="text" name="slug" value="<?= $article->getSlug();?>">
    <label>Auteur :</label>
    <input type="text" name="author" value="<?= $article->getAuthor();?>">
    <label>Extrait :</label>
    <input type="text" name="extrait" value="<?= $article->getExtrait();?>">
    <label>Article :</label>
    <textarea name="content" id="" cols="30" rows="10"><?= $article->getContent();?></textarea>
    <input type="hidden" name="id" value="<?= $article->getId() ?>">
    <button>Modifier</button>
</form>