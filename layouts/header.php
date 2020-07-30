<body id="test">

    <header id="header">

        <div id="logo">
            <img src="public/image/PassGen.png" alt="logo PassGen" id="logoPassGen">
        </div>

        <nav id="menu">
            <ul id="nav">
                <li class="nav fromLeft"><a href="index.php">Accueil</a></li>
                <li class="nav fromLeft"><a href="generator.php">Tester</a></li>
                <li class="nav fromLeft"><a href="Download.html">Télécharger</a></li>
                <li class="nav fromLeft"><a href="contact.html">Contact</a></li>
            </ul>
        </nav>

        <div id="login">
            <?php if(isset($_SESSION['user'])) : ?>
            <button><a id="linkAccount" href="account.php">Mon compte</a></button>
            <button><a id="logout" href="logout.php">Déconnexion</a></button>
            <?php else : ?>
            <button><a id="linkConnect" href="login.php">Connexion</a></button>
            <button><a id="linkRegister" href="register.php">Inscription</a></button>
            <?php endif; ?>
        </div>

    </header>