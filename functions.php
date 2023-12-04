<?php
/* Connexion à la base de données */
try {
    //code...
    $pdo = new PDO("mysql:host=localhost;dbname=biblioteque", "root", "");

} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

function nav_item (string $lien, string $titre, string $linkClass = ''): string
{
    $classe = '';
    if( $_SERVER['SCRIPT_NAME'] === $lien) {
        $classe = ' active';
    }
    return <<<HTML
    <li class="nav-item">
        <a class="nav-link $classe " href="$lien ">$titre</a>
    </li>
HTML;
}

function nav_menu (string $linkClass = ''): string
{
    return 
    nav_item('/index.php', 'Accueil', $linkClass).
    nav_item('/movie.php', 'Films', $linkClass);
}

function dump ($variable){
    echo '<pre>';
    var_dump($variable);
    echo '</pre>';
}