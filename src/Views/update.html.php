<!-- ...::: Start Breadcrumb Section :::... -->
<div class="breadcrumb-section section-bg overflow-hidden pos-relative">
    <div class="breadcrumb-shape-top-left"></div>
    <div class="breadcrumb-shape-bottom-right"></div>
    <div class="breadcrumb-box">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Modifier un article</h2>
                        <ul class="breadcrumb-link">
                            <li><a href="/">Accueil</a></li>
                            <li class="active" aria-current="page"><?= $article->getTitle() ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ...::: End Breadcrumb Section :::... -->
<div class="blog-details-section section-gap-tb-165">
    <div class="blog-details-box">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!-- Start Blog Content Area -->
                    <div class="blog-content-area">
                        <!-- Start Section Content -->
                        <div class="default-content-style pos-relative">
                            <div class="content-meta">
                                <span class="section-tag"><?= $article->getSlug() ?></span>
                                <div class="post-meta-2">
                                    <span class="icon-space-right"><i class="icofont-ui-user"></i>by <?= $article->getAuthor() ?></span>
                                    <span class="icon-space-right"><i class="icofont-calendar"></i><?= $article->getCreatedAt() ?></span>
                                </div>
                            </div>
                            <br>
                            <p><?= $article->getContent() ?></p>
                        </div>
                        <!-- End Section Content -->
                    </div>
                    <!-- End Blog Content Area -->
<hr>
                    <div class="section-globale">
                        <div class="contact-section section-gap-tb-165">
                            <div class="contact-box pos-relative">
                                <div class="container">
    <form method="POST" action="/blog/article/<?= $article->getId() ?>/updatePost">
    <h1>Modifier l'article</h1>
    <div class="row mb-n6">
        <div class="col-xl-6 mb-6">
            <div class="default-form-group">
                <label>Titre :</label>
                <input type="text" name="title" value="<?= $article->getTitle(); ?>">
            </div>
        </div>
        <div class="col-xl-6 mb-6">
            <div class="default-form-group">
                <label>Catégorie :</label>
                <input type="text" name="slug" value="<?= $article->getSlug(); ?>">
            </div>
        </div>
        <div class="col-xl-6 mb-6">
            <div class="default-form-group">
                <label>Auteur :</label>
                <input type="text" name="author" value="<?= $article->getAuthor(); ?>">
            </div>
        </div>
        <div class="col-xl-6 mb-6">
            <div class="default-form-group">
                <label>Extrait :</label>
                <input type="text" name="extrait" value="<?= $article->getExtrait(); ?>">
            </div>
        </div>
        <div class="col-xl-6 mb-6">
            <div class="default-form-group">
                <label>Article :</label>
                <textarea name="content" id="" cols="30" rows="10"><?= $article->getContent(); ?></textarea>
            </div>
        </div>
        <div class="col-xl-6 mb-6">
            <label>Image :</label>
            <input type="file" name="imgArticle">
        </div>
        <div class="col-6 mb-6">
            <div class="default-form-group tex-center">
            <input type="hidden" name="id" value="<?= $article->getId() ?>">
    <button type="submit" class="btn btn-lg btn-outline-one">Modifier</button>
            </div>
        </div>
    </div>
</form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>