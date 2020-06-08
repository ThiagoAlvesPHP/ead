<?php
class Alunos extends model{

	public function verify($email){
		$sql = $this->db->prepare("SELECT * FROM alunos WHERE email = :email");
		$sql->bindValue(':id', $id);
		$sql->execute();
	
		if ($sql->rowCount() > 0) {
			return false;
		} else {
			return true;
		}
	}
	
	public function set($post){
		$fields = [];
        foreach ($post as $key => $value) {
            $fields[] = "$key=:$key";
        }
        $fields = implode(', ', $fields);
		$sql = $this->db->prepare("INSERT INTO alunos SET {$fields}");

		foreach ($post as $key => $value) {
            $sql->bindValue(":{$key}", $value);
        }
		$sql->execute();		
	}

	public function get($id){
		$sql = $this->db->prepare("SELECT * FROM alunos WHERE id = :id");
		$sql->bindValue(':id', $id);
		$sql->execute();
	
		return $sql->fetch(PDO::FETCH_ASSOC);	
	}

	public function getAll(){
		$array = array();

		$sql = $this->db->prepare("SELECT * FROM alunos ORDER BY nome ASC");
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

	public function up($post){
		$fields = [];
        foreach ($post as $key => $value) {
            $fields[] = "$key=:$key";
        }
        $fields = implode(', ', $fields);
		$sql = $this->db->prepare("UPDATE alunos SET {$fields} WHERE id = :id");

		foreach ($post as $key => $value) {
            $sql->bindValue(":{$key}", $value);
        }
        $sql->bindValue(':id', $post['id']);
		$sql->execute();
	}

	public function setAlunoCurso($post){
		$sql = $this->db->prepare("
			SELECT * FROM aluno_curso 
			WHERE id_aluno = :id_aluno
			AND id_curso = :id_curso");
		$sql->bindValue(':id_aluno', $post['id_aluno']);
		$sql->bindValue(':id_curso', $post['id_curso']);
		$sql->execute();
	
		if ($sql->rowCount() == 0) {
			$fields = [];
	        foreach ($post as $key => $value) {
	            $fields[] = "$key=:$key";
	        }
	        $fields = implode(', ', $fields);
			$sql = $this->db->prepare("INSERT INTO aluno_curso SET {$fields}");

			foreach ($post as $key => $value) {
	            $sql->bindValue(":{$key}", $value);
	        }
			$sql->execute();

			return true;
		} else {
			return false;
		}
		
	}

	public function getAlunoCurso($id_aluno){
		$array = array();

		$sql = $this->db->prepare("
			SELECT aluno_curso.*, cursos.curso FROM aluno_curso 
			INNER JOIN cursos
			ON aluno_curso.id_curso = cursos.id
			WHERE aluno_curso.id_aluno = :id_aluno");
		$sql->bindValue(':id_aluno', $id_aluno);
		$sql->execute();

		if ($sql->rowCount() > 0) {
			$array = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		return $array;
	}

	public function delAlunoCurso($id){
		$sql = $this->db->prepare("
			DELETE FROM aluno_curso WHERE id = :id");
		$sql->bindValue(':id', $id);
		$sql->execute();
	}

	public function getAlunoCursoId($id){
		$sql = $this->db->prepare("
			SELECT aluno_curso.*, cursos.curso FROM aluno_curso
			INNER JOIN cursos
			ON aluno_curso.id_curso = cursos.id
			WHERE aluno_curso.id = :id");
		$sql->bindValue(':id', $id);
		$sql->execute();

		return $sql->fetch(PDO::FETCH_ASSOC);
	}

	public function upAlunoCurso($post){
		
		$fields = [];
        foreach ($post as $key => $value) {
            $fields[] = "$key=:$key";
        }
        $fields = implode(', ', $fields);
		$sql = $this->db->prepare("UPDATE aluno_curso SET {$fields} WHERE id = :id");

		foreach ($post as $key => $value) {
            $sql->bindValue(":{$key}", $value);
        }
        $sql->bindValue("id", $post['id']);
		$sql->execute();
		
	}
}