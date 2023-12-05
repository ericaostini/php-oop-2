<?php
include __DIR__ . "/Views/header.php";
include __DIR__ . "/Model/Movie.php";
$movieList = Movie::fetchAll();
?>

<section>
    <div class="row">
        <?php foreach ($movieList as $movie) {
            $movie->displayCard();
            // var_dump($movie);
            // var_dump(Movie::$sconto);
        } ?>
    </div>
</section>

<?php
include __DIR__ . "/Views/footer.php";
?>