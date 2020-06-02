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

	public function curso_aulas($id_modulo){
		if (!empty($id_modulo)) {
			$dados = array();
			$m = new Modulos();
			$c = new Cursos();

			$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

			$dados['curso'] = $c->get($id_modulo);
			$dados['list'] = $m->getAllCurso($id_modulo);
			$this->loadTemplateAdmin('admin_curso_aulas', $dados);
		} else {
			header('Location: '.BASE.'admin');
		}
	}

}