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
                    <span class="skills">Developer - Graphic Artist - Inbound Marketing</span>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="about">
    <h2>Qui je suis</h2>
    <p>Je suis en alternance dans le parcours PHP/SYMFONY chez Openclassrooms au sein de mon agence...
        <a href="index.php?controller=home&task=about">en savoir plus sur moi</a>
    </p>
</section>

<section>
    <h2>Vous pouvez télécharger mon CV</h2>
    <a href="#">Téléchargez mon CV</a>
</section>

<section class="article__home">
    <h2>Mes derniers articles de blog</h2>

    <div class="container__card">
        <?php foreach ($articles as $article) { ?>
            <div class="card">
                <div class="card__header">
                    <img src="<?= $article->getImgArticle() ?>" class="card__image" width="600">
                </div>
                <div class="card__body">
                    <span class="tag tag-blue"><?= $article->getSlug() ?></span>
                    <h4><?= $article->getTitle() ?></h4>
                    <small>Ecrit le <?= $article->getCreatedAt() ?></small>

                    <p><?= $article->getExtrait() ?></p>
                </div>
                <div class="card__footer">
                    <a href="index.php?controller=article&task=show&id=<?= $article->getId() ?>">Lire la suite</a>
                </div>
            </div>
        <?php } ?>
    </div>
</section>