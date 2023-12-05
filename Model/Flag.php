<?php
class Flag
{
    public $flag;
    function __construct($_flag)
    {
        $this->flag = $_flag;
    }

}
$flagString = file_get_contents(__DIR__ . "/flag_db.json");
$flagArray = json_decode($flagString, true);
// var_dump($flagArray);
$flagList = [];
foreach ($flagArray as $item) {
    $flagList[] = new Flag($item);
}
// var_dump($flagList);