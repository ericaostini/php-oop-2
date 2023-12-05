<?php
include __DIR__ . "/Genres.php";
include __DIR__ . "/Flag.php";
include __DIR__ . "/Product.php";
class Movie extends Product
{
    private $id;
    private $title;
    private $overview;
    private $poster_path;
    private $vote_average;
    private $original_language;

    // public array $genres;
    public Genres $genres;
    public Genres $second;

    public static $discount = 20;

    function __construct($_id, $_title, $_overview, $_image, $_vote, $_language, Genres $_genres, Genres $_second, $_quantity, $_price)
    {
        parent::__construct($_price, $_quantity);
        $this->id = $_id;
        $this->title = $_title;
        $this->overview = $_overview;
        $this->poster_path = $_image;
        $this->vote_average = $_vote;
        $this->original_language = $_language;
        $this->genres = $_genres;
        // $this->genres = $_genres;
        $this->second = $_second;
    }

    public function voteStar()
    {
        $template = '';
        $vote = ceil($this->vote_average / 2);
        for ($n = 1; $n <= 5; $n++) {
            $template .= $n <= $vote ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
        }
        return $template;
    }

    public function getFlag()
    {
        $currentFlag = '';
        $parsedString = strtoupper($this->original_language);
        if ($parsedString === "EN") {
            $parsedString = "GB";
        }
        if ($parsedString === "JA") {
            $parsedString = "JP";
        }
        $currentFlag = 'https://flagsapi.com/' . $parsedString . '/flat/64.png';
        return $currentFlag;
    }
    public function displayCard()
    {
        $discount = $this->setDiscount($this->vote_average);
        $discount_price = $this->getDiscount($this->setDiscount($this->vote_average));
        $title = $this->title;
        $overview = substr($this->overview, 0, 100) . '...';
        $vote = round($this->vote_average, 2);
        $voteStar = $this->voteStar();
        $language = $this->getFlag();
        $img = $this->poster_path;
        // $genre = $this->genres;
        $genres = $this->genres->type;
        $second = $this->second->type;
        $price = $this->price;
        $quantity = $this->quantity;
        include __DIR__ . "/../Views/card.php";
    }
    public static function fetchAll()
    {
        $movieString = file_get_contents(__DIR__ . "/movie_db.json");
        $movieArray = json_decode($movieString, true);
        // var_dump($movieArray);

        $movieList = [];

        $genreList = Genres::fetchAll();
        //creazione nuovi oggetti secondo file movie_db.json
        foreach ($movieArray as $item) {
            // $moviegenres = [];
            // for ($i = 0; $i < count($item['genre_ids']); $i++) {
            //     $index = rand(0, count($genres) - 1);
            //     $rand_genre = $genres[$index];
            //     $moviegenres[] = $rand_genre;
            // }
            $genres = $genreList[rand(0, count($genreList) - 1)];
            $secondGenre = $genreList[rand(0, count($genreList) - 1)];
            if ($genres == $secondGenre) {
                $secondGenre = $genreList[rand(0, count($genreList) - 1)];
            }
            $quantity = rand(0, 100);
            $price = rand(10, 100);
            $movieList[] = new Movie($item["id"], $item["title"], $item["overview"], $item["poster_path"], $item["vote_average"], $item["original_language"], $genres, $secondGenre, $quantity, $price);
        }
        return $movieList;
    }
}

// test funzionamento funzione construct
// $nuovaCard = new Movie("1", "Ciao", "ciao mamma", "https://image.tmdb.org/t/p/w342/kt9nqD0uOar8IVE9191HXhWOXKI.jpg", "5.65", "en");
// var_dump($nuovaCard);

// var_dump($movieList);



?>