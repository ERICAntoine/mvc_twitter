<?php

    class Data
    {
        public static function PDO()
        {
            try {

                $PDO = new PDO('mysql:host=localhost;dbname=tweet_academy;', 'eric', '159100', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_WARNING));
                return $PDO;

            } catch(Exeption $e) {

                die('Erreur : '. $e->getMessage());

            }
        }
    }

?>