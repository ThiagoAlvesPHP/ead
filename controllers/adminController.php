<?php
class adminController extends controller {

	public function __construct(){
		if (empty($_SESSION['lgAdmin'])) {
			header('Location: '.BASE.'login/administrativo/');
		}
	}

	public function index() {
		$dados = array();

		$this->loadTemplateAdmin('admin_dashboard', $dados);
	}

	public function cursos(){
		$dados = array();
		$c = new Cursos();
		$i = new Imagem();

		$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		if (!empty($post['curso'])) {
			if ($_FILES['imagem']['type'] == 'image/png') {
				$url = 'assets/imagens/';
				$imagem = md5($_FILES['imagem']['tmp_name'].time().rand(0,999)).'.png';
				$post['imagem'] = $imagem;
				$i->png(500, 500, $url, $imagem);
				$c->set($post);
				header('Location: '.BASE.'admin/cursos');

			} else {
				$dados['error'] = true;
			}
		}

		$dados['list'] = $c->getAll();
		$this->loadTemplateAdmin('admin_cursos', $dados);
	}

	public function curso_edit($id){
		if (!empty($id)) {
			$dados = array();
			$c = new Cursos();
			$i = new Imagem();

			$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			

			if (!empty($post['curso'])) {
				$post['id'] = $id;
				$c->up($post);
				header('Location: '.BASE.'admin/curso_edit/'.$id);
			}

			if (!empty($_FILES['imagem'])) {
				if ($_FILES['imagem']['type'] == 'image/png') {
					$url = 'assets/imagens/';
					$imagem = md5($_FILES['imagem']['tmp_name'].time().rand(0,999)).'.png';
					$post['imagem'] = $imagem;
					$post['id'] = $id;

					if (isset($post['img'])) {
						if (!empty($post['img'])) {
							if (file_exists($url.$post['img'])) {
								unlink($url.$post['img']);
							}
						}
						unset($post['img']);
					}
					$i->png(500, 500, $url, $imagem);
					$c->up($post);
					header('Location: '.BASE.'admin/curso_edit/'.$id);

				} else {
					$dados['error'] = true;
				}
			}

			$dados['curso'] = $c->get($id);
			$this->loadTemplateAdmin('admin_curso_edit', $dados);
		} else {
			header('Location: '.BASE.'admin');
		}
	}

