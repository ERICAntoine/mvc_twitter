<?php
    session_start();
    include("../model/pdoConnect.php");
    
    class UploadImage extends Data
    {
        public function __construct($file)
        {
            $this->file = $file;
        }

        public function upload()
        {
            if(!empty($this->file["image"]))
            {
                $verif = getimagesize($this->file["image"]["tmp_name"]);
                $path = "../userImages/" . $_SESSION["id"] . "/";
                $tmp = $this->file["image"]["tmp_name"];
                $extension = pathinfo($_FILES["image"]["name"], PATHINFO_EXTENSION);
                echo "hello";
                if($verif !== false){
                    if($extension == "jpg"){
                        if(file_exists($path."profil.jpg")){
                            unlink($path. "profil.jpg");
                            $newName = explode(".", $this->file["image"]["name"]);
                            $new = "profil". '.' . end($newName);
                            move_uploaded_file($tmp, $path. $new);
                            echo "success";
                            $pathFile = $path .$new;
                            $resquest = "INSERT INTO images(url) VALUES ('$pathFile')";
                            $db = Data::PDO();
                            $db ->query($resquest);

                        }
                        else{
                            mkdir($path);
                            $newName = explode(".", $this->file["image"]["name"]);
                            echo $new = "profil". '.' . end($newName);
                            move_uploaded_file($tmp, $path. $new);
                            echo "success";
                            $pathFile = $path .$new;
                            $resquest = "INSERT INTO images(url) VALUES ('$pathFile')";
                            $db = Data::PDO();
                            $db ->query($resquest);
                        }
                    }
                    else{
                        echo "Le fichier doit etre en JPG.";
                        return 0;
                    }
                } 
                else
                {
                    echo "Mettre une image.";
                    return 0;
                }  
            }
        }
    }

    $upload = new UploadImage($_FILES);
    $upload -> upload();
?>