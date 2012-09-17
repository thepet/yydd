<?php
	class Battle
	{
		var $name = '';
		var $contestantList = array();
		var $contestants = array();

		public function __construct($contestants)
		{
			$this->contestantList = $contestants;
			$this->setContestants();
		}

		public function getContestantList()
		{
			return $this->contestantList;
		}

		private function setContestants()
		{
			$this->contestants = array();

			foreach($this->getContestantList() as $contestant)
			{
				$player = new $contestant;
				$this->contestants[] = $player;

				Text::display('enters_arena', $player->getName());
			}
			echo "\n";
		}

		public function start()
		{
			while(count($this->contestants) > 1)
			{
				echo count($this->contestants) . " contestants remaining.\n";

				//New Round Start
				//Set Initiative
				foreach($this->contestants as $contestant)
				{
					$contestant->setInitiative();
				}
				usort($this->contestants, 'sortContestants');
				reset($this->contestants);

				$numContestants = count($this->contestants);

				//Execute Each Turn
				for($x=0; $x < $numContestants; $x++)
				{
					if (isset($this->contestants[$x]))
						$this->contestants[$x]->ai($this);
				}

				//Output End of Round Data
				echo "Round over!\n\n";
				for($x=0; $x < $numContestants; $x++)
				{
					if (!$this->contestants[$x]->isAlive())
						unset($this->contestants[$x]);
				}
			}
			$winner = current($this->contestants);
			echo $winner->getName() . " wins!\n";
		}
	}

	function sortContestants($a, $b)
	{
		if ($a->getInitiative() == $b->getInitiative()) {
			return 0;
		}
		return ($a->getInitiative() < $b->getInitiative()) ? -1 : 1;
	}
?>
