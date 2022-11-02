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
                    <span class="skills">Ajouter un article</span>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="login__section">
    <h1 class="login__title">Ajouter un article</h1>
    <div class="login__form">
        <form class="login" action="index.php?controller=article&task=insert" method="POST">
            <div class="login__field">
                <input class="login__input" type="text" name="title" placeholder="Titre de l'article">
            </div>
            <div class="login__field">
                <input class="login__input" type="text" name="slug" placeholder="catégorie de l'article">
            </div>
            <div class="login__field">
                <input class="login__input" type="text" name="author" placeholder="auteur de l'article">
            </div>
            <div class="login__field">
                <input class="login__input" type="text" name="extrait" placeholder="extrait de l'article">
            </div>
            <div class="login__field">
                <textarea class="login__input" name="content" id="" cols="30" rows="10"
                          placeholder="l'article"></textarea>
            </div>
            <input type="hidden" name="id" value="<?= $article['id'] ?>">
            <button class="login__submit">Ajouter</button>
    </div>
    </form>
    </div>
</section>