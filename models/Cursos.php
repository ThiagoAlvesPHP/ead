<?php
class Cursos extends model{
	
	public function set($post){
		$fields = [];
        foreach ($post as $key => $value) {
            $fields[] = "$key=:$key";
        }
        $fields = implode(', ', $fields);
		$sql = $this->db->prepare("INSERT INTO cursos SET {$fields}");

		foreach ($post as $key => $value) {
            $sql->bindValue(":{$key}", $value);
        }
		$sql->execute();
	}

	public function get($id){
		$sql = $this->db->prepare("SELECT * FROM cursos WHERE id = :id");
		$sql->bindValue(':id', $id);
		$sql->execute();

		return $sql->fetch(PDO::FETCH_ASSOC);
	}

	public function getAll(){
		$a = new Alunos();
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM cursos");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
			foreach ($array as $key => $value) {
				$array[$key]['c'] = $a->countCurso($value['id']);
			}
		}	
		return $array;	
	}

	public function getAllAtivos(){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM cursos WHERE status = 1");
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