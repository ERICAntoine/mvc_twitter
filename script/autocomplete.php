<?php
include("../model/pdoConnect.php");


/*$city = $_GET["term"];

if(isset($city) && !empty($city))
{
    $users = "SELECT MIN(id) as 'id', city FROM users WHERE city LIKE '". $city ."%' GROUP BY city";
    $usersResquest = $db -> prepare($users);
    $usersResquest -> execute();
    $cityData = array();

    while($donnes = $usersResquest -> fetch(PDO::FETCH_ASSOC))
    {
        array_push($cityData, $donnes["city"]);
    }

    echo json_encode($cityData);
}*/
class Autocomplete extends Data
{
    public function __construct($search)
    {
        $this -> search = $search;
        $ok = stristr($search, "#");

        if($ok == true){
            $this->completeHashtag();
        }
        else{
            $this->complete();
        }
    }

    public function completeHashtag()
    {
        $search = $this -> search;
        $tags = str_replace("#","",$search);
 
        $db = DATA::PDO();
        $resquest = "SELECT text FROM hashtags WHERE text LIKE '$tags%'";
        $usersSearch = $db ->prepare($resquest);
        $usersSearch -> execute();
        $users = [];

        while($donnes = $usersSearch -> fetch(PDO::FETCH_ASSOC))
        {
            array_push($users, $donnes["text"]);
        }
        
        echo json_encode($users);
    }

    public function complete()
    {
        $db = DATA::PDO();
        $search = $this -> search;
        $resquest = "SELECT pseudo FROM users WHERE pseudo LIKE '$search%'";
        $usersSearch = $db ->prepare($resquest);
        $usersSearch -> execute();
        $users = [];

        while($donnes = $usersSearch -> fetch(PDO::FETCH_ASSOC))
        {
            array_push($users, $donnes["pseudo"]);
        }

        echo json_encode($users);
    }
}

$autocomplete = new Autocomplete($_GET["term"]);
// $autocomplete -> complete();
?>