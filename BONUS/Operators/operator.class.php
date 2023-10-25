<?php

class operator
{
	// 'numreg' est un nombre tel que défini par la regex.
	// Etant donnée que l'algorithme supprimme les parenthèses, il n'y a pas besoin de gérer une ')'.
	private $numreg = "((?<!\d)-)?\d+(\.\d+)?";
	private $regex;
	public string $symbol;
	private string $structure;
	private string $order;
	private int $priority;
	private $callback;


	public function __construct($symbol, $structure, $order, $priority, $callback) {
		if (!preg_match("/^[#n,]+$/", $structure)) {
			echo "\nStructure should be of format similar to : 'n#n' or '#n' or '#n,n'.\n",
				"Where n is a number as argument to callback.\n",
				"Where # is the operator.\n";
		}
		if ($order !== "left" && $order !== "right") {
			echo "\nOrder should be 'left' or 'right'\n";
		}
		$this->symbol = $symbol;
		$this->structure = $structure;
		$this->order = $order;
		$this->priority = $priority;
		$this->callback = $callback;
		$this->makeRegex();
	}
	private function makeRegex() {
		$this->regex = str_replace("n", $this->numreg, $this->structure);
		$this->regex = str_replace("#", preg_quote($this->symbol), $this->regex);
		if ($this->order == "right") {
			$this->regex .= "(?!".preg_quote($this->symbol).")*$";
		}
	}
	public function solve($str) {
		if (!str_contains($str, $this->symbol)) {
			return false;
		}
		preg_match_all("#" . $this->numreg . "#", $str, $result);
		return ($this->callback)(...$result[0]);
	}
	public function getPrio() {
		return $this->priority;
	}
	public function getRegex() {
		return $this->regex;
	}
	public function getOrder() {
		return $this->order;
	}
}