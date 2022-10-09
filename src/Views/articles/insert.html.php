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
    <textarea class="login__input" name="content" id="" cols="30" rows="10" placeholder="l'article"></textarea>
                    </div>
    <input type="hidden" name="id" value="<?= $id ?>">
    <button class="login__submit">Ajouter</button>
    </div>
</form>
    </div>
</section>