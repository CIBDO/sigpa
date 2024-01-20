<!-- resources/views/auth/register.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Inscription</title>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/all.css'>
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.2.0/css/fontawesome.css'>
    <link rel="stylesheet" href="{{asset('login/style.css') }}">
</head>
<body>
    <div class="container">
        <div class="screen">
            <div class="screen__content">
                <form class="login" action="{{ route('register') }}" method="post">
                    @csrf
                    <div class="login__field">
                        <i class="login__icon fas fa-user"></i>
                        <input name="name" type="text" class="login__input" placeholder="Nom d'utilisateur">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-envelope"></i>
                        <input name="email" type="text" class="login__input" placeholder="Email">
                    </div>
                    <div class="login__field">
                        <i class="login__icon fas fa-lock"></i>
                        <input name="password" type="password" class="login__input" placeholder="Mot de passe">
                    </div>
                    <button class="button login__submit">
                        <span class="button__text">S'inscrire</span>
                        <i class="button__icon fas fa-chevron-right"></i>
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
