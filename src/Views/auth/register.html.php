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
<section>
<h1>Par ici l'inscription !</h1>

<form action="index.php?controller=user&task=registerUser" method="POST">
    <label>Pseudo :</label>
    <input type="text" name="username" placeholder="Votre pseudo">
    <label>Email :</label>
    <input type="email" name="email" placeholder="votre email de connexion">
    <label>Mot de passe :</label>
    <input type="password" name="mdp" placeholder="votre mot de passe de connexion">
    <label>Confirmation mot de passe :</label>
    <input type="password" name="password_confirm" placeholder="confirmation de votre mot de passe de connexion">
    <?php $_SESSION['is_admin'] = 1; ?>
    <?php if ($_SESSION['is_admin'] === 1) { ?>
    <label>Admin ?</label>
    <input type="checkbox" name="is_admin">
    <?php } ?>
    <button>Inscription</button>
</form>
</section>