	public function curso_modulos($id_curso){
		if (!empty($id_curso)) {
			$dados = array();
			$m = new Modulos();
			$c = new Cursos();

			$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($post['modulo'])) {
				$post['id_curso'] = $id_curso;
				if ($m->set($post)) {
					header('Location: '.BASE.'admin/curso_modulos/'.$id_curso);
				} else {
					$dados['error'] = true;
				}
			}
			
			$dados['curso'] = $c->get($id_curso);
			$dados['list'] = $m->getAllCurso($id_curso);
			$this->loadTemplateAdmin('admin_curso_modulos', $dados);
		} else {
			header('Location: '.BASE.'admin');
		}
	}

	public function curso_modulo_edit($id_modulo){
		if (!empty($id_modulo)) {
			$dados = array();
			$m = new Modulos();

			$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($post['modulo'])) {
				$post['id'] = $id_modulo;
				$m->up($post);
				header('Location: '.BASE.'admin/curso_modulo_edit/'.$id_modulo);
			}

			$dados['modulo'] = $m->get($id_modulo);
			$this->loadTemplateAdmin('admin_modulo_edit', $dados);
		} else {
			header('Location: '.BASE.'admin');
		}
	}

	public function curso_aulas($id_modulo){
		if (!empty($id_modulo)) {
			$dados = array();
			$m = new Modulos();
			$a = new Aulas();

			$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($post['video'])) {
				if ($_FILES['pdf']['type'] == 'application/pdf') {
					$post['pdf'] = md5($_FILES['pdf']['tmp_name'].time().rand(0,999)).'.pdf';
					$post['id_modulo'] = $id_modulo;
					move_uploaded_file($_FILES['pdf']['tmp_name'], 'assets/aulas/'.$post['pdf']);
					$a->set($post);
					header('Location: '.BASE.'admin/curso_aulas/'.$id_modulo);
				} else {
					$dados['error'] = true;
				}
			}

			$dados['modulo'] = $m->get($id_modulo);
			$dados['list'] = $a->getAllModulo($id_modulo);
			$this->loadTemplateAdmin('admin_curso_aulas', $dados);
		} else {
			header('Location: '.BASE.'admin');
		}
	}

	public function curso_aula_edit($id_aula){
		if (!empty($id_aula)) {
			$dados = array();
			$m = new Modulos();
			$a = new Aulas();

			$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($post['video'])) {
				$post['id'] = $id_aula;
				$a->up($post);
				header('Location: '.BASE.'admin/curso_aula_edit/'.$id_aula);
			}

			if (!empty($_FILES['pdf'])) {
				if ($_FILES['pdf']['type'] == 'application/pdf') {
					if (!empty($post['pdf_out'])) {
						if (file_exists('assets/aulas/'.$post['pdf_out'])) {
							unlink('assets/aulas/'.$post['pdf_out']);
						}
						unset($post['pdf_out']);
					}
					$post['pdf'] = md5($_FILES['pdf']['tmp_name'].time().rand(0,999)).'.pdf';
					$post['id'] = $id_aula;
					move_uploaded_file($_FILES['pdf']['tmp_name'], 'assets/aulas/'.$post['pdf']);
					$a->up($post);
					header('Location: '.BASE.'admin/curso_aula_edit/'.$id_aula);
				} else {
					$dados['error'] = true;
				}
			}

			$dados['aula'] = $a->get($id_aula);
			$dados['list'] = $a->getAllModulo($id_aula);
			$this->loadTemplateAdmin('admin_aulas_edit', $dados);
		} else {
			header('Location: '.BASE.'admin');
		}
	}

	//area dos alunos - administração
	public function alunos(){
		$dados = array();
		$a = new Alunos();
		$i = new Imagem();

		$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		if (!empty($post['email'])) {
			$post['senha'] = md5($post['senha']);

			if ($a->verify($post['email'])) {
				if (!empty($_FILES['imagem'])) {
					if ($_FILES['imagem']['type'] == 'image/jpeg') {
						$url = 'assets/fotos/';
						$foto = md5($_FILES['imagem']['tmp_name'].time().rand(0,999)).'.jpeg';
						$post['foto'] = $foto;
						$i->jpeg(500, 500, $url, $foto);
						
					}  else {
						$dados['error'] = true;
					}	
				}

				$a->set($post);
				header('Location: '.BASE.'admin/alunos');
			} else {
				$dados['error2'] = true;
			}			
		}

		$dados['list'] = $a->getAll();
		$this->loadTemplateAdmin('admin_alunos', $dados);
	}

	public function aluno_edit($id_aluno){
		if (!empty($id_aluno)) {
			$dados = array();
			$a = new Alunos();
			$i = new Imagem();

			$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($post['nome'])) {
				$post['id'] = $id_aluno;
				$a->up($post);
				header('Location: '.BASE.'admin/aluno_edit/'.$id_aluno);
			}

			if (!empty($post['senha'])) {
				$post['id'] = $id_aluno;
				$post['senha'] = md5($post['senha']);
				$a->up($post);
				header('Location: '.BASE.'admin/aluno_edit/'.$id_aluno);
			}

			if (!empty($_FILES['imagem'])) {
				$post['id'] = $id_aluno;
				if ($_FILES['imagem']['type'] == 'image/jpeg') {
					$url = 'assets/fotos/';
					$foto = md5($_FILES['imagem']['tmp_name'].time().rand(0,999)).'.jpeg';
					$post['foto'] = $foto;

					if (!empty($post['imgOut'])) {
						if (file_exists($url.$post['imgOut'])) {
							unlink($url.$post['imgOut']);
						}
					}
					unset($post['imgOut']);
					$i->jpeg(500, 500, $url, $foto);
					$a->up($post);
					header('Location: '.BASE.'admin/aluno_edit/'.$id_aluno);
				}  else {
					$dados['error'] = true;
				}	
			}

			$dados['aluno'] = $a->get($id_aluno);
			$this->loadTemplateAdmin('admin_alunos_edit', $dados);
		} else {
			header('Location: '.BASE.'admin');
		}
	}

	public function aluno_curso($id_aluno){
		if (!empty($id_aluno)) {
			$dados = array();
			$a = new Alunos();
			$c = new Cursos();

			$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);
			$get = filter_input_array(INPUT_GET, FILTER_DEFAULT);

			if (!empty($post['status'])) {
				$post['id_aluno'] = $id_aluno;
				if ($a->setAlunoCurso($post)) {
					header('Location: '.BASE.'admin/aluno_curso/'.$id_aluno);
				} else {
					$dados['error'] = true;
				}
			}

			if (!empty($get['del'])) {
				$a->delAlunoCurso($get['del']);
				header('Location: '.BASE.'admin/aluno_curso/'.$id_aluno);
			}
			$dados['id_aluno'] = $id_aluno;
			$dados['cursos'] = $c->getAllAtivos();
			$dados['list'] = $a->getAlunoCurso($id_aluno);
			$this->loadTemplateAdmin('admin_aluno_curso', $dados);
		} else {
			header('Location: '.BASE.'admin');
		}
	}

	public function aluno_curso_edit($id) {
		if (!empty($id)) {
			$dados = array();
			$a = new Alunos();
			$c = new Cursos();
			$dados['get'] = $a->getAlunoCursoId($id);

			$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			if (!empty($post['status'])) {
				$post['id'] = $id;
				$a->upAlunoCurso($post);
				header('Location: '.BASE.'admin/aluno_curso_edit/'.$id);
			}

			
			$dados['cursos'] = $c->getAllAtivos();
			$this->loadTemplateAdmin('admin_aluno_curso_edit', $dados);
		} else {
			header('Location: '.BASE.'admin');
		}
	}
}