<?php

class tweet extends Data {
    
    public function __construct()
    {
    }    
    
    public function tweet(){
        if(isset($_POST['post_tweet']) && $_POST['content'] != ''){
            $content = $_POST['content'];
            $id =$_SESSION['id'];
            $date = date('Y-m-d H:i:s');
            $db = Data::PDO();
            $query = "INSERT INTO tweets (id_poster, text, tweet_date) VALUES ($id ,'".$content."', NOW())";
            //$sql = 'INSERT INTO tweets (id_poster, text , tweet_date ) VALUES (:id, :content,:date)';
            $req = $db  ->prepare($query);
            $req ->execute();
            /*$result = $req->execute([
                'id_poster' => $id,
                'text' => $content,
                'tweet_date' => $date
            ]);*/
            }
            /*else{
                include script/alert.js;
            }
            if($result===true){
                echo "ok";
            }
            else{
                echo "pas ok";   
            }*/ 
        }
        
}
    $ss = new tweet();
    $ss->tweet();