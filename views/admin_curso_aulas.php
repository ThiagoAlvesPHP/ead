<h1><?=$curso['curso']; ?></h1>
<h2>Modulo: </h2>
<hr>
<div class="row">
	<div class="col-sm-5">
		<h3>Cadastrar Aula</h3>
		<?php if (!empty($error)): ?>
			<div class="alert alert-danger">Ordem já Cadastrada!</div>
		<?php endif; ?>
		<form method="POST" enctype="multipart/form-data">
			<label>Aula <small>(Link)</small></label>
			<input type="text" name="modulo" class="form-control" required="">
			<label>Arquivo PDF <small>(Formato PDF)</small></label>
			<input type="file" name="imagem" class="form-control" required="">
			<label>Ordem <small>(Apenas números)</small></label>
			<input type="text" name="ordem" class="form-control" required="" placeholder="Ex: 1 ou 1.2">
			<br>
			<button class="btn btn-success">Cadastrar</button>
		</form>
	</div>
	<div class="col-sm-7">
		<h3>Modulos Cadastrados</h3>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Ordem</th>
						<th>Modulo</th>
						<th>Status</th>
						<th>Registrado em</th>
						<th>Ação</th>
					</tr>
				</thead>
				<?php foreach ($list as $key => $value): ?>
					<tbody>
						<tr>
							<td><?=$value['ordem']; ?></td>
							<td><?=$value['modulo']; ?></td>
							<td><?=($value['status'] == 1)?'Ativo':'Inativo'; ?></td>
							<td><?=date('d/m/Y', strtotime($value['dt_registro'])); ?></td>
							<td>
								<a href="<?=BASE.'admin/curso_modulo_edit/'.$value['id']; ?>" class="far fa-edit" title="Editar Modulo"></a> |
								<a href="<?=BASE.'admin/curso_aulas/'.$value['id']; ?>" class="fas fa-video" title="Aulas"></a>
							</td>
						</tr>
					</tbody>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>