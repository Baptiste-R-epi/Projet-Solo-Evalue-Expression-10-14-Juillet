<?php
require "operators.php";

$operators_left = [];
$operators_right = [];
$ope_prio_max = 0;
for ($i = 0; $i < count($operators); $i++) {
	$prio = $operators[$i]->getPrio();
	if ($operators[$i]->getOrder() == "left") {
		isset($operators_left[$prio]) ? 0 : $operators_left[$prio] = "";
		$operators_left[$operators[$i]->getPrio()] .= $operators[$i]->getRegex() . "|";
	} else {
		isset($operators_right[$prio]) ? 0 : $operators_right[$prio] = "";
		$operators_right[$operators[$i]->getPrio()] .= $operators[$i]->getRegex() . "|";
	}
	$ope_prio_max = max($ope_prio_max, $operators[$i]->getPrio());
}
for ($i = 0; $i <= $ope_prio_max; $i++) {
	isset($operators_left[$i]) ? $operators_left[$i] = "#" . substr($operators_left[$i], 0, -1) . "#" : 0;
	isset($operators_right[$i]) ? $operators_right[$i] = "#" . substr($operators_right[$i], 0, -1) . "#" : 0;
}