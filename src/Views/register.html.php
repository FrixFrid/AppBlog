<!-- ...::: Start Breadcrumb Section :::... -->
<div class="breadcrumb-section section-bg overflow-hidden pos-relative">
    <div class="breadcrumb-shape-top-left"></div>
    <div class="breadcrumb-shape-bottom-right"></div>
    <div class="breadcrumb-box">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="title">Inscription</h2>
                        <ul class="breadcrumb-link">
                            <li><a href="/">Accueil</a></li>
                            <li class="active" aria-current="page">Inscription</li>
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
        <form action="/registerUser" class="default-form contact-form" method="POST" >
            <div class="row mb-n6">
                <div class="col-xl-6 mb-6">
                    <div class="default-form-group">
                <input class="login__input" type="text" name="username" placeholder="Votre pseudo">
            </div>
                </div>
                <div class="col-xl-6 mb-6">
                    <div class="default-form-group">
                <input type="email" name="email" placeholder="votre email de connexion">
            </div>
                </div>
                <div class="col-xl-6 mb-6">
                    <div class="default-form-group">
                <input type="password" name="mdp" placeholder="votre mot de passe de connexion">
            </div>
                </div>
                <div class="col-xl-6 mb-6">
                    <div class="default-form-group">
                <input type="password" name="password_confirm"
                       placeholder="confirmation de votre mot de passe de connexion">
            </div>
                </div>
            <?php if (!isset($_SESSION) === true && ($user->getIsAdmin()) === 1) {
                ; ?>
                <label>Admin ?</label>
                <input type="checkbox" name="is_admin">
            <?php } ?>
            <button class="btn btn-lg btn-outline-one">Inscription</button>
            </div>
        </form>
    </div>

            </div>
        </div>
    </div>
</div>