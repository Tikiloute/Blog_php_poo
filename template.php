    <!DOCTYPE html>
    <html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-BmbxuPwQa2lc/FVzBcNJ7UAyJxM6wuqIj61tLrc4wSX0szH/Ev+nYRRuWlolflfl" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js" integrity="sha384-b5kHyXgcpbZJO/tY9Ul7kGkf1S0CWuKcCD38l8YkeH8z8QjE0GmW1gYU5S9FOnJ0" crossorigin="anonymous"></script>
        <script src="https://cdn.tiny.cloud/1/vvi3gap76cxc2s4s3siyjb12op2d8vd1cxibgyg9cjpv09bf/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
        <title>Mon blog</title>
        <link type="text/css" rel="stylesheet" href="style.css">

    </head>
    <body>
        <header>
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary mb-5 color-navBar">
            <div class="container-fluid">
                <a class="navbar-brand color-navBar" href="index.php">Blog de Jean Forteroche</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNavDropdown">
                    <ul class="navbar-nav">
                        <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="accueil">Accueil</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="index.php?action=articles&amp;page=1">Articles</a>
                        </li>
                        <li class="nav-item">
                    <?php if(isset($_SESSION["identify"],$_SESSION["identify"])){ ?>
                        <a class="nav-link" href="index.php?action=admin">Gérer votre site</a>
                        </li>
                        <li class="nav-item">
                        <a class="nav-link" href="index.php?action=logout">Se déconnecter</a>
                        </li>
                    <?php } else { ?>
                        <a class="nav-link" href="index.php?action=admin">Se connecter</a>
                    <?php } ?>
                        </li>
                    </ul>
                </div>
            </div>
            </nav>
        </header>
            <?php 
                if(!empty($contenu)){
                    echo $contenu;
                }; 
                
                if(!empty($content)){
                    echo $content;
                }
            ?>
        <footer>
            <nav class="navbar bottom navbar-dark bg-primary">
            <div class="">
                <a class="navbar-brand" href="#">Accueil</a>
                <a class="navbar-brand" href="#">Twitter</a>
                <a class="navbar-brand" href="#">Facebook</a>
            </div>
            </nav>
        </footer>
    </body>
    </html>

