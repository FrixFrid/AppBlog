<!-- ...::: Start Breadcrumb Section :::... -->
<div class="breadcrumb-section section-bg overflow-hidden pos-relative">
    <div class="breadcrumb-shape-top-left"></div>
    <div class="breadcrumb-shape-bottom-right"></div>
    <div class="breadcrumb-box">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Blog</h2>
                        <ul class="breadcrumb-link">
                            <li><a href="/">Accueil</a></li>
                            <li class="active" aria-current="page">Blog</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ...::: End Breadcrumb Section :::... -->
<!-- ...::: Start Blog List Section :::... -->
<div class="blog-list-section section-mt-165">
    <div class="blog-list-box">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <!--  Start Blog List  -->
                    <div class="blog-list">
                        <?php foreach ($articles as $article) { ?>
                        <!-- Start Blog List  Single Item-->
                        <div class="blog-list-single-item">
                            <div class="inner-shape inner-shape-top-right"></div>
                            <a href="/blog/article/<?= $article->getId() ?>" class="image">
                                <img src="<?php echo "/img/uploads/" . $article->getImgArticle() ?>" alt="">
                                </a>
                            <div class="content">
                                <div class="post-meta-1">
                                    <a href="#" class="catagory"><?= $article->getSlug() ?></a>
                                    <a href="#" class="date"><?= $article->getCreatedAt() ?></a>
                                    <a href="#" class="icon-space-right"><i class="icofont-ui-user"></i><?= $article->getAuthor() ?></a>
                                </div>
                                <h4 class="title"><a href="/blog/article/<?= $article->getId() ?>"><?= $article->getTitle() ?></a></h4>
                                <p><?= $article->getExtrait() ?></p>
                                <div class="post-meta-2">
                                    <a href="/blog/article/<?= $article->getId() ?>" class="icon-space-right"><i class="icofont-read-book-alt"></i>Lire la suite</a>
                                    <?php if (isset($_SESSION['auth'])) { ?>
                                    <a href="/blog/article/<?= $article->getId() ?>/update" class="icon-space-right"><i class="icofont-edit"></i>Modifier</a>
                                    <a href="/blog/article/<?= $article->getId() ?>/delete" onclick="return window.confirm(`Êtes vous sur de vouloir supprimer cet article ?!`)" class="icon-space-right"><i class="icofont-ui-delete"></i>Supprimer</a>
                                    <?php } ?>
                                    <?php var_dump($article->getId()); ?>
                                </div>
                            </div>
                        </div>
                        <?php } ?>
                        <!-- End Blog List  Single Item-->
                    <!--  End Blog List   -->

                    <div class="d-flex justify-content-center justify-content-lg-start">
                        <!--  Start Pagination  -->
                        <div class="pagination">
                            <div class="row">
                                <div class="col-12">
                                    <ul class="pagination-nav-list">
                                        <li class="prev"><a href="#"><i class="icofont-double-left"></i></a></li>
                                        <li><a href="#">1</a></li>
                                        <li class="active"><a href="#">2</a></li>
                                        <li><a href="#">3</a></li>
                                        <li class="next"><a href="#"><i class="icofont-double-right"></i></a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <!--  Start Pagination  -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ...::: End Blog List Section :::... -->

<br>
<br>
<br>

