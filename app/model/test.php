<?php
namespace app\model;

final class test extends \sys\super\model
{
	/*
	 * 
	 * @cache no-cache
	 * @expire 20000
	 */
	protected function run()
	{var_dump($db);
		$db = \sys\database::getInstance();
		$sql = "create table 'hello'";
		$db->query($sql);
	}
	
	
}