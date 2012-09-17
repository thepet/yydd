<?php
	require_once('classes/Text.php');

	$text_tmpl = array();

	//Enters the arena message. Args: attacker (string)
	$text_tmpl['enters_arena'][] = '%1$s Entered the Arena!';
	$text_tmpl['enters_arena'][] = '%1$s strolls in to the arena...';
	$text_tmpl['enters_arena'][] = '%1$s runs in pumping his fist.';
	$text_tmpl['enters_arena'][] = '%1$s leaps in to the arena!';
	$text_tmpl['enters_arena'][] = '%1$s wanders in.';
	$text_tmpl['enters_arena'][] = '%1$s sneaks in like batman';

	//Attack, miss. Args: attacker (string), defneder (string)
	$text_tmpl['miss'][] = '%1$s misses %2$s.';

	//Attack, critical miss. Args: attacker (string), defender (string), damage (int)
	$text_tmpl['miss_crit'][] = '%1$s tries to hit someone, not sure who. Because he whiffs so bad he trips... for %3$d damage.';

	//Attack with dagger. Args: attacker (string), defender (string), damage (int)
	$text_tmpl['stab_hit'][] = '%1$s stabs %2$s for %3$d damage.';

	//Attack with dagger, crit. Args: attacker (string), defender (string), damage (int)
	$text_tmpl['stab_crit'][] = '%1$s SUPER MEGA STABS %2$s for %3$d damage.';

	//Death. Args: player (string)
	$text_tmpl['died'][] = '%1$s died.';

	Text::init($text_tmpl);

	unset($text_tmpl);
?>
