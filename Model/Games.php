<?php
include __DIR__."/Product.php";
include __DIR__."/../Traits/DrawItem.php";
class Games extends Product {
    use DrawItem;
    private float $id;
    private string $name;
    private string $description;
    private string $img_icon_url;
    private array $system;
    public static $discount = 10;

    function __construct($_id, $_name, $_description, $_img, array $_system, $_price, $_quantity) {
        parent::__construct($_price, $_quantity);
        $this->id = $_id;
        $this->name = $_name;
        $this->description = $_description;
        $this->img_icon_url = $_img;
        $this->system = $_system;
    }
    public function drawItem() {
        //Trait DrawItem
        $itemArray = [
            "discount" => self::$discount,
            "discount_price" => $this->getDiscount(self::$discount),
            "img" => "https://cdn.cloudflare.steamstatic.com/steam/apps/".$this->id."/header.jpg",
            "title" => $this->name,
            "overview" => substr($this->description, 0, 100).'...',
            "item" => implode(" - ", $this->system),
            "price" => $this->price,
            "quantity" => $this->quantity
        ];
        return $itemArray;
        // $discount = self::$discount;
        // $discount_price = $this->getDiscount(self::$discount);
        // $img = "https://cdn.cloudflare.steamstatic.com/steam/apps/" . $this->id . "/header.jpg";
        // $title = $this->name;
        // $overview = substr($this->description, 0, 100) . '...';
        // $item = implode(" - ", $this->system);
        // $price = $this->price;
        // $quantity = $this->quantity;
        // include __DIR__ . "/../Views/items.php";
    }


    public static function fetchAll() {
        $gamesString = file_get_contents(__DIR__."/steam_db.json");
        $gamesArray = json_decode($gamesString, true);

        $gamesList = [];
        foreach($gamesArray as $pice) {
            $quantity = rand(1, 50);
            $price = rand(30, 80);
            $gamesList[] = new Games($pice["appid"], $pice["name"], $pice["description"], $pice["img_icon_url"], $pice["supported_system"], $quantity, $price);
        }
        return $gamesList;
    }
}




?>