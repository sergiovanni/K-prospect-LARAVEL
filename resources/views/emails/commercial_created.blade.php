<!DOCTYPE html>
<html>

<head>
    <title>Commercial Account Created</title>
</head>

<body>
    <h2>Bienvenue, {{ $user->name }}!</h2>
    <p>Vous avez été ajouté en tant que commerciale a notre plateforme K-PROSPECT</p>
    <p>Voici vos identifiants de connexion:</p>
    <p>Email: {{ $user->email }}</p>
    <p>Mot de passe: {{ $password }}</p>
    <br>
    <p>Veuillez bien réinitialiser votre mot de passe dès votre connexion

        <br>
        Merci !
    </p>


    <footer>
        <div class="copyright text-center text-sm text-muted text-lg-start">
            © 2024
            <script>
                document.write(new Date().getFullYear())
            </script>,
            made with
            <i class="fas fa-handshake text-primary text-sm opacity-10 ms-3"></i>
            by dev
            <a href="#" class="font-weight-bold" target="_blank">K-PROSPECT</a>

        </div>
    </footer>
</body>

</html>
