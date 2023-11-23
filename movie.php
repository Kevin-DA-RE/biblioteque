<?php
require './header.php';
require dirname(__DIR__) . DIRECTORY_SEPARATOR . 'media' . DIRECTORY_SEPARATOR . 'class' . DIRECTORY_SEPARATOR . 'Card.php';

$movieList = new Card(array(
    [
        "nom" => "Barbie",
        "url" => "https://fr.web.img4.acsta.net/pictures/23/06/16/12/04/4590179.jpg"
   
    ],
    [
        "nom" => "oppenheimer",
        "url" => "https://fr.web.img5.acsta.net/pictures/23/05/26/16/52/2793170.jpg"
   
    ],
    [
        "nom" => "Venom 2",
        "url" => "https://fr.web.img2.acsta.net/pictures/21/09/01/11/19/0900123.jpg"
    ],
    [
        "nom" => "Spider Man No Way Home",
        "url" => "https://fr.web.img4.acsta.net/pictures/21/11/16/10/01/4860598.jpg"
    
    ],
    [
        "nom" => "Les gardiens de la galaxie 3",
        "url" => "https://www.francetvinfo.fr/pictures/uweCsy9dsYWv5RLbQ8KEQIGhCpU/1200x1200/2023/05/03/64521f9a8beec_gardians.jpg"
    
    ]
        
    ));
?>

<main class="container">
    <div class="row">
            <?php
           echo $movieList->getMovie("nom", 'url');
            ?>
    </div>
</main>

<?php
require './footer.php';
?>