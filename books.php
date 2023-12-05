<?php
include __DIR__ . "/Views/header.php";

class Books
{
    private $id;
    private $title;
    private $long_description;
    private $thumbnail_url;
    private $author;

    public function __construct($_id, $title, $_description, $_url, $_author)
    {
        $this->id = $_id;
        $this->title = $title;
        $this->long_description = $_description;
        $this->thumbnail_url = $_url;
        $this->author = $_author;
    }
}
?>



<?php
include __DIR__ . "/Views/footer.php";
?>