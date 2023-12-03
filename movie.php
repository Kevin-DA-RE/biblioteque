<?php
require './header.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'biblioteque' . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Card.php';

/* Connexion à la base de données */
try {
    //code...
    $pdo = new PDO("mysql:host=localhost;dbname=biblioteque", "root", "");

} catch (PDOException $e) {
    die("Erreur : " . $e->getMessage());
}

/* Requete pour afficher tous les films présent en base */
$movies = $pdo->query('SELECT id, nom, url FROM media');

if(!empty($_POST)){
    $nom = htmlspecialchars($_POST['nom']);
    $url = htmlspecialchars($_POST['url']);
    $addMovies = $pdo->prepare("INSERT INTO `media`(`nom`, `url`) VALUES (:nom,:url)");
     // Liaison des paramètres
    $addMovies->bindParam(':nom', $nom, PDO::PARAM_STR);
    $addMovies->bindParam(':url', $url, PDO::PARAM_STR);
    $addMovies->execute();
    header('Location: ./movie.php');
}
?>

<main class="container-fluid">
    <div class="row">
        <div class="col col-lg-2 mb-5">
            <form action="/movie.php" method="post">
                <div class="form-group">
                    <label for="movieAdd">Vidéo</label>
                    <input type="text" class="form-control" id="movieAdd" name="nom" placeholder="Saisissez le nom du film">
                </div>
                <div class="form-group">
                    <label for="urlAdd">Url</label>
                    <input type="text" class="form-control" id="urlAdd" name="url" placeholder="Saisissez l'url du film">
                </div>
                <button type="submit" class="btn btn-primary">Valider</button>
            </form>
        </div>
        <div class="col col-lg-10">
            <div class="container-fluid">
                <div class="row">
                <?php foreach($movies as $movie):?>
                        <div class="col col-lg-4 mb-5 text-center">
                            <div class="card" >
                                    <h5 class="card-title"><?=ucfirst($movie['nom'])?></h5>
                                    <div class="text-center">
                                        <img src="<?=$movie['url']?>" class="card-img-top" alt="<?=$movie['url']?>"style="width: 18rem;height: 380px">
                                    </div>                            
                                    <div class="card-body">                        
                                        <a href="<?=$movie['url']?>" class="btn btn-primary">View</a>
                                    </div>
                            </div>
                        </div>
                    <?php endforeach?>
                </div>
            </div>
        </div>
    </div>
</main>

<?php
require './footer.php';
?>