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
                    <span class="skills">Mon Blog</span>
                </div>
            </div>
        </div>
    </div>
</header>

<section>
    <h1>Mes articles</h1>
    <div class="container__card">
        <?php foreach ($articles as $article) { ?>
            <div class="card">
                <div class="card__header">
                    <img src="<?= $article->getImgArticle() ?>" class="card__image" width="600">
                </div>
                <div class="card__body">
                    <span class="tag tag-blue"><?= $article->getSlug() ?></span>
                    <h4><?= $article->getTitle() ?></h4>
                    <small>Ecrit le <?= $article->getcreatedAt() ?></small>

                    <p><?= $article->getExtrait() ?></p>
                </div>
                <div class="card__footer">
                    <button class="btn__card"><a
                                href="index.php?controller=article&task=show&id=<?= $article->getId() ?>">Lire la
                            suite</a></button>
                    <?php if (isset($_SESSION['auth'])) { ?>
                        <button class="btn__card"><a
                                    href="index.php?controller=article&task=updateArticle&id=<?php $article->getId() ?>">Modifier
                                l'article</a></button>
                        <button class="btn__card"><a
                                    href="index.php?controller=article&task=delete&id=<?= $article->getId() ?>"
                                    onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
                        </button>
                    <?php } ?>
                </div>
            </div>
        <?php } ?>
    </div>
</section>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>
<br>

<?php if (isset($_SESSION['auth'])) { ?>
    <button><a href="index.php?controller=home&task=insert">Ajouter un article</a></button>
<?php } ?>
