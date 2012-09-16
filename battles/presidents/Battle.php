<?php
	require_once('Contestants.php');

	class PresidentBattle extends Battle
	{
		var $name = 'Yankee Doodle Deathday Classic';
	}

	$battle = new PresidentBattle($contestants);
?>
