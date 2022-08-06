<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="/public/img/profile.png" alt="">
                <div class="intro-text">
                    <span class="name">Farid TANGI</span>
                    <hr class="star-light">
                    <span class="skills">Connexion</span>
                </div>
            </div>
        </div>
    </div>
</header>
<section class="login__section">
    <h1 class="login__title">Par ici la Connexion !</h1>
    <br><br><br>
    <div class="login__form">
    <form class="login" action="index.php?controller=user&task=loginUser" method="POST">
        <div class="login__field">
            <i class="login__icon fas fa-user"></i>
        <input class="login__input" type="email" name="email" placeholder="votre email de connexion" required>
        </div>
        <div class="login__field">
            <i class="login__icon fas fa-lock"></i>
        <input class="login__input" type="password" name="mdp" placeholder="votre mot de passe de connexion" required>
        </div>
        <button class="login__submit">Connexion</button>
        <br>
        <a href="index.php?controller=user&task=register">Vous n'avez pas de compte ? inscrivez-vous ici !</a>
    </form>
    </div>
</section>
