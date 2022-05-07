<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href= "<?= $assetsBaseUri ?>css/style.css">
    <title>Exercice</title>
</head>
<body>
    <nav>
        <h1>MON SUPER SITE</h1>
        <ul>
            <a href="<?= $router->generate('contact-add');?>">Contact</a>
            <?php if(!isset($_SESSION['userId'])) : ?>
                <li><a href="<?= $router->generate('login-show');?>">Connexion</a></li>
                <li><a href="<?= $router->generate('user-add');?>">Inscription</a></li>
            <?php else : ?>
                <li><a href="<?= $router->generate('main-logout');?>">Déconnexion</a></li>
            <?php endif; ?>
        </ul>
    </nav>