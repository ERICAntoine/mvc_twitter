<?php
class Search extends Data {

    public static function searchAll()
    {
        $input = $_GET['search_bar'];
        $vPDO = Data::PDO();
        $sql = "SELECT * FROM users WHERE pseudo like '%$input%'";
        $req = $vPDO->prepare($sql);
        $req -> execute();
        return $req;
    }   
}


