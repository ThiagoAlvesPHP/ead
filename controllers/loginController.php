<?php
class loginController extends controller {

	public function index() {
		header('Location: '.BASE);	
	}

	public function administrativo() {
		$dados = array();
		$u = new User();
		$post = filter_input_array(INPUT_POST, FILTER_DEFAULT);

		if (!empty($post)) {
			if ($u->login($post)) {
				header('Location: '.BASE.'admin');
			} else {
				$dados['error'] = true;
			}
		}
		$this->loadView('login_administrativo', $dados);
	}

	public function aluno() {
		$dados = array();

		$this->loadTemplate('login_aluno', $dados);
	}
	
}