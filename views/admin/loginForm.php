<h2>Formulaire de connexion</h2>
<form method="post">
    <?php if (isset($error)) {
        echo '<p style="color:red;">L\'utilisateur n\'existe pas</p>';
    } ?>
    <div>
        <label for="login">Login</label>
        <input type="text" id="login" name="login">
    </div>
    <div>
        <label for="password">Mot de passe</label>
        <input type="password" id="password" name="password">
    </div>
    <div>
        <input type="submit" value="Valider">
    </div>
</form>