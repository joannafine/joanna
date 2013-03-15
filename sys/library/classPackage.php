<?php
namespace sys\library;

use \sys\event;


final class classPackage implements \sys\super\library
{
	public static function file(&$class)
	{
		return DIR. '/'. str_replace('\\', '/', $class) .'.php';
	}

	public static function load($class)
	{
		if( class_exists($class, false) ){
			return ;
		}
		$file = self::file($class);
		if( ! file_exists($file) ){
			throw new \Exception();
		}
		$file = event::loadClassBefore($file);
    	require $file;
	}

}
