<?php
require './header.php';
$movieOne = $pdo->prepare("SELECT nom, url FROM media WHERE id=:id");
$movieOne->bindParam(':id',$_GET['id'], PDO::PARAM_INT);
$movieOne->execute();

?>
<div class="container">
    <div class="row">
        <div class="col col-lg-4 mb-5 text-center">
            <div class="card" >
                <form action="/delete.php" method="post">                
                    <?php foreach ($movieOne as $movie) : ?>
                        <h2>Supprimer le film <?= $movie['nom']?></h2>
                        <input type="hidden" name="id" value="<?= $_GET['id'] ?>">
                        <h5 class="card-title"><?=ucfirst($movie['nom'])?></h5>
                        <div class="text-center">
                            <img src="<?=$movie['url']?>" class="card-img-top" alt="<?=$movie['url']?>"style="width: 18rem;height: 380px">
                        </div>                            
                        <div class="card-body">
                        <button type="submit" class="btn btn-danger">Delete</button>                                        
                        </div>                                
                    <?php endforeach;?>
                </form>
            </div>
        </div>
        <div class="col col-lg2 mb-5">
            <a href="./movie.php" class="btn btn-success">Annuler</a>
        </div>
            
    </div>
</div>
 
<?php
require './footer.php';
?>