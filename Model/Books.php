<?php
include __DIR__ . "/Product.php";
class Books extends Product
{
    private float $id;
    private string $title;
    private string $long_description;
    private string $thumbnail_url;
    private array $author;
    public static $discount = 20;

    function __construct($_id, $_title, $_description, $_url, $_author, $_price, $_quantity)
    {
        parent::__construct($_price, $_quantity);
        $this->id = $_id;
        $this->title = $_title;
        $this->long_description = $_description;
        $this->thumbnail_url = $_url;
        $this->author = $_author;
    }
    public function displayItem()
    {
        $discount = self::$discount;
        $discount_price = $this->getDiscount(self::$discount);
        $img = $this->thumbnail_url;
        $title = $this->title;
        $overview = substr($this->long_description, 0, 100) . '...';
        $item = implode(" - ", $this->author);
        $price = $this->price;
        $quantity = $this->quantity;
        include __DIR__ . "/../Views/items.php";
    }


    public static function fetchAll()
    {
        $booksString = file_get_contents(__DIR__ . "/books_db.json");
        $booksArray = json_decode($booksString, true);

        $booksList = [];
        foreach ($booksArray as $part) {
            $quantity = rand(1, 20);
            $price = rand(8, 15);
            $booksList[] = new Books($part["_id"], $part["title"], $part["longDescription"], $part["thumbnailUrl"], $part["authors"], $quantity, $price);
        }
        return $booksList;
    }
}

?>