<?php
	namespace Utils;

	/**
	* Custom autoload
	*/
	class AutoLoader
	{
		
		static function register()
		{
			 spl_autoload_register(array(__CLASS__, 'autoLoad'));
		}


		static function autoLoad($class)
		{
			$class = str_replace('\\', '/', $class);
			$file = $class.'.php';
			require_once($file);
			echo "<br/>";
		}
	}
?>