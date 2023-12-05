<?php
require_once './functions.php';
if(!empty($_POST)){
    var_dump($_POST);
    $deleteMovie = $pdo->prepare("DELETE FROM `media` WHERE id=:id");
     // Liaison des paramètres
    $deleteMovie->bindParam(':id', $_POST['id'], PDO::PARAM_INT);
    var_dump($deleteMovie);
    $deleteMovie->execute();
    header('Location: ./movie.php');
}