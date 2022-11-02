<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>

<header>
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <img class="img-responsive" src="/public/img/profile.png" alt="">
                <div class="intro-text">
                    <span class="name">Farid TANGI</span>
                    <hr class="star-light">
                    <span class="skills">Inscription</span>
                </div>
            </div>
        </div>
    </div>
</header>

<section class="login__section">
    <h1 class="login__title">Par ici l'inscription !</h1>
    <br><br><br>
    <div class="login__form">
        <form class="login" action="index.php?controller=user&task=registerUser" method="POST">
            <div class="login__field">
                <input class="login__input" type="text" name="username" placeholder="Votre pseudo">
            </div>
            <div class="login__field">
                <input class="login__input" type="email" name="email" placeholder="votre email de connexion">
            </div>
            <div class="login__field">
                <input class="login__input" type="password" name="mdp" placeholder="votre mot de passe de connexion">
            </div>
            <div class="login__field">
                <input class="login__input" type="password" name="password_confirm"
                       placeholder="confirmation de votre mot de passe de connexion">
            </div>
            <?php if (!isset($_SESSION) === true && ($user->getIsAdmin()) === 1) {
                ; ?>
                <label>Admin ?</label>
                <input type="checkbox" name="is_admin">
            <?php } ?>
            <button class="login__submit">Inscription</button>
        </form>
    </div>
</section>