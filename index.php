<?php
include __DIR__ . "/Views/header.php";
include __DIR__ . "/Model/Movie.php";
?>

<section>
    <div class="row">
        <?php foreach ($movieList as $movie) {
            $movie->displayCard();
        } ?>
    </div>
</section>

<?php
include __DIR__ . "/Views/footer.php";
?>