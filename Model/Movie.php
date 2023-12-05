<?php
include __DIR__ . "/Genres.php";
include __DIR__ . "/Flag.php";
class Movie
{
    private $id;
    private $title;
    private $overview;
    private $poster_path;
    private $vote_average;
    private $original_language;

    public Genres $genres;
    public Genres $second;

    function __construct($_id, $_title, $_overview, $_image, $_vote, $_language, Genres $genres, Genres $second)
    {
        $this->id = $_id;
        $this->title = $_title;
        $this->overview = $_overview;
        $this->poster_path = $_image;
        $this->vote_average = $_vote;
        $this->original_language = $_language;
        $this->genres = $genres;
        $this->second = $second;
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
        $title = $this->title;
        $overview = $this->overview;
        $vote = $this->voteStar();
        $language = $this->getFlag();
        $img = $this->poster_path;
        $genres = $this->genres->type;
        $second = $this->second->type;
        include __DIR__ . "/../Views/card.php";
    }
}

// test funzionamento funzione construct
// $nuovaCard = new Movie("1", "Ciao", "ciao mamma", "https://image.tmdb.org/t/p/w342/kt9nqD0uOar8IVE9191HXhWOXKI.jpg", "5.65", "en");
// var_dump($nuovaCard);

$movieString = file_get_contents(__DIR__ . "/movie_db.json");
$movieArray = json_decode($movieString, true);
// var_dump($movieArray);

$movieList = [];

//creazione nuovi oggetti secondo file movie_db.json
foreach ($movieArray as $item) {
    $genres = $genreList[rand(0, count($genreList) - 1)];
    $secondGenre = $genreList[rand(0, count($genreList) - 1)];
    if ($genres == $secondGenre) {
        $secondGenre = $genreList[rand(0, count($genreList) - 1)];
    }
    $movieList[] = new Movie($item["id"], $item["title"], $item["overview"], $item["poster_path"], $item["vote_average"], $item["original_language"], $genres, $secondGenre);
}
// var_dump($movieList);



?>