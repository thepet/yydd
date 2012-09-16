<?php
	class Random
	{
		static private $seed = NULL;

		static function init($seed = NULL)
		{
			self::$seed = $seed;
			mt_srand($seed);
		}

		static function getSeed()
		{
			return self::$seed;
		}

		static function setSeed($seed)
		{
			self::init($seed);
		}

		static function getNextInt($min, $max)
		{
			return mt_rand($min, $max);
		}
	}
?>
