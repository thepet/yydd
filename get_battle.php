#!/usr/bin/php -q
<?php
	$dataCSV = fopen('battles/presidents/data.csv', 'r');
	$headers = fgetcsv($dataCSV);

	foreach($headers as $key => $header)
	{
		$$header = $key;
	}

	$contestants = "<?php\n";
	while($data = fgetcsv($dataCSV))
	{
		$contestants .= "
	\$contestants[] = '$data[$phpClassName]';
	class $data[$phpClassName] extends Fighter
	{
		var \$playerName = '$data[$playerName]';
		var \$party = '$data[$party]';

		var \$level = $data[$level];

		var \$strength = $data[$strength];
		var \$dexterity = $data[$dexterity];
		var \$wisdom = $data[$wisdom];
		var \$charisma = $data[$charisma];
		var \$intelligence = $data[$intelligence];
		var \$constitution = $data[$constitution];

		var \$thac0 = $data[$thac0];
		var \$ac = $data[$ac];
";
		if ($data[$warcries] != '')
		{
			$contestants .= "
		var \$warcries = array($data[$warcries]);
			";
		}
		$contestants .= "
	}
";
	}
	$contestants .= "?>";

	echo $contestants;
?>
