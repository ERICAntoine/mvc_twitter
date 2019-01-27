<?php

    include("../model/pdoConnect.php");

    class Hashtags extends Data
    {
        public function __construct($hashtags)
        {
            $this-> hashtags = $hashtags;
        }

        public function hashtagsSuggestion()
        {
            if(isset($this-> hashtags["hash"]) && !empty($this-> hashtags["hash"]))
            {
                $db = DATA::PDO();
                $hashtags = $this -> hashtags["hash"];
                $u = [];
                for($i = 0; $i < count($hashtags); $i++)
                {
                    $tags = str_replace("#","",$hashtags[$i]);
                    $query = "SELECT text FROM hashtags WHERE text LIKE '%$tags%'";
                    $getInfo = $db -> prepare($query);
                    $getInfo -> execute();
                }
                while($donnes = $getInfo -> fetch(PDO::FETCH_ASSOC))
                {
                    $u = $donnes;
                }
                return $u;
            }
        }


        public function usersSuggestion()
        {
            if(isset($this-> hashtags["aro"]) && !empty($this-> hashtags["aro"]))
            {
                $db = DATA::PDO();
                $hashtags = $this -> hashtags["aro"];
                $u = [];
                for($i = 0; $i < count($hashtags); $i++)
                {
                    $tags = str_replace("@","",$hashtags[$i]);
                    $query = "SELECT pseudo FROM users WHERE pseudo LIKE '%$tags%'";
                    $getInfo = $db -> prepare($query);
                    $getInfo -> execute();
                }
                while($donnes = $getInfo -> fetch(PDO::FETCH_ASSOC))
                {
                    $u = $donnes;
                }
                return $u;
            }
        }
    }

    $hash = new Hashtags($_POST);
    $hashArray = $hash -> hashtagsSuggestion();
    $usersArray = $hash -> usersSuggestion();
    if(is_array($hashArray) && is_array($usersArray))
    {
        $array = array_merge($hashArray, $usersArray);
        echo json_encode($array);
    }
    elseif(is_array($hashArray))
    {
        echo json_encode($hashArray);
    }
    elseif(is_array($usersArray))
    {
        echo json_encode($usersArray);
    }
