<h1>Editar Modulo</h1>
<hr>
<form method="POST" enctype="multipart/form-data">
	<label>Modulo</label>
	<input type="text" name="modulo" class="form-control" value="<?=$modulo['modulo']; ?>" required="">
	<label>Ordem</label>
	<input type="text" name="ordem" class="form-control" required="" value="<?=$modulo['ordem']; ?>">
	<label>Status</label><br>
	<?php if($modulo['status'] == 1): ?>
		<input type="radio" name="status" checked="" value="1">Ativar
		<input type="radio" name="status" value="2">Desativar
	<?php else: ?>
		<input type="radio" name="status" value="1">Ativar
		<input type="radio" name="status" checked="" value="2">Desativar
	<?php endif; ?>
	<br><br>
	<button class="btn btn-primary">Atualizar</button>
</form>
