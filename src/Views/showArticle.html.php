<!-- ...::: Start Breadcrumb Section :::... -->
<div class="breadcrumb-section section-bg overflow-hidden pos-relative">
    <div class="breadcrumb-shape-top-left"></div>
    <div class="breadcrumb-shape-bottom-right"></div>
    <div class="breadcrumb-box">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title"><?= $article->getTitle() ?></h2>
                        <ul class="breadcrumb-link">
                            <li><a href="/blog">Blog</a></li>
                            <li class="active" aria-current="page"><?= $article->getTitle() ?></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ...::: End Breadcrumb Section :::... -->
<!-- ...::: Start Blog List Section :::... -->
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
                <!--  Start Comment Area  -->
                <div class="comment-area section-mt-75">
                    <!-- Start Comment Box-->
                    <div class="comment-box">
                        <h3 class="title">Commentaires(<?= count($comments) ?>) :</h3>
                        <ul class="comment-list-item">
                            <!-- Start Comment Single Item -->
                            <li>
                                <?php foreach ($comments as $comment) : ?>
                                    <div class="comment-single-item">
                                        <?php $grav_url = "https://www.gravatar.com/avatar/" . md5(strtolower( trim( $comment->getEmail()))) ?>
                                        <div class="image"><img src="<?= $grav_url ?>" alt=""></div>
                                        <div class="content">
                                            <div class="top">
                                                <div class="author-meta">
                                                    <h4 class="name"><?= $comment->getAuthor() ?></h4>
                                                    <span class="designation">le <?=  $comment->getCreatedAt() ?></span>
                                                </div>
                                            </div>
                                            <div class="bottom">
                                                <div class="text">
                                                    <p><?= $comment->getContent() ?></p>
                                                </div>
                                            </div>
                                        </div>
                                        <?php if (isset($_SESSION['auth'])) { ?>
                                            <a href="/article/<?= $comment->getId() ?>/comment/delete" onclick="return window.confirm
        (`Êtes vous
        sûr de
        vouloir supprimer ce commentaire ?!`)">Supprimer</a>
                                        <?php } ?>
                                    </div>
                                    <br><br><br>
                                <?php endforeach ?>
                            </li>
                            <!-- End Comment Single Item -->
                        </ul>

                    </div>
                    <!-- End Comment Box-->
                </div>
                <!-- ...::: End Comment Area :::... -->
                <!-- Start Comment Form Area -->
                <div class="comment-form-area section-mt-75">
                    <!-- Start Comment Form Box -->
                    <div class="comment-form-box">
                        <h3 class="title">Laisser un commentaire</h3>
                        <form class="default-form" method="post" action="/article/<?= $article->getId() ?>/comment/insert">
                            <div class="row mb-n6">
                                <div class="col-xl-6 mb-6">
                                    <div class="default-form-group">
                                        <input name="author" type="text" placeholder="Pseudo" required>
                                    </div>
                                </div>
                                <div class="col-xl-6 mb-6">
                                    <div class="default-form-group">
                                        <input name="email" type="email" placeholder="Email" required>
                                    </div>
                                </div>
                                <div class="col-xl-12 mb-6">
                                    <div class="default-form-group">
                                        <textarea name="content" placeholder="Commentaire" required></textarea>
                                    </div>
                                </div>
                                <div class="col-12 mb-6">
                                    <div class="default-form-group">
                                        <input type="hidden" name="articleId" value="<?= $article->getId() ?>">
                                        <button type="submit" class="btn btn-lg btn-outline-one">Commenter</button>
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