<?php 
Class NbTweet extends Data{
    private $sql;
    
    public function main(){
        $this->sql();
    }
    
    public function sql(){

        $vPDO = Data::PDO();
        $sql = "SELECT count(text) as nombre FROM tweets where id_poster = ".$_SESSION['id']."";
        $req = $vPDO->query($sql);
        $data = $req->fetch();

        echo "<strong><a href='#'>".$data['nombre']."</a></strong>";

    }
}
$nbtwee = new NbTweet();
$nbtwee->main();