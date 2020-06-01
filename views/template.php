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
<body>

<!-- <nav class="navbar navbar-inverse">
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
        <li class="active"><a href="#">Home</a></li>
        <li><a href="#">Messages</a></li>
      </ul>
      <form class="navbar-form navbar-right" role="search">
        <div class="form-group input-group">
          <input type="text" class="form-control" placeholder="Search..">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">
              <span class="glyphicon glyphicon-search"></span>
            </button>
          </span>        
        </div>
      </form>
      <ul class="nav navbar-nav navbar-right">
        <li><a href="#"><span class="glyphicon glyphicon-user"></span> My Account</a></li>
      </ul>
    </div>
  </div>
</nav> -->
<a href="<?=BASE.'login/administrativo/'; ?>">Admin</a>
<a href="<?=BASE.'login/aluno/'; ?>">Aluno</a>

<div class="container">
<!-- AQUI COLOCAREMOS AS VIES DO SITE -->
<?php $this->loadViewInTemplate($viewName, $viewData); ?>
</div>


<!-- AQUI COLOCAREMOS O FOOTER -->
<script src="<?=BASE; ?>assets/datetime/jquery.datetimepicker.full.js"></script>
<script src="<?=BASE; ?>assets/js/Chart_js/Chart.min.js"></script>
<script src="<?=BASE; ?>assets/js/Chart_js/utils.js"></script>
<script src="<?=BASE; ?>assets/ckeditor/ckeditor.js"></script>
<script type="text/javascript" src="<?=BASE; ?>assets/js/script.js"></script>

</body>
</html>
