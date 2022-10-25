<?php
if (session_status() === PHP_SESSION_NONE){
    session_start();
}
?>
<section>
        <br>
        <h1>Mon Dashboard</h1>
        <br>
        <h2>Bienvenue</h2>
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
            <?php foreach ($articles as $article) { ?>
                <?= '<tbody>'; ?>
                <?= '<tr>' ?>
                <?= '<td>' . $article->getTitle(); ?>
                <?= '<td>' . $article->getCreatedAt(); ?>
                <td><button><a href="index.php?controller=article&task=updateArticle&id=<?= $article->getId() ?>">Modifier l'article </a></button></td>
                <td><button><a href="index.php?controller=article&task=delete&id=<?= $article->getId() ?>">Supprimer l'article</a></button></td>
            <?php } ?>

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
            <button>Ajouter</button>
        </form>
    </section>
    <section>
        <h3>Ajouter un utilisateur</h3>
        <form action="index.php?controller=user&task=registerUser" method="POST">
            <label>Pseudo :</label>
            <input type="text" name="username" placeholder="Votre pseudo">
            <label>Email :</label>
            <input type="email" name="email" placeholder="votre email de connexion">
            <label>Mot de passe :</label>
            <input type="password" name="mdp" placeholder="votre mot de passe de connexion">
            <label>Confirmation mot de passe :</label>
            <input type="password" name="password_confirm" placeholder="confirmation de votre mot de passe de connexion">
            <label>Admin ?</label>
            <input type="checkbox" name="is_admin">
            <button>Inscription</button>
        </form>
    </section>