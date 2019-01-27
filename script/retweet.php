<?php
    session_start();
    
    include("../model/pdoConnect.php");

    class Retweet extends Data
    {
        public function __construct($tweetid , $currentUser)
        {
            $this -> tweetId = $tweetid;
            $this -> currentUser = $currentUser;
        }

        public function checkRetweet()
        {
            $user = $this -> currentUser;
            $tweet = $this -> tweetId;
            $db = DATA::PDO();
            $resquest = "SELECT * from users WHERE id_user = $user  AND id_tweet = $tweet";
            $getInfo = $db -> prepare($resquest);
            $getInfo -> execute();
            $count = $getInfo -> rowCount();
            return $count > 0 ? true : false;
        }

        public function updateRetweet()
        {
            $user = $this -> currentUser;
            $tweet = $this -> tweetId;
            $db = DATA::PDO();
            $resquest = "INSERT INTO users(id_user, id_tweet) VALUES ($user, $tweet)";
            $getInfo = $db -> prepare($resquest);
            $getInfo -> execute();
            echo "update";
            return $getInfo;
        }

        public function deleteRetweet()
        {
            $user = $this -> currentUser;
            $tweet = $this -> tweetId;
            $db = DATA::PDO();
            $resquest = "DELETE FROM users WHERE id_user = $user  AND id_tweet = $tweet";
            $getInfo = $db -> prepare($resquest);
            $getInfo -> execute();
            echo "delete";
            return $getInfo;
        }
    }

    $tweet = new Retweet($_POST["tweet"], $_SESSION["id"]);
    $checkRetweet = $tweet -> checkRetweet();
    $update = ($checkRetweet != false ? $tweet-> deleteRetweet() : $tweet-> updateRetweet());
?>