<?php

require "./Operators/operators ordering.php";
require "./Functions/str_replace_first.php";
require "./Functions/str_replace_last.php";

function eval_expr($expr) {
	$expr = str_replace(" ", "", $expr);
	global $operators, $operators_left, $operators_right, $ope_prio_max;
	$match = [];

	while (preg_match("#\([^()]+\)#", $expr, $match)) {
		$find = $match[0];
		$ans = eval_expr(trim($match[0], "()"));
		$expr = str_replace_first($find, $ans, $expr);
	}

	while (!is_numeric($expr)) {
		for ($i = $ope_prio_max; $i >= 0; $i--) {
			if (isset($operators_left[$i])) {
				preg_match($operators_left[$i], $expr, $match);
				if ($match) {
					for ($i = count($operators) - 1; $i >= 0; $i--) {
						if ($ans = $operators[$i]->solve($match[0])) {
							$expr = str_replace_first($match[0], $ans, $expr);
							continue 3;
						}
					}
				}
			}
			if (isset($operators_right[$i])) {
				preg_match_all($operators_right[$i], $expr, $match);
				if ($match[0]) {
					for ($i = count($operators) - 1; $i >= 0; $i--) {
						if ($ans = $operators[$i]->solve(end($match[0]))) {
							$expr = str_replace_last(end($match[0]), $ans, $expr);
							continue 3;
						}
					}
				}
			}
		}
		break;
	}
	return $expr;
}