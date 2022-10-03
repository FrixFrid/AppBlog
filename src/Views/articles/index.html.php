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
    <div class="card-group">
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <?php foreach ($articles as $article) : ?>
                    <h3><?= $article['title'] ?></h3>
                    <small>Ecrit le <?= $article['createdAt'] ?></small>
                    <p><?= $article['extrait'] ?></p>
                    <a href="index.php?controller=article&task=show&id=<?= $article['id'] ?>">Lire la suite |</a>
                    <a href="index.php?controller=article&task=updateArticle&id=<?= $article['id'] ?>">Modifier
                        l'article |</a>
                    <a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>"
                       onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)">Supprimer</a>
                <?php endforeach ?>
            </div>
        </div>
    </div>
</section>
<br><br><br>
<br><br><br><br><br><br>
<a href="index.php?controller=home&task=insert">Ajouter un article</a>
