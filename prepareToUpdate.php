<?php
require './header.php';
$movieOne = $pdo->prepare("SELECT nom, url FROM media WHERE id=:id");
$movieOne->bindParam(':id',$_GET['id'], PDO::PARAM_INT);
$movieOne->execute();

?>
<div class="container">
    <div class="row">
        <form action="/update.php" method="post">       
            <?php foreach ($movieOne as $movie) : ?>
                <h2>Mettre à jour le film <?= $movie['nom']?></h2>
                <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                <div class="form-group">
                    <label for="movieAdd">Vidéo</label>
                    <input type="text" class="form-control" id="movieAdd" name="nom" value="<?= $movie['nom']?>">
                </div>
                <div class="form-group">
                    <label for="urlAdd">Url</label>
                    <input type="text" class="form-control" id="urlAdd" name="url" value="<?= $movie['url']?>">
                </div>
                <button type="submit" class="btn btn-primary">Mettre à jour</button>
                <?php endforeach;?>
        </form>
        <div class="col col-lg2 mb-5 mt-2">
            <a href="./movie.php" class="btn btn-success">Annuler</a>
        </div>
            
    </div>
</div>
 
<?php
require './footer.php';
?>