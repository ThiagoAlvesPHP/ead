<?php
class Modulos extends model{
	
	public function set($post){
		$sql = $this->db->prepare("
			SELECT * FROM modulos 
			WHERE id_curso = :id_curso 
			AND ordem = :ordem");
		$sql->bindValue(':id_curso', $post['id_curso']);
		$sql->bindValue(':ordem', intval($post['ordem']));
		$sql->execute();

		if ($sql->rowCount() == 0) {
			$fields = [];
	        foreach ($post as $key => $value) {
	            $fields[] = "$key=:$key";
	        }
	        $fields = implode(', ', $fields);
			$sql = $this->db->prepare("INSERT INTO modulos SET {$fields}");

			foreach ($post as $key => $value) {
	            $sql->bindValue(":{$key}", $value);
	        }
			$sql->execute();	

			return true;	
		} else {
			return false;
		}
	}

	public function get($id){
		$sql = $this->db->prepare("SELECT * FROM modeulos WHERE id = :id");
		$sql->bindValue(':id', $id);
		$sql->execute();

		return $sql->fetchAll(PDO::FETCH_ASSOC);
	}

	public function getAllCurso($id_curso){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM modulos WHERE id_curso = :id_curso ORDER BY ordem ASC");
		$sql->bindValue(':id_curso', $id_curso);
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
		$sql = $this->db->prepare("UPDATE cursos SET {$fields} WHERE id = :id");

		foreach ($post as $key => $value) {
            $sql->bindValue(":{$key}", $value);
        }
        $sql->bindValue(':id', $post['id']);
		$sql->execute();
	}
}