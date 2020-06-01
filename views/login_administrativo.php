<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=320px">
<title>Padrão MVC</title>
<link href="<?=BASE; ?>assets/img/favicon.png" rel="icon">
<link rel="stylesheet" href="<?=BASE; ?>assets/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?=BASE; ?>assets/css/fontawesome/css/all.min.css">
<link rel="stylesheet" href="<?=BASE; ?>/assets/css/style.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?=BASE; ?>assets/datetime/jquery.datetimepicker.css">
<script type="text/javascript" src="<?=BASE; ?>assets/js/jquery.min.js"></script>
<script src="<?=BASE; ?>assets/js/bootstrap.min.js"></script>

</head>
<body style="background-color: #c0c0c0;">

<div class="row" style="margin-top: 100px;">
	<div class="col-sm-4"></div>
	<div class="col-sm-4">
		<div class="alert alert-info">
			<div class="text-center">
				<h3>Administrativa</h3>
				<?php if (!empty($error)): ?>
					<div class="alert alert-danger">Login e/ou senha incorretos</div>
				<?php endif; ?>
				<hr>
			</div>
			<form method="POST">
				<div class="input-group">
				    <span class="input-group-addon">
				    	<i class="fas fa-user"></i>
				    </span>
				    <input type="text" class="form-control" name="login" autofocus="" placeholder="Login">
				</div>
				<br>
				<div class="input-group">
				    <span class="input-group-addon">
				    	<i class="fas fa-key"></i>
				    </span>
				    <input type="password" class="form-control" name="senha" placeholder="Password">
				</div>
				<br>
				<button class="btn btn-success btn-block">Logar</button>
			</form>
		</div>
	</div>
	<div class="col-sm-4"></div>
</div>


<!-- AQUI COLOCAREMOS O FOOTER -->
<script src="<?=BASE; ?>assets/datetime/jquery.datetimepicker.full.js"></script>
<script src="<?=BASE; ?>assets/js/Chart_js/Chart.min.js"></script>
<script src="<?=BASE; ?>assets/js/Chart_js/utils.js"></script>
<script src="<?=BASE; ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?=BASE; ?>assets/js/script.js"></script>

</body>
</html>
