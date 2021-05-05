<?php require 'inc/header.php'?><?php
$alert = false;

if (!empty($_POST['email_login']) && !empty($_POST['password_login']) && isset($_POST['submit_login'])) {
    $email = htmlspecialchars($_POST['email_login']);
    $password = htmlspecialchars($_POST['password_login']);

    try {
        $sqlMail = "SELECT * FROM users WHERE email = '{$email}'";
        $resultMail = $connect->query($sqlMail);
        $user = $resultMail->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            $dbpassword = $user['password'];
            if (password_verify($password, $dbpassword)) {
                $_SESSION['id'] = $user['id'];
                $_SESSION['email'] = $user['email'];
                $_SESSION['username'] = $user['username'];

                $alert = true;
                $type = 'success';
                $message = "Vous êtes désormais connectés";
                unset($_POST);
                header('Location: profile.php');
            } else {
                $alert = true;
                $type = 'danger';
                $message = "Le mot de passe est erroné";
                unset($_POST);
            }
        } else {
            $alert = true;
            $type = 'warning';
            $message = "Ce compte n'existe pas";
            unset($_POST);
        }
    } catch (PDOException $error) {
        echo "Error: " . $error->getMessage();
    }
}


?>
<main class="px-3">
    <div class="row">
        <div class="col">
            <h3>Se connecter</h3>

            <?php echo $alert ? "<div class='alert alert-{$type} mt-2'>{$message}</div>" : ''; ?>
            <form action="#" method="POST">
                <div class="form-group">
                    <label for="InputEmail1">Adresse mail</label>
                    <input type="email" class="form-control" id="InputEmail1" aria-describedby="emailHelp" name="email_login" required>
                </div>
                <div class="form-group">
                    <label for="InputPassword1">Entrez votre mot de passe</label>
                    <input type="password" class="form-control" id="InputPassword1" name="password_login" required>
                </div>
                <hr>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary" name="submit_login" value="connexion">Se connecter</button>
                </div>
            </form>
            <hr>
            <div class="row">
                <div class="col">
                    <p>Vous ne possédez pas de compte ? <a href="./signin.php">Inscrivez-vous ici </a></p>
                </div>
            </div>
        </div>
    </div>
</main>
