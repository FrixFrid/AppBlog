<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!-- ...::: Start Breadcrumb Section :::... -->
<div class="breadcrumb-section section-bg overflow-hidden pos-relative">
    <div class="breadcrumb-shape-top-left"></div>
    <div class="breadcrumb-shape-bottom-right"></div>
    <div class="breadcrumb-box">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Dashboard</h2>
                        <ul class="breadcrumb-link">
                            <li><a href="/home">Accueil</a></li>
                            <li class="active" aria-current="page">Dashboard</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ...::: End Breadcrumb Section :::... -->
<br>
<div class="contact-section section-gap-tb-165">
    <div class="contact-box pos-relative">
        <div class="container">
<section>
    <h3 style="text-align: center">Liste des articles</h3>
    <table>
        <thead>
        <tr>
            <th>Titre</th>
            <th>date</th>
        </tr>
        </thead>
        <?php foreach ($articles as $article) { ?>
            <?= '<tbody>'; ?>
            <?= '<tr>' ?>
            <?= '<td>' . $article->getTitle(); ?>
            <?= '<td>' . $article->getCreatedAt(); ?>
            <td>
                <button class="btn btn btn-outline-one icon-space-left"><a href="/blog/article/<?= $article->getId() ?>/update">Modifier l'article </a></button>
            </td>
            <td>
                <button class="btn btn btn-outline-one icon-space-left"><a href="/blog/article/<?= $article->getId() ?>/delete">Supprimer l'article</a></button>
            </td>
        <?php } ?>

    </table>
</section>
        </div>
    </div>
</div>
<hr>
<hr>
<div class="contact-section section-gap-tb-165">
    <div class="contact-box pos-relative">
        <div class="container">
<section>
    <h3 style="text-align: center">Commentaires à valider</h3>
    <table>
        <thead>
        <tr>
            <th>Pseudo</th>
            <th>Commentaire</th>
            <th>date</th>
        </tr>
        </thead>
        <?php foreach ($comments as $comment) { ?>
            <?= '<tbody>'; ?>
            <?= '<tr>' ?>
            <?= '<td>' . $comment->getAuthor(); ?>
            <?= '<td>' . $comment->getContent(); ?>
            <?= '<td>' . $comment->getCreatedAt(); ?>
            <?= '<td>' . $comment->getIsValidate(); ?>
            <td>
                <button class="btn btn btn-outline-one icon-space-left"><a href="/article/comment/<?= $comment->getId() ?>/validate">Approuver le commentaire </a></button>
            </td>
            <td>
                <button class="btn btn btn-outline-one icon-space-left"><a href="/article/comment/<?= $comment->getId() ?>/delete">Supprimer
                        le commentaire</a></button>
            </td>
        <?php } ?>

    </table>
    <hr>
    <hr>
    <div class="card-block col-md-4">
    </div>
</section>
        </div>
    </div>
</div>
<div class="section-globale">
    <div class="contact-section section-gap-tb-165">
        <div class="contact-box pos-relative">
            <div class="container">
            <section class="login-section">
    <h3 class="login__title" style="text-align: center">Ajouter un article</h3>
    <div class="contact-form-box">
    <form method="POST" enctype="multipart/form-data" action="/blog/article/insert">
        <div class="row mb-n6">
        <div class="col-xl-6 mb-6">
            <div class="default-form-group">
                <input name="title" type="text" placeholder="Titre de l'article">
            </div>
        </div>
            <div class="col-xl-6 mb-6">
                <div class="default-form-group">
                    <input name="slug" type="text" placeholder="Catégorie de l'article">
                </div>
            </div>
            <div class="col-xl-6 mb-6">
                <div class="default-form-group">
                    <input name="author" type="text" placeholder="Auteur de l'article">
                </div>
            </div>
            <div class="col-xl-6 mb-6">
                <div class="default-form-group">
                    <input name="extrait" type="text" placeholder="Extrait de l'article">
                </div>
            </div>
            <div class="col-xl-6 mb-6">
                <div class="default-form-group">
                    <textarea name="content" type="text" cols="30" rows="10" placeholder="Article"></textarea>
                </div>
            </div>
            <div class="col-xl-6 mb-6">
            <label>Image :</label>
            <input type="file" name="imgArticle">
            </div>
            <div class="col-6 mb-6">
                <div class="default-form-group tex-center">
                    <button type="submit" class="btn btn-lg btn-outline-one">Ajouter</button>
                </div>
            </div>
        </div>
    </form>
    </div>
</section>
            </div>
        </div>
    </div>
    <hr>
    <hr>
    <div class="contact-section section-gap-tb-165">
        <div class="contact-box pos-relative">
            <div class="container">
            <section class="contact-form-box">
    <h3 class="login__title" style="text-align: center">Ajouter un utilisateur</h3>
    <form action="/registerUser" method="POST">
        <div class="row mb-n6">
        <div class="col-xl-6 mb-6">
            <div class="default-form-group">
                <input name="username" type="text" placeholder="Pseudo">
            </div>
        </div>
        <div class="col-xl-6 mb-6">
            <div class="default-form-group">
                <input name="email" type="email" placeholder="Email">
            </div>
        </div>
        <div class="col-xl-6 mb-6">
            <div class="default-form-group">
                <input name="mdp" type="password" placeholder="Mot de passe">
            </div>
        </div>
        <div class="col-xl-6 mb-6">
            <div class="default-form-group">
                <input name="password_confirm" type="password" placeholder="Confirmation du Mot de passe">
            </div>
        </div>
        <div class="col-xl-6 mb-6">
            <label>Admin ?</label>
        <input type="checkbox" name="is_admin">
            </div>
                <button class="btn btn-lg btn-outline-one">Inscription</button>
        </div>
    </form>
</section>
        </div>
    </div>
    </div>