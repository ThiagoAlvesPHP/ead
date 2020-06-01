<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=320px">
<title>Administração</title>
<link href="<?=BASE; ?>assets/img/favicon.png" rel="icon">
<link rel="stylesheet" href="<?=BASE; ?>assets/css/bootstrap.css" type="text/css" />
<link rel="stylesheet" href="<?=BASE; ?>assets/css/fontawesome/css/all.min.css">
<link rel="stylesheet" href="<?=BASE; ?>/assets/css/style.css" type="text/css" />
<link rel="stylesheet" type="text/css" href="<?=BASE; ?>assets/datetime/jquery.datetimepicker.css">
<script type="text/javascript" src="<?=BASE; ?>assets/js/jquery.min.js"></script>
</head>
<body>

<nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">Logo</a>
    </div>
    <div class="collapse navbar-collapse" id="myNavbar">
      <ul class="nav navbar-nav">
        <li class="active"><a href="<?=BASE.'admin'; ?>">Dashboard</a></li>
        <li><a href="<?=BASE.'admin/cursos'; ?>">Cursos</a></li>
      </ul>

      <ul class="nav navbar-nav navbar-right">
        <li><a href="#">Sair</a></li>
      </ul>
    </div>
  </div>
</nav>

<div class="container">
<!-- AQUI COLOCAREMOS AS VIES DO SITE -->
<?php $this->loadViewInTemplate($viewName, $viewData); ?>
</div>


<!-- AQUI COLOCAREMOS O FOOTER -->
<script src="<?=BASE; ?>assets/js/bootstrap.min.js"></script>
<script src="<?=BASE; ?>assets/datetime/jquery.datetimepicker.full.js"></script>
<script src="<?=BASE; ?>assets/js/Chart_js/Chart.min.js"></script>
<script src="<?=BASE; ?>assets/js/Chart_js/utils.js"></script>
<script src="<?=BASE; ?>assets/ckeditor/ckeditor.js"></script>
<script src="<?=BASE; ?>assets/js/jquery.mask.js"></script>
<script type="text/javascript" src="<?=BASE; ?>assets/js/admin.js"></script>

</body>
</html>
