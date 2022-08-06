<?php
if (isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == 1) : ?>
<section>
    <br>
<h1>Mon Dashboard</h1>
    <br>
<h2>Bienvenue <?= htmlspecialchars($_SESSION['username']) ?></h2>
</section>
<section>
    <h3>Liste des articles</h3>
    <table>
        <thead>
            <tr>
                <th>Titre</th>
                <th>date</th>
            </tr>
        </thead>
        <?php foreach ($articles as $article) : ?>
            <?= '<tbody>'; ?>
            <?= '<tr>' ?>
            <?= '<td>' . $article['title'] ?>
            <?= '<td>' . $article['created_at'] ?>
            <td><button><a href="index.php?controller=article&task=updateArticle&id=<?= $article['id'] ?>">Modifier l'article </a></button></td>
            <td><button><a href="index.php?controller=article&task=delete&id=<?= $article['id'] ?>">Supprimer l'article</a></button></td>
        <?php endforeach ?>

    </table>
    <div class="card-block col-md-4">
    </div>
</section>
<section>
    <h3>Ajouter un article</h3>
    <form action="index.php?controller=article&task=insert" method="POST">
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
</section>
<?php else : ?>
    <?php \App\Http::redirect('index.php?controller=user&task=login'); ?>
<?php endif; ?>