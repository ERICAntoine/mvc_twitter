<?php
function getFollowing()
{
    
    $db_connect = new Connect();
    
    $db = $db_connect->connect();
    
    $resquest = "SELECT id_follower,COUNT(id_following) as 'following' FROM follows WHERE id_follower = 1714 GROUP BY 'following'";
    
    $prepare = $db->prepare($resquest);
    
    $prepare->execute();
    
    
    while($follow = $prepare->fetch(PDO::FETCH_ASSOC)){
        $follower[] = $follow;
    }
    return $follower;
}

var_dump(getFollowing());



/* SELECT COUNT FOLLOWER */
function getFollower(){
    
    $db_connect = new Connect();
    
    $db = $db_connect->connect();

    $resquest = "SELECT COUNT(id_follower) as 'follower', id_following FROM follows WHERE id_following = 1714 GROUP BY 'follower'";
    
    $prepare = $db->prepare($resquest);
    
    $prepare->execute();
    
    
    while($follow = $prepare->fetch(PDO::FETCH_ASSOC)){
        
        $follower[] = $follow;
    }
    
    return $follower;
}

echo "\n";

var_dump(getFollower());

function listFollower(){
    
    $db_connect = new Connect();
    
    $db = $db_connect->connect();
    
    $resquest = "SELECT id_follower, id_following, users.last_name, users.first_name FROM follows INNER JOIN users ON follows.id_following = users.id WHERE id_follower = 1714";
    
    $prepare = $db->prepare($resquest);
    
    $prepare->execute();
    
    
    while($follow = $prepare->fetch(PDO::FETCH_ASSOC)){
        $follower[] = $follow;
    }
    
    return $follower;
}

var_dump(listFollower());

function listFollowing(){

    $db_connect = new Connect();
    
    $db = $db_connect->connect();
    
    $resquest = "SELECT id_follower, id_following, users.last_name, users.first_name FROM follows INNER JOIN users ON follows.id_following = users.id WHERE id_following = 1714";
    
    $prepare = $db->prepare($resquest);
    
    $prepare->execute();
    
    while($follow = $prepare->fetch(PDO::FETCH_ASSOC))
    {
        $follower[] = $follow;
    }

    return $follower;
}