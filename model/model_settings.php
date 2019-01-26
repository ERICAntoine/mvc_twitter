<?php

class Personals extends Data
    {
        public function __construct($post)
        {
            $this ->post = $post;
        }

        public function updateInfo()
        {
            if(isset($_POST) && !empty($_POST))
            {
                $db = Data::PDO();
                $id = $_SESSION["id"];
                $pseudo = $this ->post["pseudo"];
                $lastname = $this ->post["lastname"];
                $firstname = $this ->post["firstname"];
                $email = $this ->post["email"];
                $date = $this ->post["date"];
                $theme = $this ->post["theme"];

                $resquest = "UPDATE users SET pseudo = '$pseudo', last_name= '$lastname', first_name = '$firstname', email='$email', birth_date='$date', id_theme = '$theme' WHERE id=$id";
                $update = $db -> prepare($resquest);
                $bool = $update -> execute();
                return $bool;
            }
        }

        public function refresh()
        {
            $db = Data::PDO();
            $id = $_SESSION["id"];
            $resquest = "SELECT * FROM users WHERE id=$id";
            $update = $db -> prepare($resquest);
            $update -> execute();

            while($r  = $update->fetch(PDO::FETCH_ASSOC))
            {
                $_SESSION["pseudo"] = $r["pseudo"];
                $_SESSION["lastname"] = $r["last_name"];
                $_SESSION["firstname"] = $r["first_name"];
                $_SESSION["email"] = $r["email"];
                $_SESSION["date"] = $r["birth_date"];
                $_SESSION["theme"] = $r["id_theme"];
            }
        }

        public function deleteAccount()
        {
            if(isset($_GET["delete"]) && !empty($_GET["delete"]))
            {
                $db = Data::PDO();
                $id = $_SESSION["id"];
                $resquest = "DELETE FROM users WHERE id = $id";
                $update = $db -> prepare($resquest);
                $update -> execute();
                unlink("userImages/". $id."/profil.jpg");
                rmdir("userImages/" . $id);
                header("Location: logout.php");
            }
        }
    }

    $edit = new Personals($_POST);
    $editInfo = $edit -> updateInfo();
    $refesh = ($editInfo != false ? $edit -> refresh() : false);
  //  $edit -> delete();

?>