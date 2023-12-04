<?php
require './header.php';
var_dump($_GET);
var_dump($_POST);
$movieOne = $pdo->prepare("SELECT nom, url FROM media WHERE id=:id");
$movieOne->bindParam(':id',$_GET['id'], PDO::PARAM_INT);
$movieOne->execute();

?>
<div class="container">
    <div class="row">
        <form action="/update.php" method="get">
            <?php foreach ($movieOne as $movie) : ?>
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
    </div>
</div>
 
<?php
require './footer.php';
?>