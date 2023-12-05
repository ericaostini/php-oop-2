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
    public function displayCard()
    {
        $title = $this->title;
        $overview = substr($this->long_description, 0, 100) . '...';
        $img = $this->thumbnail_url;
        $genres = $this->author;
        include __DIR__ . "/../Views/card.php";
    }

    public static function fetchAll()
    {
        $booksString = file_get_contents(__DIR__ . "/books_db.json");
        $booksArray = json_decode($booksString, true);

        $booksList = [];
        foreach ($booksArray as $part) {
            $booksList[] = new Books($part["_id"], $part["title"], $part["thumbnailUrl"], $part["longDescription"], $part["authors"]);
        }
        var_dump($booksList);
        return $booksList;
    }
}

?>