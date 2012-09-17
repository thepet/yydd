<?php
	class Text
	{
		static private $texts = array();

		static function init($templates)
		{
			self::$texts = $templates;
		}

		static function get($text)
		{
			$func_args = func_get_args();
			array_shift($func_args);
			$eval = '$return = sprintf(self::$texts["' . $text . '"][Random::getNextInt(0, count(self::$texts["' . $text. '"]) - 1)],"' . implode('","', $func_args) . '");';
			eval($eval);
			return $return;
		}

		static function display($text)
		{
			$func_args = func_get_args();
			array_shift($func_args);
			$eval = '$display = sprintf(self::$texts["' . $text . '"][Random::getNextInt(0, count(self::$texts["' . $text. '"]) - 1)],"' . implode('","', $func_args) . '");';
			eval($eval);
			echo $display . "\n";
		}
	}
?>
