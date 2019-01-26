<?php 
    include("../model/pdoConnect.php");
/*Class Timeline extends Data{
    
    private $ID_follows;
    private $sql;
    
    
    public function main(){
        // $this->sqlfollowtweet();
        // $this->followtweetID();
        $this->sql();
        // $this->html();
    }
    
    // public function followtweetID(){
        //     $follows = substr($this->ID_follows['follows'], 0, -1);
        //     $follows = substr($follows, 1);
        //     $this->allfollowid = str_replace(";", ", ", $follows);
        
        // }
        
        // public function sqlfollowtweet(){
            
            //     $vPDO = Data::PDO();
            //     $sql = "SELECT count(text) as nombre FROM tweets where id_poster = ".$_SESSION['id']."";
            //     $req = $vPDO->query($sql);
            //     $data = $req->fetch();
            //     $followID = $this->link->query("SELECT follows FROM users where id='".$_SESSION['id']."'");
            
            //     $this->ID_follows = $followID->fetch();
            
            
            // }
            
            public function sql(){
                
                $vPDO = Data::PDO();

                $sql = "SELECT * FROM tweets where id_poster = ".$_SESSION['id']."";
                $req = $vPDO->query($sql);

                $sql2= "SELECT pseudo from users where id = ".$_SESSION['id']."";
                $req2 = $vPDO->query($sql2);

                
                while ($data = $req->fetch() && $data2 = $req2->fetch()){
                    if($data['img_profile'] == 0){
                        echo"<div class='media'>
                        <a class='media-left' href='#'>
                        <img alt='' class='img-circle profimg' src='pics/oeuf.png'>
                        </a>
                        <div class='media-body'>
                        <h4 class='media-heading'>@".$data2['pseudo']."</h4>
                        <p>".$data['text']."</p>
                        <ul class='nav nav-pills nav-pills-custom'>
                        <li><a href='#'><span class='glyphicon glyphicon-share-alt'></span></a></li>
                        <li><a href='#'><span class='glyphicon glyphicon-retweet'></span></a></li>
                        <li><a href='#'><span class='glyphicon glyphicon-star'></span></a></li>
                        <li class='dropdown'><span class='glyphicon glyphicon-option-horizontal'></span></li>
                        
                        
                        </ul>
                        </div>
                        </div>";
                    }else{
                        // $doss = scandir("uploads/".$data['id']."/");
                        
                        echo"<div class='media'>
                        <a class='media-left' href='#'>
                        <img alt='' class='img-circle profimg' src='uploads/".$data['id']."/".$doss[2]."'>
                        </a>
                        <div class='media-body'>
                        <h4 class='media-heading'>@".$data2['pseudo']."</h4>
                        <p>".$data['text']."</p>
                        <ul class='nav nav-pills nav-pills-custom'>
                        <li><a href='#'><span class='glyphicon glyphicon-share-alt'></span></a></li>
                        <li><a href='#'><span class='glyphicon glyphicon-retweet'></span></a></li>
                        <li><a href='#'><span class='glyphicon glyphicon-star'></span></a></li>
                        <li class='dropdown'><span class='glyphicon glyphicon-option-horizontal'></span></li>
                        
                        
                        </ul>
                        </div>
                        </div>";
                    }
                    
                }
            }
        }
        $time = new Timeline();
        $time->main();*/


        class Timeline extends Data
        {
            public function __construct($currentUser)
            {
                $this-> currentUser = $currentUser;
            }

            public function timeline()
            {
                $user = $this -> currentUser;
                $db = DATA::PDO();
                $query = "SELECT follows.*,tweets.*, users.pseudo FROM follows INNER JOIN tweets ON follows.id_following = tweets.id_poster  INNER JOIN users ON tweets.id_poster = users.id WHERE id_follower = $user";
                $getInfo = $db -> prepare($query);
                $getInfo -> execute();
                while($donnes = $getInfo -> fetch(PDO::FETCH_ASSOC))
                {
                    $t[] = $donnes;
                }

                $resquest = "SELECT * FROM tweets INNER JOIN users ON tweets.id_poster = users.id WHERE id_poster = $user";
                $getInfo2 = $db -> prepare($resquest);
                $getInfo2 -> execute();

                while($donnes2 = $getInfo2 -> fetch(PDO::FETCH_ASSOC))
                {
                    $t[] = $donnes2;
                }

                $jsonTimeline = json_encode($t);
                echo $jsonTimeline;
            }
        }

        $timeline = new Timeline($_POST["id"]);
        $timeline ->timeline();
    
        ?>