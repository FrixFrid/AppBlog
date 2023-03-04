<!-- ...::: Start Breadcrumb Section :::... -->
<div class="breadcrumb-section section-bg overflow-hidden pos-relative">
    <div class="breadcrumb-shape-top-left"></div>
    <div class="breadcrumb-shape-bottom-right"></div>
    <div class="breadcrumb-box">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Connexion</h2>
                        <ul class="breadcrumb-link">
                            <li><a href="/">Accueil</a></li>
                            <li class="active" aria-current="page">Connexion</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- ...::: End Breadcrumb Section :::... -->
<br>
<div class="section-globale">
    <div class="contact-section section-gap-tb-165">
        <div class="contact-box pos-relative">
            <div class="container">
<div class="contact-form-box">
    <form class="default-form contact-form" method="POST" action="/loginUser">
        <div class="row mb-n6">
            <div class="col-xl-6 mb-6">
                <div class="default-form-group">
                    <input name="email" type="email" placeholder="Votre email de connexion" required>
                </div>
            </div>
            <div class="col-xl-6 mb-6">
                <div class="default-form-group">
                    <input name="mdp" type="password" placeholder="Votre mot de passe de connexion" required>
                </div>
            </div>
            <div class="col-12 mb-6">
                <div class="default-form-group tex-center">
                    <button class="btn btn-lg btn-outline-one" type="submit" ">Connexion</button>
                </div>
            </div>
        </div>
        <br>
        <?php if (empty($_SESSION)) { ?>
            <a href="/register">Vous n'avez pas de compte ? inscrivez-vous ici !</a>
        <?php } ?>
    </form>
</div>
            </div>
        </div>
    </div>
