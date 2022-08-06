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

<section>
    <h2>Mes derniers articles de blog</h2>
    <div class="row">

        <div class="col-3">
            <div class="card-block col-md-4">
                <?php foreach ($articles as $article) : ?>
                    <h3><?= $article['title'] ?></h3>
                    <small>Ecrit le <?= $article['created_at'] ?></small>
                    <p><?= $article['extrait'] ?></p>
                    <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">Lire la suite</a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
