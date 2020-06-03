<h1>Cursos</h1>
<hr>
<div class="row">
	<div class="col-sm-5">
		<h3>Cadastrar Curso</h3>
		<?php if (!empty($error)): ?>
			<div class="alert alert-danger">Formato de imagem invalida!</div>
		<?php endif; ?>
		<form method="POST" enctype="multipart/form-data">
			<label>Curso</label>
			<input type="text" name="curso" class="form-control" required="">
			<label>Imagem <small>(Formato PNG - 500 x 500)</small></label>
			<input type="file" name="imagem" class="form-control" required="">
			<label>Valor</label>
			<input type="text" name="valor" class="form-control money" required="">
			<br>
			<button class="btn btn-success">Cadastrar</button>
		</form>
	</div>
	<div class="col-sm-7">
		<h3>Cursos Cadastrados</h3>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Img</th>
						<th>Curso</th>
						<th>Valor</th>
						<th>Status</th>
						<th>Total de alunos</th>
						<th>Ação</th>
					</tr>
				</thead>
				<?php foreach ($list as $key => $value): ?>
					<tbody>
						<tr>
							<td>
								<img width="50" src="<?=BASE.'assets/imagens/'.$value['imagem']; ?>">
							</td>
							<td><?=$value['curso']; ?></td>
							<td>R$<?=number_format($value['valor'], 2, ',', '.'); ?></td>
							<td><?=($value['status'] == 1)?'Ativo':'Inativo'; ?></td>
							<td><?=$value['c']; ?></td>
							<td>
								<a href="<?=BASE.'admin/curso_edit/'.$value['id']; ?>" class="far fa-edit" title="Editar Curso"></a> |
								<a href="<?=BASE.'admin/curso_modulos/'.$value['id']; ?>" class="fas fa-book-open" title="Modulos"></a>
							</td>
						</tr>
					</tbody>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>