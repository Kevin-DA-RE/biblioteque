<?php
require_once './functions.php';
if(!empty($_GET)){
    var_dump($_GET);
    var_dump($_GET['id']);
    $nom = htmlspecialchars(ucfirst($_GET['nom']));
    $url = htmlspecialchars($_GET['url']);
    $updateMovies = $pdo->prepare("UPDATE `media`SET nom=:nom, url=:url WHERE id=:id");
     // Liaison des paramètres
    $updateMovies->bindParam(':nom', $nom, PDO::PARAM_STR);
    $updateMovies->bindParam(':url', $url, PDO::PARAM_STR);
    $updateMovies->bindParam(':id', $_GET['id'], PDO::PARAM_INT);
    $updateMovies->execute();
    header('Location: ./movie.php');
}