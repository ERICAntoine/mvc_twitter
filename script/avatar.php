<?php 
// Class Avatartop extends Data{
    
    // public function main(){
        var_dump($_SESSION);
        if($_SESSION['avatar'] != ''){
            $doss = scandir("uploads/".$_SESSION['id']."/");
            echo "<a href='?c=profil'><img alt='profil' class='img-circle navimg'  src='uploads/".$_SESSION['id']."/".$doss[2]."'></a>";
        }
        else{
            echo "<a href='?c=profil'><img alt='profil' class='img-circle navimg'  src='pics/oeuf.png'></a>";
        }
//     }
// }
// $avat = new Avatartop();
// $avat->main();

?>
