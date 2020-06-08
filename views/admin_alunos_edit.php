<h1>Editar Aluno</h1>
<hr>
<div class="row">
	<div class="col-sm-4">
		<form method="POST" enctype="multipart/form-data">
			<label>Nome</label>
			<input type="text" name="nome" class="form-control" value="<?=$aluno['nome']; ?>" required="">
			<label>E-mail</label>
			<input type="email" name="email" class="form-control" required="" value="<?=$aluno['email']; ?>">
			<label>Status</label><br>
			<?php if($aluno['status'] == 1): ?>
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
		<form method="POST" enctype="multipart/form-data">
			<label>Nova Senha</label>
			<input type="password" name="senha" class="form-control" required="">
			<br>
			<button class="btn btn-primary">Atualizar</button>
		</form>
	</div>
	<div class="col-sm-4">
		<img height="300" width="100%" src="<?=(!empty($aluno['foto']))?BASE.'assets/fotos/'.$aluno['foto']:BASE.'assets/fotos/user.png'; ?>">
		<?php if (!empty($error)): ?>
			<div class="alert alert-danger">Formato de imagem invalida!</div>
		<?php endif; ?>
		<form method="POST" enctype="multipart/form-data">
			<label>Foto <small>(Formato JPEG - 500 x 500)</small></label>
			<input type="file" name="imagem" class="form-control" required="">
			<input type="text" hidden="" name="imgOut" value="<?=$aluno['foto']; ?>">
			<br>
			<button class="btn btn-primary">Atualizar</button>
		</form>
		
	</div>
</div>