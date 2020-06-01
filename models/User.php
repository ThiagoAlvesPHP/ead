<?php
class User extends model{
	
	public function login($post){
		$sql = $this->db->prepare("
			SELECT id FROM usuarios 
			WHERE login = :login 
			AND senha = :senha");
		$sql->bindValue(':login', $post['login']);
		$sql->bindValue(':senha', md5($post['senha']));
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$id = $sql->fetch(PDO::FETCH_ASSOC);
			$_SESSION['lgAdmin'] = $id['id'];

			return true;
		} else {
			return false;
		}
	}
}