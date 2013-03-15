<?php
namespace sys\super;

use sys\event;

abstract class model
{
	// cache expire time for second
	public static $expiretime = 60;
	// param data: "eventname => param"
	public $value = array();

	
	public function &__call($name, $param)
	{
		if( ! method_exists($this, $name) ){
			throw new CodeException();
		}
		$this->method = $name;

		$ref = new \sys\library\reflection($this, $this->method);
		if( !$ref->object->isProtected() ){
			throw new CodeException();
		}
		
		$this->value[$this->method] = $param;
		event::modelExecBefore($this);
		$this->value[$this->method] = $this->{$this->method}(
					$this->value[$this->method]
			);
		event::modelExecAfter($this);
		return $this->value[$this->method];
	}

	protected function &__skip__(&$value)
	{
		return $value;
	} 

}
