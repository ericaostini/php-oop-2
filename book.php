<?php
include __DIR__ . "/Views/header.php";
include __DIR__ . "/Model/Books.php";

$bookList = Books::fetchAll();
?>
<section>
    <div class="row">
        <?php foreach ($bookList as $book) {
            $book->displayItem($book->drawItem());
            // var_dump($book);
        } ?>
    </div>
</section>



<?php
include __DIR__ . "/Views/footer.php";
?>