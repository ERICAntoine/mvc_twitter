<?php

    class Profil extends Data
    {
        public function __construct($profil, $currentUser)
        {
            $this -> profil = $profil;
            $this -> currentUser = $currentUser;
        }

        public function profil()
        {
            $profil = $this -> profil;
            $db = DATA::PDO();
            $resquest = "SELECT id, first_name, last_name, pseudo, email FROM users WHERE users.id = $profil";
            $getInfo = $db -> prepare($resquest);
            $getInfo -> execute();
            return $getInfo;
        }

        public function checkFollowing()
        {
            $user = $this -> currentUser;
            $profil = $this -> profil;
            $db = DATA::PDO();
            $resquest = "SELECT * from follows WHERE id_follower = $user  AND id_following = $profil";
            $getInfo = $db -> prepare($resquest);
            $getInfo -> execute();
            $count = $getInfo -> rowCount();
            return $count > 0 ? true : false;
        }

        public function tweet()
        {
            $profil = $this -> profil;
            $db = DATA::PDO();
            $resquest = "SELECT tweets.id, id_poster, id_retweet, text, tweet_date, users.first_name, users.last_name, users.pseudo FROM tweets INNER JOIN users ON tweets.id_poster = users.id WHERE tweets.id_poster = $profil order by tweet_date DESC";
            $getInfo = $db -> prepare($resquest);
            $getInfo -> execute();
            return $getInfo;
        }

        public function getLike()
        {
            $profil = $this -> profil;
            $db = DATA::PDO();
            $tweetProfil = Profil::tweet();

            while($donnes = $tweetProfil->fetch(PDO::FETCH_ASSOC))
            {
                $idtweet = $donnes["id"];
                $like = "SELECT COUNT(*) as 'nombre' ,tweets.* from likes INNER JOIN tweets ON likes.id_tweet = tweets.id WHERE tweets.id = $idtweet";
                $getInfo = $db -> prepare($like);
                $getInfo -> execute();
                while($donnes2 = $getInfo ->fetch(PDO::FETCH_ASSOC))
                {
                    $u[] = $donnes2["nombre"];
                }
            }
            return $u;
        }

        public function countFollower()
        {
            $profil = $this -> profil;
            $db = DATA::PDO();
            $resquest = "SELECT COUNT(*) AS 'tweet' FROM follows WHERE id_follower = $profil";
            $getInfo = $db -> prepare($resquest);
            $getInfo -> execute();
            $countFollower = $getInfo ->fetch(PDO::FETCH_ASSOC);
            return $countFollower["tweet"]; 
        }

        public function countFollowing()
        {
            $profil = $this -> profil;
            $db = DATA::PDO();
            $resquest = "SELECT COUNT(*) AS 'tweet' FROM follows WHERE id_following = $profil";
            $getInfo = $db -> prepare($resquest);
            $getInfo -> execute();
            $countFollowing = $getInfo ->fetch(PDO::FETCH_ASSOC);
            return $countFollowing["tweet"];
        }

        public function countTweet()
        {
            $profil = $this -> profil;
            $db = DATA::PDO();
            $resquest = "SELECT COUNT(*) AS 'tweet' FROM tweets WHERE id_poster = $profil";
            $getInfo = $db -> prepare($resquest);
            $getInfo -> execute();
            $countTweet = $getInfo ->fetch(PDO::FETCH_ASSOC);
            return $countTweet["tweet"];
        }
    }

    $profil = new Profil($_GET["pseudo"], $_SESSION["id"]);
    $profilInfo = $profil -> profil();
    $allTweet = $profil -> tweet();
    $getLike = $profil -> getLike();
    $incrementLike = 0;
    $following = $profil -> countFollowing();
    $follower = $profil -> countFollower();
    $tweet = $profil -> countTweet();
    $checkFollow = $profil -> checkFollowing();
    $checkFollow = $profil -> checkFollowing();

?>