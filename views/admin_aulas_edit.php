<h1>Editar Aula</h1>
<hr>
<div class="row">
	<div class="col-sm-8">
		<form method="POST" enctype="multipart/form-data">
			<label>Título</label>
			<input type="text" name="titulo" class="form-control" value="<?=$aula['titulo']; ?>" required="">
			<label>Vídeo <small>(Link vímeo - apenas os números)</small></label>
			<input type="text" name="video" class="form-control" required="" value="<?=$aula['video']; ?>">
			<label>Ordem</label>
			<input type="text" name="ordem" class="form-control" required="" value="<?=$aula['ordem']; ?>">
			<label>Status</label><br>
			<?php if($aula['status'] == 1): ?>
				<input type="radio" name="status" checked="" value="1"> Ativar
				<input type="radio" name="status" value="2"> Desativar
			<?php else: ?>
				<input type="radio" name="status" value="1"> Ativar
				<input type="radio" name="status" checked="" value="2"> Desativar
			<?php endif; ?>
			<br><br>
			<button class="btn btn-primary">Atualizar</button>
		</form>
	</div>
	<div class="col-sm-4">
		<?php if (!empty($error)): ?>
			<div class="alert alert-danger">Arquivo no formato incorreto</div>
		<?php endif; ?>
		<form method="POST" enctype="multipart/form-data">
			<label>PDF <small>(Formato PDF)</small></label>
			<input type="file" name="pdf" class="form-control" required="">
			<input type="text" hidden="" name="pdf_out" value="<?=$aula['pdf']; ?>">
			<br>
			<button class="btn btn-primary">Atualizar</button>
		</form>
		
	</div>
</div>
