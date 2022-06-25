<?php

Route::group([
	'namespace' => 'Nue\PHPInfo\Http\Controllers', 
	'prefix' => 'nue'
], function() {

	Route::get('phpinfo', 'PHPInfoController@index');

});