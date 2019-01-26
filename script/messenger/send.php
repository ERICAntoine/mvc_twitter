<?php

	class Sender {

		private $PDO;

		public function __construct() {
			$this->PDO = new PDO('mysql:host=localhost;dbname=tweet_academy;charset=utf8', 'eric', '159100');
			// var_dump($_POST);
			$this->send();
		}

		public function send() {

			$vPDO = $this->PDO;
			$id_receiver = $this->checkPseudo($_POST['dest']);

			if ($id_receiver != '') {

				$id_sender = $_POST['id_sender'];
				$msg = $_POST['content'];
				$today = date('Y-m-d H:i:s');

				$sql = 'INSERT INTO private_msgs (id_sender,id_reciever,msg,date) VALUES(:id_sender,:id_reciever,:msg,:today)';

				$req = $vPDO->prepare($sql);
				$req->execute([
					'id_sender' => $id_sender,
					'id_reciever' => $id_receiver,
					'msg' => $msg,
					'today' => $today
				]);
			} else {
				echo 'le pseudo n\'existe pas';
			}

		}

		public function checkPseudo($pseudo) {
			$vPDO =$this->PDO;
			$req = $vPDO->prepare('SELECT id FROM users WHERE pseudo=:pseudo');
			$req->execute([
				'pseudo' => $pseudo
			]);
			$data = $req->fetch();
			$id = $data['id'];
			return $id;
		}

	}

	$sender = new Sender();

?>
