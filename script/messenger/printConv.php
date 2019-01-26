<?php

class Conv {

	private $PDO;

	public function __construct() {
		$this->PDO = new PDO('mysql:host=localhost;dbname=tweet_academy;charset=utf8', 'eric', '159100');
//		var_dump($_POST);
		$this->printConv();
	}

	public function printConv() {

		$dest = $this->checkPseudo($_POST['dest']);

		if ($dest != '') {

			$vPDO = $this->PDO;
			$req = $vPDO->prepare('SELECT * FROM private_msgs WHERE (id_sender IN (:dest,:source)) AND (id_reciever IN (:dest, :source)) ORDER BY DATE ASC');
			$test = $req->execute([
				'source' => $_POST['id_sender'],
				'dest' => $dest
			]);

			while ($data = $req->fetch()) {
				if ($data['id_sender'] == $_POST['id_sender']) {
					echo '<div class="convRight">
								<div class="convDate">
									<p>'.$data['date'].'</p>
								</div>
								<div class="convContent">
									<p>' . $data['msg'] . '</p>
								</div>		
							  </div>';
				} else {
					echo '<div class="convLeft">
								<div class="convContent">
									<p>' . $data['msg'] . '</p>
								</div>
								<div class="convDate">
									<p>'.$data['date'].'</p>
								</div>
							  </div>';
				}
			}
		} else {
			echo '<p style="color:grey;"> Aucun utilisateur trouver pour le pseudo : <strong>'.$_POST['dest'].'</strong></p>';
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

$sender = new Conv();
