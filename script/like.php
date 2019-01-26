<?php
    session_start();
    
    include("../model/pdoConnect.php");

    class Like extends Data
    {
        public function __construct($tweetid , $currentUser)
        {
            $this -> tweetId = $tweetid;
            $this -> currentUser = $currentUser;
        }

        public function checkLike()
        {
            $user = $this -> currentUser;
            $tweet = $this -> tweetId;
            $db = DATA::PDO();
            $resquest = "SELECT * from likes WHERE id_user = $user  AND id_tweet = $tweet";
            $getInfo = $db -> prepare($resquest);
            $getInfo -> execute();
            $count = $getInfo -> rowCount();
            return $count > 0 ? true : false;
        }

        public function updateLike()
        {
            $user = $this -> currentUser;
            $tweet = $this -> tweetId;
            $db = DATA::PDO();
            $resquest = "INSERT INTO likes(id_user, id_tweet) VALUES ($user, $tweet)";
            $getInfo = $db -> prepare($resquest);
            $getInfo -> execute();
            echo "update";
            return $getInfo;
        }

        public function deleteLike()
        {
            $user = $this -> currentUser;
            $tweet = $this -> tweetId;
            $db = DATA::PDO();
            $resquest = "DELETE FROM likes WHERE id_user = $user  AND id_tweet = $tweet";
            $getInfo = $db -> prepare($resquest);
            $getInfo -> execute();
            echo "delete";
            return $getInfo;
        }
    }

    $tweet = new Like($_POST["tweet"], $_SESSION["id"]);
    $checkLike = $tweet -> checkLike();
    $update = ($checkLike != false ? $tweet-> deleteLike() : $tweet-> updateLike());
?>