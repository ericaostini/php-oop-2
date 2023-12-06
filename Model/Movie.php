<?php
include __DIR__."/Genres.php";
include __DIR__."/Flag.php";
include __DIR__."/Product.php";
include __DIR__."/../Traits/DrawItem.php";
class Movie extends Product {
    use DrawItem;
    private $id;
    private $title;
    private $overview;
    private $poster_path;
    private $vote_average;
    private $original_language;

    public array $genres;
    // public Genres $genres;
    // public Genres $second;

    // public static $discount = 20;
    function __construct($_id, $_title, $_overview, $_image, $_vote, $_language, array $_genres, $_quantity, $_price) {
        parent::__construct($_price, $_quantity);
        $this->id = $_id;
        $this->title = $_title;
        $this->overview = $_overview;
        $this->poster_path = $_image;
        $this->vote_average = $_vote;
        $this->original_language = $_language;
        // $this->genres = $_genres;
        $this->genres = $_genres;
        // $this->second = $_second;
    }

    public function voteStar() {
        $template = '';
        $vote = ceil($this->vote_average / 2);
        for($n = 1; $n <= 5; $n++) {
            $template .= $n <= $vote ? '<i class="fa-solid fa-star text-warning "></i>' : '<i class="fa-regular fa-star"></i>';
        }
        return $template;
    }

    public function getFlag() {
        $currentFlag = '';
        $parsedString = strtoupper($this->original_language);
        if($parsedString === "EN") {
            $parsedString = "GB";
        }
        if($parsedString === "JA") {
            $parsedString = "JP";
        }
        $currentFlag = 'https://flagsapi.com/'.$parsedString.'/flat/64.png';
        return $currentFlag;
    }
    public function displayGenres() {
        $template = '';
        for($i = 1; $i < count($this->genres); $i++) {
            $template .= '<span>'.$this->genres[$i]->type.' </span>';
        }
        return $template;
    }
    public function drawCard() {
        if(ceil($this->vote_average < 7)) {
            try {
                $this->setDiscount(20);
            } catch (Exception $e) {
                $error = $e->getMessage();
            }
        }
        // utilizzo trait DrawItem
        $itemArray = [
            "error" => $error ?? "",
            "discount" => $this->displayDiscount(),
            "discount_price" => $this->getDiscount($this->displayDiscount($this->vote_average)),
            "title" => $this->title,
            "overview" => substr($this->overview, 0, 100).'...',
            "vote" => round($this->vote_average, 2),
            "voteStar" => $this->voteStar(),
            "language" => $this->getFlag(),
            "img" => $this->poster_path,
            "genres" => $this->displayGenres(),
            "price" => $this->price,
            "quantity" => $this->quantity
        ];
        return $itemArray;
        // $discount = $this->setDiscount($this->vote_average);
        // $discount_price = $this->getDiscount($this->setDiscount($this->vote_average));
        // $title = $this->title;
        // $overview = substr($this->overview, 0, 100) . '...';
        // $vote = round($this->vote_average, 2);
        // $voteStar = $this->voteStar();
        // $language = $this->getFlag();
        // $img = $this->poster_path;
        // $genres = $this->displayGenres();
        // $price = $this->price;
        // $quantity = $this->quantity;
        // include __DIR__ . "/../Views/card.php";
    }
    public static function fetchAll() {
        $movieString = file_get_contents(__DIR__."/movie_db.json");
        $movieArray = json_decode($movieString, true);
        // var_dump($movieArray);

        $movieList = [];

        $genreList = Genres::fetchAll();
        //creazione nuovi oggetti secondo file movie_db.json
        foreach($movieArray as $item) {
            $moviegenres = [];
            for($i = 0; $i < count($item["genre_ids"]); $i++) {
                $index = rand(0, count($genreList) - 1);
                $rand_genre = $genreList[$index];
                $moviegenres[] = $rand_genre;
            }
            // $genres = $genreList[rand(0, count($genreList) - 1)];
            // $secondGenre = $genreList[rand(0, count($genreList) - 1)];
            // if ($genres == $secondGenre) {
            //     $secondGenre = $genreList[rand(0, count($genreList) - 1)];
            // }
            $quantity = rand(0, 100);
            $price = rand(10, 100);
            $movieList[] = new Movie($item["id"], $item["title"], $item["overview"], $item["poster_path"], $item["vote_average"], $item["original_language"], $moviegenres, $quantity, $price);
        }
        return $movieList;
    }
}



?>