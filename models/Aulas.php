<?php
class Aulas extends model{
	
	public function set($post){
		$fields = [];
        foreach ($post as $key => $value) {
            $fields[] = "$key=:$key";
        }
        $fields = implode(', ', $fields);
		$sql = $this->db->prepare("INSERT INTO aulas SET {$fields}");

		foreach ($post as $key => $value) {
            $sql->bindValue(":{$key}", $value);
        }
		$sql->execute();
	}

	public function get($id){
		$sql = $this->db->prepare("SELECT * FROM aulas WHERE id = :id");
		$sql->bindValue(':id', $id);
		$sql->execute();

		return $sql->fetch(PDO::FETCH_ASSOC);
	}

	public function getAllModulo($id_modulo){
		$array = array();

		$a = new Alunos();
		$array = array();

		$sql = $this->db->prepare("
			SELECT * FROM aulas 
			WHERE id_modulo = :id_modulo 
			ORDER BY ordem ASC");
		$sql->bindValue(':id_modulo', $id_modulo);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;	
	}

	public function up($post){
		$fields = [];
        foreach ($post as $key => $value) {
            $fields[] = "$key=:$key";
        }
        $fields = implode(', ', $fields);
		$sql = $this->db->prepare("UPDATE aulas SET {$fields} WHERE id = :id");

		foreach ($post as $key => $value) {
            $sql->bindValue(":{$key}", $value);
        }
        $sql->bindValue(':id', $post['id']);
		$sql->execute();
	}
}