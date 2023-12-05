<?php
include __DIR__ . "/Views/header.php";
include __DIR__ . "/Model/Games.php";

$gamesList = Games::fetchAll();
?>
<section>
    <div class="row">
        <?php foreach ($gamesList as $game) {
            $game->displayItem();
            // var_dump($book);
        } ?>
    </div>
</section>



<?php
include __DIR__ . "/Views/footer.php";
?>