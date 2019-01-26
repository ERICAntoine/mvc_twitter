<?php
Class Following extends Data{
    
    public function main(){
            $this->sql();
    }
    public function sql(){
        $vPDO = Data::PDO();
        $sql = "SELECT id_follower,COUNT(id_following) as 'following' FROM follows WHERE id_follower = '".$_SESSION['id']."'";
        $req = $vPDO->query($sql);
        $data = $req->fetch();

        echo "<strong><a href='?c=follow&following=".$_SESSION['id']."'>".$data['following']."</a></strong>";

    }
}
$follow = new Following();
$follow->main();
?>