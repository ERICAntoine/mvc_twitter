<?php
    session_start();
    include("../model/pdoConnect.php");
    
    class Uploadvideo extends Data
    {
        public function __construct($file)
        {
            $this->file = $file;
        }

        public function upload()
        {
            if(!empty($this->file["video"]))
            {
                $explode = explode(".",$_FILES["video"]["name"]);

                if($explode[1] == "mp4")
                {
                    $path = "../userImages/" . $_SESSION["id"] . "/";
                    $tmp = $this->file["video"]["tmp_name"];

                    if(file_exists($path."background.mp4")){
                        unlink($path. "background.mp4");
                        $newName = explode(".", $this->file["video"]["name"]);
                        $new = "background". '.' . end($newName);
                        move_uploaded_file($tmp, $path. $new);
                        echo "success";
                        $pathFile = $path .$new;
                    }
                    else{
                        mkdir($path);
                        $newName = explode(".", $this->file["video"]["name"]);
                        echo $new = "background". '.' . end($newName);
                        move_uploaded_file($tmp, $path. $new);
                        echo "success";
                        $pathFile = $path .$new;
                    }
                }
                else
                {
                    echo "Le fichier doit etre au format mp4.";
                    return 0;
                }
            }
        }
    }

    $upload = new Uploadvideo($_FILES);
    $upload -> upload();
?>