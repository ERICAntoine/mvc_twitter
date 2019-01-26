<?php

class FollowPage extends Data {

    public static function follower()
    {
        $id = $_GET['followers'];
        $vPDO = Data::PDO();
        //echo $sql = "SELECT * FROM follows INNER JOIN users ON follows.id_following = users.id WHERE id_follower = $id";
        $sql = "SELECT id_follower as 'follower', id_following, users.* FROM follows INNER JOIN users ON follows.id_follower = users.id WHERE id_following = $id";
        $req = $vPDO->prepare($sql);
        $req -> execute();
        return $req;
    }


    public static function following()
    {
        $id = $_GET['following'];
        $vPDO = Data::PDO();
        $sql = "SELECT id_follower, id_following as 'following', users.* FROM follows INNER JOIN users ON follows.id_following = users.id WHERE id_follower = $id";
        $req = $vPDO->prepare($sql);
        $req -> execute();
        return $req;
    }   
}
?>