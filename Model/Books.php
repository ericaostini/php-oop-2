<?php
class Books
{
    private float $id;
    private string $title;
    private string $long_description;
    private string $thumbnail_url;
    private array $author;

    function __construct($_id, $_title, $_description, $_url, $_author)
    {
        $this->id = $_id;
        $this->title = $_title;
        $this->long_description = $_description;
        $this->thumbnail_url = $_url;
        $this->author = $_author;
    }
    public function displayItem()
    {
        $img = $this->thumbnail_url;
        $title = $this->title;
        $overview = substr($this->long_description, 0, 100) . '...';
        $item = $this->author[0];
        include __DIR__ . "/../Views/items.php";
    }

    public static function fetchAll()
    {
        $booksString = file_get_contents(__DIR__ . "/books_db.json");
        $booksArray = json_decode($booksString, true);

        $booksList = [];
        foreach ($booksArray as $part) {
            $booksList[] = new Books($part["_id"], $part["title"], $part["longDescription"], $part["thumbnailUrl"], $part["authors"]);
        }
        return $booksList;
    }
}

?>