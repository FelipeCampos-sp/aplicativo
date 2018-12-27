<?php
	
	require 'libs/PHPMailer/Exception.php';
	require 'libs/PHPMailer/PHPMailer.php';
	require 'libs/PHPMailer/SMTP.php';

	// define("HOME", "http://localhost/felipeferreiracampos.com.br");
	define("HOME", "https://www.felipeferreiracampos.com.br");
	date_default_timezone_set("America/Sao_Paulo");
	
	// CONSTANTES DB ACCESS
	define('DBNAME', 'felipefe_recicle');
    define('HOST', 'localhost');
	define('USER', 'felipefe_felipe');
	define('PASS', 'uv3gH-8Eevof');

	// CONSTANTES EMAIL SERVER
	define('MAILERUSER', "felipe.ferreira.camposs@gmail.com");
	define('MAILERPASS', "mercenario82");
	define('MAILERHOST', "smtp.gmail.com");
	define('MAILERPORT', 587);
	define('MAILERSENDER', 'App Felipe'); 

	function autoload($class) {
		$DIR = 	 ['controller','core','model', 'helper'];
	
		$INCLUDE_DIR = null;
		foreach ($DIR as $DIRECTORY_NAME) :
			if(!$INCLUDE_DIR && file_exists(__DIR__ . DIRECTORY_SEPARATOR . $DIRECTORY_NAME . DIRECTORY_SEPARATOR . $class . '.php')
				&& !is_dir(__DIR__ . DIRECTORY_SEPARATOR . $DIRECTORY_NAME . DIRECTORY_SEPARATOR . $class. '.php')):
				require_once (__DIR__ . DIRECTORY_SEPARATOR . $DIRECTORY_NAME . DIRECTORY_SEPARATOR . $class . '.php');
				$INCLUDE_DIR =    true;
			endif;
		endforeach;
	
	}
	spl_autoload_register("autoload");
