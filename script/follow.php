<?php
    session_start();
    include("../model/pdoConnect.php");

    class Follow extends Data 
    {
        public function __construct($follow, $currentUser)
        {
            $this->follow= $follow;
            $this->currentUser = $currentUser;
        }

        public function follow()
        {
            $user = $this -> currentUser;
            $profil = $this -> follow;
            $db = DATA::PDO();
            $resquest = "SELECT * from follows WHERE id_follower = $user  AND id_following = $profil";
            $getInfo = $db -> prepare($resquest);
            $getInfo -> execute();
            $count = $getInfo -> rowCount();
            return $count > 0 ? true : false;
        }

        public function updateFollow()
        {
            $user = $this -> currentUser;
            $profil = $this -> follow;
            $db = DATA::PDO();
            $resquest = "INSERT INTO follows(id_follower, id_following) VALUES ($user, $profil)";
            $getInfo = $db -> prepare($resquest);
            $getInfo -> execute();
            echo "update";
            return $getInfo;
        }

        public function deleteFollow()
        {
            $user = $this -> currentUser;
            $profil = $this -> follow;
            $db = DATA::PDO();
            $resquest = "DELETE FROM follows WHERE id_follower = $user  AND id_following = $profil";
            $getInfo = $db -> prepare($resquest);
            $getInfo -> execute();
            echo "delete";
            return $getInfo;
        }
    }

    $follow = new Follow($_POST["follow"], $_SESSION["id"]);
    $follower = $follow -> follow();
    $update = ($follower != false ? $follow-> deleteFollow() : $follow-> updateFollow());
?>