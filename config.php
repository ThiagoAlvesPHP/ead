<?php
$config = array();

$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$conexao = 'localhost';
preg_match( "/{$conexao}/i", $url, $match);

//defininco se esta em desenvolvimento ou produção
if (!empty($match)) {
	define("ENVIRONMENT", "development");
} else {
	define("ENVIRONMENT", "production");
}

if (ENVIRONMENT == 'development') {
	define("BASE", "http://localhost/PROJETOS_ANDAMENTO/cursos/");
	$config['dbname'] = 'cursos';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
} else {
	define("BASE", "https://www.albicod.com/rifas/");
	$config['dbname'] = 'albicodc_rifas';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'albicodc_admin';
	$config['dbpass'] = '211085100705';
}

global $db;
try {
	$options = [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES UTF8"];
	$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'], $config['dbuser'], $config['dbpass'], $options);
	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDOException $e){
	echo "Falhou ".$e->getMessage();
	exit;
}

//paypal
$config['paypal_clientid'] = 'Ae3ZW8JUbjSNbDrVCjsGAD-YyAAz9pK49xvOJRPIl9aEDaAKR0WMSMGBcMavOqeL9MPREgT_jhqYEKu1';
$config['paypal_secret'] = 'EMKsE7qobIPpEktSr4KEoaihk8OGoAM-Poo0aaXbwsHmyX400iL3VlkIJQiPyQEVHwKvX-0MloQMNJoA';

//mercado pago
$config['mp_appid'] = "986075253795869";
$config['mp_key'] = "IBBpjSlsuRKbLSqRywCEZ4YqSo2Rqsv2";

//configuraçoes do pagseguro
$config['cep_origin'] = '45450000';
$config['pagseguro_seller'] = 'thicoalves@hotmail.com';
//Sandbox
define("EMAIL_PAGSEGURO", "thicoalves@hotmail.com");
//token sandbox
define("TOKEN_PAGSEGURO_SANDBOX", "9E5A8A507EBA4B789E0BB48240961DA2");
//token production
define("TOKEN_PAGSEGURO_PRODUCTION", "4ccba40a-951d-4061-a4f1-a47415e0963a042cbff743cb84466ddfbbb2ca8b4d58c985-feae-4cb7-b915-5bf2137228b7");

\PagSeguro\Library::initialize();
\PagSeguro\Library::cmsVersion()->setName("NovaLova")->setRelease("1.0.0");
\PagSeguro\Library::moduleVersion()->setName("NovaLova")->setRelease("1.0.0");

//production OR sandbox
\PagSeguro\Configuration\Configure::setEnvironment('sandbox');
\PagSeguro\Configuration\Configure::setAccountCredentials(EMAIL_PAGSEGURO, TOKEN_PAGSEGURO_SANDBOX);
\PagSeguro\Configuration\Configure::setCharset('UTF-8');
\PagSeguro\Configuration\Configure::setLog(true, 'pagseguro.log');

?>