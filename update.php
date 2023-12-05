<?php
require_once './functions.php';
if(!empty($_POST)){
    var_dump($_POST);
    var_dump($_POST['id']);
    $nom = htmlspecialchars(ucfirst($_POST['nom']));
    $url = htmlspecialchars($_POST['url']);
    $updateMovies = $pdo->prepare("UPDATE `media`SET nom=:nom, url=:url WHERE id=:id");
     // Liaison des paramètres
    $updateMovies->bindParam(':nom', $nom, PDO::PARAM_STR);
    $updateMovies->bindParam(':url', $url, PDO::PARAM_STR);
    $updateMovies->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
    $updateMovies->execute();
    header('Location: ./movie.php');
}