<?php
session_start();
class Contact {
	
	private $PDO;
	
	public function __construct() {
		$this->PDO = new PDO('mysql:host=localhost;dbname=tweet_academy;charset=utf8', 'eric', '159100');
		
		//			var_dump($_POST);
		if ($_POST['sentReceived'] == 'received') {
			$this->received();
		} else {
			$this->sent();
		}
		
	}
	
	public function received() {
		$id_post = $_SESSION['id'];
		$vPDO = $this->PDO;
		$sql = "SELECT * FROM private_msgs as m, users as u WHERE m.id_sender=u.id AND id_reciever=$id_post ORDER BY date";
		$req = $vPDO->query($sql);
		
		while ($data = $req->fetch()) {
			
			echo '<div style="background-color: rgba(197,239,247,0.8);" class="contactBox">';
			echo '	<div class="contactTitle">';
			echo '		<h2>'.$data['pseudo'].' : '.$data['last_name'].' '.$data['first_name'].'</h2>';
			echo '		<p>'.$data['msg'].'</p>';
			echo '	</div>';
			echo '	<p>'.$data['date'].'</p>';
			echo '</div>';
		}
	}
	
	public function sent() {
		$id = $_SESSION['id'];
		$vPDO = $this->PDO;
		$sql = "SELECT * FROM private_msgs as m, users as u WHERE m.id_reciever=u.id AND id_sender=$id";
		$req = $vPDO->query($sql);
		
		while ($data = $req->fetch()) {
			
			echo '<div style="background-color: rgba(200,247,197,0.8);" class="contactBox">';
			echo '	<div class="contactTitle">';
			echo '		<h2>'.$data['pseudo'].' : '.$data['last_name'].' '.$data['first_name'].'</h2>';
			echo '		<p>=> '.$data['msg'].'</p>';
			echo '	</div>';
			echo '	<p>'.$data['date'].'</p>';
			echo '</div>';
		}
	}
	
}

$contact = new Contact();
//	$contact->received();

//SELECT u.lastname, id_sender,id_receiver,content,date FROM messages as m LEFT JOIN users as u ON u.id=m.id_receiver LEFT JOIN users ON u.id=m.id_sender WHERE id_sender AND id_receiver IN (44,43) ORDER BY date DESC;
?>
