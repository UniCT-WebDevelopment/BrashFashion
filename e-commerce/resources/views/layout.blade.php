{{-- layout.blade.php --}}
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="/img/BLogo.png">

    <!-- Style -->
    <link href="/css/style.css" rel="stylesheet">
    <link href="/css/grid.css" rel="stylesheet">
    
    <title>@yield('title', 'E-Commerce')</title>
</head>
<body>
    <nav class="menu">
        <img src="/img/LogoBrash.png" alt="reload" class="logoB">
        <ul>
            <li><a href="#">HOME</a></li>
            <li><a href="#about">ABOUT</a></li>
            <li><a href="#contact">CONTACT</a></li>
            <li><a href="#" class="logged">LOGIN</a></li>
        </ul>
    </nav>

    <div class="navlogin">
    <form method="POST" action={{ url('/main/checklogin') }} class="log">
            {{ csrf_field() }}
            <input type="text" name="email" placeholder="Email"/>
            <input type="password" name="pass" placeholder="Password"/>
            <input type="submit" name="btn-login" class="btn-login" value="Login"/>
        </form>
    </div>

    @yield('content')

    <!-- JQuery -->
    <script src="/plugins/jquery/jquery-3.5.0.min.js"></script>
    
    <!-- Javascript -->
    <script src="/js/homepageEffect.js"></script>
</body>
</html>