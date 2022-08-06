<?php
if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) : ?>
    <form action="index.php?controller=article&task=insert" method="POST">
    <h1>Ajouter un article</h1>
    <label>Titre :</label>
    <input type="text" name="title" placeholder="Titre de l'article">
    <label>Catégorie :</label>
    <input type="text" name="slug" placeholder="catégorie de l'article">
    <label>Auteur :</label>
    <input type="text" name="author" placeholder="auteur de l'article">
    <label>Extrait :</label>
    <input type="text" name="extrait" placeholder="extrait de l'article">
    <label>Article :</label>
    <textarea name="content" id="" cols="30" rows="10" placeholder="l'article"></textarea>
    <input type="hidden" name="id" value="<?= $id ?>">
    <button>Ajouter</button>
</form>
<?php else : ?>
<?php \App\Http::redirect('index.php?controller=user&task=login'); ?>
<?php endif; ?>
