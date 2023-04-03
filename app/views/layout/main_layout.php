<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/all.min.css">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
    <link rel="stylesheet" href="/css/elzero.css">
    <?php if (explode("?", $_SERVER['REQUEST_URI'])[0] == '/contact'): ?>
        <link rel="stylesheet" href="/css/contact.css">
    <?php endif; ?>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Prata&display=swap" rel="stylesheet">
    <title>Elzero - {{pageName}}</title>
</head>
<body>
<nav class="navbar navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="/">Elzero</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
                aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-1 ms-auto mb-2 mb-lg-0 flex-row justify-content-end">
                <li class="nav-item">
                    <a class="nav-link <?php if ($args['pageName'] == 'Home') echo 'active' ?>" aria-current="page"
                       href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($args['pageName'] == 'Login') echo 'active' ?>" href="/login">Login</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($args['pageName'] == 'Register') echo 'active' ?>" href="/register">Register</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link <?php if ($args['pageName'] == 'Contact') echo 'active' ?>" href="/contact">Contact</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<main>
    <div class="container">
        {{content}}
    </div>
</main>
<script src="../../js/all.min.js"></script>
<script src="../../js/bootstrap.bundle.min.js"></script>
</body>
</html>