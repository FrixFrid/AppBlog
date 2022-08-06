
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
<form action="index.php?controller=article&task=update&id=<?= $article['id'] ?>" method="POST">
    <h1>Modifier l'article</h1>
    <label>Titre :</label>
    <input type="text" name="title" value="<?= $article['title']; ?>">
    <label>Catégorie :</label>
    <input type="text" name="slug" value="<?= $article['slug'];?>">
    <label>Auteur :</label>
    <input type="text" name="author" value="<?= $article['author'];?>">
    <label>Extrait :</label>
    <input type="text" name="extrait" value="<?= $article['extrait'];?>">
    <label>Article :</label>
    <textarea name="content" id="" cols="30" rows="10" value="<?= $article['content'];?>"></textarea>
    <input type="hidden" name="id" value="<?= $article['id'] ?>">
    <button>Modifier</button>
</form>
