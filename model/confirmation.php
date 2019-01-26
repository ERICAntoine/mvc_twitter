<?php
	class Confirm {
		public function __construct() {
		}

		public static function confirm($login) {
			$vPDO = Data::PDO();

			echo 'ici';
			$req = $vPDO->prepare('UPDATE users SET confirmed="confirmed" WHERE login=:login');
			$test = $req->execute([
				'login' => $login
			]);
			
			if ($test) {
				header('Refresh:0;url=?c=home');
			}
		}

	}