<h1>Alunos</h1>
<hr>
<div class="row">
	<div class="col-sm-5">
		<h3>Cadastrar Alunos</h3>
		<?php if (!empty($error)): ?>
			<div class="alert alert-danger">Formato de imagem invalida!</div>
		<?php endif; ?>
		<?php if (!empty($error2)): ?>
			<div class="alert alert-danger">Aluno já cadastrado!</div>
		<?php endif; ?>
		<form method="POST" enctype="multipart/form-data">
			<label>Nome</label>
			<input type="text" name="nome" class="form-control" required="">
			<label>Foto <small>(Formato JPEG - 500 x 500)</small></label>
			<input type="file" name="imagem" class="form-control">
			<label>E-mail</label>
			<input type="text" name="email" class="form-control" required="">
			<label>Senha</label>
			<input type="password" name="senha" class="form-control" required="">
			<br>
			<button class="btn btn-success">Cadastrar</button>
		</form>
	</div>
	<div class="col-sm-7">
		<h3>Alunos Cadastrados</h3>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Foto</th>
						<th>Nome</th>
						<th>E-mail</th>
						<th>Status</th>
						<th>Registrado em</th>
						<th>Ação</th>
					</tr>
				</thead>
				<?php foreach ($list as $key => $value): ?>
					<tbody>
						<tr>
							<td>
								<img width="30" src="<?=(!empty($value['foto']))?BASE.'assets/fotos/'.$value['foto']:BASE.'assets/fotos/user.png'; ?>">
							</td>
							<td><?=$value['nome']; ?></td>
							<td><?=$value['email']; ?></td>
							<td><?=($value['status'] == 1)?'Ativo':'Inativo'; ?></td>
							<td><?=date('d/m/Y', strtotime($value['dt_registro'])); ?></td>
							<td>
								<a href="<?=BASE.'admin/aluno_edit/'.$value['id']; ?>" class="far fa-edit" title="Editar Curso"></a> |
								<a href="<?=BASE.'admin/aluno_curso/'.$value['id']; ?>" class="fas fa-book-open" title="Adcionar Curso"></a>
							</td>
						</tr>
					</tbody>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>