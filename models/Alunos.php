<?php
class Alunos extends model{
	
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

	public function getAll(){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM cursos");
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}	
		return $array;	
	}

	public function countCurso($id_curso){
		$sql = $this->db->prepare('
			SELECT COUNT(*) as c FROM aluno_curso 
			WHERE id_curso = :id_curso');
		$sql->bindValue(':id_curso', $id_curso);
		$sql->execute();

		$c = $sql->fetch(PDO::FETCH_ASSOC);

		return $c['c'];
	}
}