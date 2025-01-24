
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EMSI Hub</title>
    <style>
        /* CSS Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body {
            font-family: 'Lucida Sans', 'Lucida Sans Regular', 'Lucida Grande', 'Lucida Sans Unicode', Geneva, Verdana, sans-serif;
        }

        /* Top green bar - matching white header height */
        .top-bar {
            background-color: #008d36;
            color: white;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 20px;
            font-size: 14px;
            height: 65px; /* Set height to match white header */
        }
        .top-bar .social-icons {
            display: flex;
            align-items: center;
            gap: 15px;
        }
        .top-bar .social-icons a {
            color: white;
            font-size: 18px;
            text-decoration: none;
        }
        .top-bar .state-text {
            margin-left: 15px;
            font-weight: 300;
        }
        .top-bar .buttons {
            display: flex;
            gap: 10px; /* Adjust gap between buttons */
        }
        .top-bar .buttons a {
            padding: 5px 15px;
            border: 2px solid transparent;
            color: white;
            background: transparent;
            border-radius: 4px;
            text-decoration: none;
            transition: all 0.3s ease;
        }
        .top-bar .buttons a:hover {
            border: 2px solid white;
        }

        /* Header */
        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 12px 20px;
            background-color: white;
            box-shadow: 0px 1px 5px rgba(0, 0, 0, 0.1);
            height: 80px; /* Match top bar height */
        }
        .header .logo-left {
            margin-right: auto; /* Push the left logo to the far left */
        }
        .header .logo-left img {
            height: 70px; /* Adjust logo height if needed */
        }
        .header .logo-right {
            margin-left: auto; /* Push the right logo to the far right */
        }
        .header .logo-right a {
            display: inline-block;
        }
        .header .logo-right img {
            height: 60px; /* Adjust logo height if needed */
        }
        .header .menu {
            display: flex;
            gap: 30px; /* Increased gap for more spacing */
        }
        .header .menu a {
            color: black;
            text-decoration: none;
            font-weight: 400; /* Thinner font */
            font-size: 16px;
            position: relative;
            padding: 10px 0;
            transition: color 0.3s ease, transform 0.3s ease;
        }
        .header .menu a:hover {
            color: #3d9b35;
            transform: scale(1.1);
        }
        .header .menu a::after {
            content: '';
            position: absolute;
            width: 0;
            height: 2px;
            background: #3d9b35;
            left: 0;
            bottom: 0;
            transition: width 0.3s ease;
        }
        .header .menu a:hover::after {
            width: 100%;
        }
    </style>
</head>
<body>

    <!-- Top Bar -->
    <div class="top-bar">
        <div class="social-icons">
            <a href="#"><i class="fab fa-facebook-f"></i></a>
            <a href="#"><i class="fab fa-linkedin-in"></i></a>
            <a href="#"><i class="fab fa-youtube"></i></a>
            <a href="#"><i class="fab fa-instagram"></i></a>
            <span class="state-text">École reconnue par l'État.</span>
        </div>
        <!-- Conditional Buttons -->
        <div class="buttons">
            @if(Auth::check())

            @else
                <a href="{{ route('registre') }}" class="sign-up">Sign Up</a>
                <a href="{{ route('signin') }}" class="sign-in">Sign In</a>
            @endif
        </div>
    </div>

    <!-- Header -->
    <header class="header">
        <!-- EMSI Hub Logo (Left) -->
        <div class="logo-left">
            <img src="{{ asset('image/emsihub.png') }}" alt="EMSI Hub Logo">
        </div>

        <!-- Navigation Menu -->
        <nav class="menu">
            <a href="{{ route('annance.index') }}">Annonce</a>
            <a href="{{ route('signin') }}">Etudiant</a>
            <a href="{{ route('juree') }}">Juree</a>
            <a href="{{ route('formateur.index') }}">Formateur</a>

        </nav>

        <!-- EMSI Logo (Right) -->
        <div class="logo-right">
            <a href="https://emsi.ma" target="_blank">
                <img src="{{ asset('image/emsi.png') }}" alt="EMSI Logo">
            </a>
        </div>
    </header>

    <!-- Font Awesome for Social Icons (official CDN link) -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js" crossorigin="anonymous"></script>
</body>
</html>

@include('footer')
