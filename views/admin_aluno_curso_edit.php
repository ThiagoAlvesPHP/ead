<h1>Curso do aluno - Editar</h1>
<hr>

<h3>Cadastrar Curso</h3>
<?php if (!empty($error)): ?>
	<div class="alert alert-danger">Curso já cadastrado!</div>
<?php endif; ?>
<form method="POST">
	<label>Curso</label>
	<input type="text" name="" value="<?=$get['curso']; ?>" class="form-control">
	<label>Status</label><br>
		<?php if($get['status'] == 1): ?>
			<input type="radio" name="status" checked="" value="1"> Pago
			<input type="radio" name="status" value="2"> Aguardando pagamento
			<input type="radio" name="status" value="3"> Gratuíto
		<?php elseif($get['status'] == 2): ?>
			<input type="radio" name="status" value="1"> Pago
			<input type="radio" name="status" checked="" value="2"> Aguardando pagamento
			<input type="radio" name="status" value="3"> Gratuíto
		<?php else: ?>
			<input type="radio" name="status" value="1"> Pago
			<input type="radio" name="status" value="2"> Aguardando pagamento
			<input type="radio" name="status" checked="" value="3"> Gratuíto
		<?php endif; ?>
		
	<br><br>
	<button class="btn btn-success">Cadastrar</button>
</form>