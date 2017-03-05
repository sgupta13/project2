<?php
// Class autoloader
function autoloader($class)
{
	$class = 'classes/' . str_replace('\\', DIRECTORY_SEPARATOR, $class) . '.class.php';
	if(is_readable($class))
	{
		require_once($class);
	}
}
spl_autoload_register('autoloader');