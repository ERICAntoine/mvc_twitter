<?php
Class Theme extends Data{
    
    public function main(){
        if ($_SESSION['theme'] == "2"){
            echo "<link rel='stylesheet' type='text/css' href='view/assets/css/homedark.css'>";
        }
    }
}
$themeuser = new Theme();
$themeuser->main();
?>