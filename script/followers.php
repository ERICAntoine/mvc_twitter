<?php
class NbrFollower extends Data
{
    private $user;
    private $sql;
    private $nbr;
    
    public function main()
    {
        $this->sql();        
    }
    
    public function sql()
    {
        $vPDO = Data::PDO();
        $sql = "SELECT COUNT(id_follower) as 'follower', id_following FROM follows WHERE id_following ='".$_SESSION["id"]."'";
        $req = $vPDO->query($sql);
        $data = $req->fetch();
        
        echo "<strong><a href='?c=follow&followers=".$_SESSION['id']."'>".$data['follower']."</a></strong>";
    }
}
$nbfollow = new NbrFollower();
$nbfollow->main();

?>