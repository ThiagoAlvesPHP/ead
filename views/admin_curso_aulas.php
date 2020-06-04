<h1>Modulo:  <?=$modulo['modulo']; ?></h1>
<hr>
<div class="row">
	<div class="col-sm-5">
		<h3>Cadastrar Aula</h3>
		<?php if (!empty($error)): ?>
			<div class="alert alert-danger">Arquivo no formato incorreto</div>
		<?php endif; ?>
		<form method="POST" enctype="multipart/form-data">
			<label>Título</label>
			<input type="text" name="titulo" class="form-control" required="">
			<label>Aula <small>(Link)</small></label>
			<input type="text" name="video" class="form-control" required="">
			<label>Arquivo PDF <small>(Formato PDF)</small></label>
			<input type="file" name="pdf" class="form-control" required="">
			<label>Ordem <small>(Apenas números)</small></label>
			<input type="text" name="ordem" class="form-control" required="" placeholder="Ex: 1 ou 1.2">
			<br>
			<button class="btn btn-success">Cadastrar</button>
		</form>
	</div>
	<div class="col-sm-7">
		<h3>Aulas Cadastradas</h3>
		<div class="table-responsive">
			<table class="table table-hover">
				<thead>
					<tr>
						<th>Ordem</th>
						<th>Título</th>
						<th>Aula</th>
						<th>PDF</th>
						<th>Status</th>
						<th>Registrado em</th>
						<th>Ação</th>
					</tr>
				</thead>
				<?php foreach ($list as $key => $value): ?>
					<tbody>
						<tr>
							<td><?=$value['ordem']; ?></td>
							<td><?=$value['titulo']; ?></td>
							<td>
								<span class="fas fa-video" data-toggle="modal" data-target="#video<?=$value['id']; ?>"></span>

								<div id="video<?=$value['id']; ?>" class="modal fade" role="dialog">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title"><?=$value['titulo']; ?></h4>
								      </div>
								      <div class="modal-body">
								        <iframe src="https://player.vimeo.com/video/<?=$value['video']; ?>" width="100%" height="350" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
								      </div>
								    </div>
								  </div>
								</div>
								
							</td>
							<td>
								<span class="fas fa-file-pdf" data-toggle="modal" data-target="#pdf<?=$value['id']; ?>"></span>

								<div id="pdf<?=$value['id']; ?>" class="modal fade" role="dialog">
								  <div class="modal-dialog">
								    <div class="modal-content">
								      <div class="modal-header">
								        <button type="button" class="close" data-dismiss="modal">&times;</button>
								        <h4 class="modal-title"><?=$value['titulo']; ?></h4>
								      </div>
								      <div class="modal-body">
								        <iframe src="<?=BASE.'assets/aulas/'.$value['pdf']; ?>" width="100%" height="350" frameborder="0" allow="autoplay; fullscreen" allowfullscreen></iframe>
								      </div>
								      <div class="modal-footer">
								        <button type="button" class="btn btn-danger" data-dismiss="modal">Fechar</button>
								      </div>
								    </div>
								  </div>
								</div>
							</td>
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