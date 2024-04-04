<?php
namespace Core;

use \Core\Route;

class View {
	
	public function __construct() {}

	public function render($layout, $views = null, $vars = null) {

		if (isset($vars)) {
			print_r($vars);    // proba
			extract($vars);
			var_dump(get_defined_vars());
		}
		foreach ( $vars as $key => $value) {
	  echo $value["name"];		# code...
		}

		if (isset($views)) {
 			foreach ($views as $view => $contents) {
			    if (is_array($view) && !empty($view)) {
			        extract($view);
			    }
			    ob_start();
			    include VIEWS.'/'.$contents.Route::$fileExtention;
			    ${$view} = ob_get_clean();
 			}
		}
		
		require VIEWS.'/'.$layout.Route::$fileExtention;
	}

}