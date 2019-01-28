<?php
	class Confirm {
		public function __construct() {
		}

		public static function confirm($pseudo) {
			$vPDO = Data::PDO();

			echo 'ici';
			$req = $vPDO->prepare('UPDATE users SET token="1" WHERE pseudo=:pseudo');
			$test = $req->execute([
				'pseudo' => $pseudo
			]);
			
			if ($test) {
				header('Refresh:0;url=?c=home');
			}
		}

	}