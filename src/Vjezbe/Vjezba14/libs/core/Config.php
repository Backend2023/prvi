<?php
namespace Core;

class Config {

	public static function init() {
	//	date_default_timezone_set('Europe/London');
			date_default_timezone_set('Europe/Zagreb');	
		self::setenv();
		self::db();
	}

	public static function setenv() {
	//	$environment = (getenv('ENVIRONMENT')) ? getenv('ENVIRONMENT') : 'production';
	$environment ="development";
	defined('ENVIRONMENT') or define('ENVIRONMENT', $environment);
	}

	public static $dbconn = '/db/connection';

	public static function db() {
		// CONF = ROOT.'/conf'
		// Route= 'core/ROute'
		// $fileExtention= '.php'
		require CONF.self::$dbconn.Route::$fileExtention;
	}
	
}