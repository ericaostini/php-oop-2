<?php
trait DrawItem {
    public function displayItem($item) {
        extract($item);
        include __DIR__."/../Views/card.php";
    }
}


?>