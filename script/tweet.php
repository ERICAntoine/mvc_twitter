<?php

    session_start();
    include("../model/pdoConnect.php");
    class tweet extends Data 
    {
  
        public function __construct()
        {
        }    
        
        public function tweet()
        {
            if($_POST['content'] != '')
            {
                $content = $_POST['content'];
                $id =$_SESSION['id'];
                $date = date('Y-m-d H:i:s');
                $db = Data::PDO();
                $query = "INSERT INTO tweets (id_poster, text, tweet_date) VALUES ($id ,'".$content."', NOW())";
                //$sql = 'INSERT INTO tweets (id_poster, text , tweet_date ) VALUES (:id, :content,:date)';
                $req = $db  ->prepare($query);
                $req ->execute();
                echo "success";
                /*$result = $req->execute([
                    'id_poster' => $id,
                    'text' => $content,
                    'tweet_date' => $date
                ]);*/
            }
            else
            {
                echo "error";
            }
        }
    }
    $ss = new tweet();
    $ss->tweet();