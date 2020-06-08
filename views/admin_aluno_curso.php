<h1>Curso do aluno</h1>
<hr>
<div class="row">
	<div class="col-sm-5">
		<h3>Cadastrar Curso</h3>
		<?php if (!empty($error)): ?>
			<div class="alert alert-danger">Curso já cadastrado!</div>
		<?php endif; ?>
		<form method="POST">
			<label>Curso</label>
			<select name="id_curso" class="form-control">
				<?php foreach ($cursos as $key => $value): ?>
					<option value="<?=$value['id']; ?>"><?=$value['curso']; ?></option>
				<?php endforeach; ?>
			</select>
			<label>Status</label><br>
				<input type="radio" name="status" value="1"> Pago
				<input type="radio" name="status" value="2"> Aguardando pagamento
				<input type="radio" name="status" value="3"> Gratuíto
			<br><br>
			<button class="btn btn-success">Cadastrar</button>
		</form>
	</div>
	<div class="col-sm-7">
		<h3>Alunos Cadastrados</h3>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Curso</th>
						<th>Status</th>
						<th>Registrado em</th>
						<th>Ação</th>
					</tr>
				</thead>
				<?php foreach ($list as $key => $value): ?>
					<tbody>
						<tr>
							<td><?=$value['curso']; ?></td>
							<td>
								<?php
								if ($value['status'] == 1) {
									echo 'Pago';
								} 
								elseif ($value['status'] == 2) {
									echo 'Aguardando pagamento';
								} 
								else {
									echo "Gratuito";
								}
								?>
							</td>
							<td><?=date('d/m/Y', strtotime($value['dt_registro'])); ?></td>
							<td>
								<a href="<?=BASE.'admin/aluno_curso_edit/'.$value['id']; ?>" class="far fa-edit" title="Editar"></a> |
								<a href="<?=$id_aluno; ?>&del=<?=$value['id']; ?>" class="fas fa-trash-alt" title="Remover curso"></a>

								<i class=""></i>
							</td>
						</tr>
					</tbody>
				<?php endforeach; ?>
			</table>
		</div>
	</div>
</div>