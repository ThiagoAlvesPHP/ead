<h1>Editar Curso</h1>
<hr>
<div class="row">
	<div class="col-sm-8">
		<form method="POST" enctype="multipart/form-data">
			<label>Curso</label>
			<input type="text" name="curso" class="form-control" value="<?=$curso['curso']; ?>" required="">
			<label>Valor</label>
			<input type="text" name="valor" class="form-control money" required="" value="<?=number_format($curso['valor'], 2); ?>">
			<label>Status</label><br>
			<?php if($curso['status'] == 1): ?>
				<input type="radio" name="status" checked="" value="1">Ativar
				<input type="radio" name="status" value="2">Desativar
			<?php else: ?>
				<input type="radio" name="status" value="1">Ativar
				<input type="radio" name="status" checked="" value="2">Desativar
			<?php endif; ?>
			<br><br>
			<button class="btn btn-primary">Atualizar</button>
		</form>
	</div>
	<div class="col-sm-4">
		<img height="200" width="100%" src="<?=BASE; ?>assets/imagens/<?=$curso['imagem']; ?>">
		<form method="POST" enctype="multipart/form-data">
			<label>Imagem <span>(Formato PNG - 500 x 500)</span></label>
			<input type="file" name="imagem" class="form-control" required="">
			<input type="text" hidden="" name="img" value="<?=$curso['imagem']; ?>">
			<br>
			<button class="btn btn-primary">Atualizar</button>
		</form>
		
	</div>
</div>
