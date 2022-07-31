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
<section>
    <h1>Par ici la Connexion !</h1>
    <br><br><br>
    <form action="index.php?controller=user&task=loginUser" method="POST">
        <label for="email">Email :</label>
        <input type="email" name="email" placeholder="votre email de connexion" required>
        <label for="mdp">Mot de passe :</label>
        <input type="password" name="mdp" placeholder="votre mot de passe de connexion" required>
        <button>Connexion</button>
        <a href="index.php?controller=user&task=register">Vous n'avez pas de compte ? inscrivez-vous ici !</a>
    </form>
</section>
