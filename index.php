<?php

$numreg = "((?<!\d)-)?[\d.]+";
function str_replace_once($pattern, $replacement, $subject) {
	$pos = strpos($subject, $pattern);
	return $pos !== false ? substr_replace($subject, $replacement, $pos, strlen($pattern)) : false;
}

function solve($expr) {
	global $test;
	global $numreg;
	preg_match_all("#" . $numreg . "#", $expr, $numbers);
	preg_match("#[(+/*%]|(?!^)-#", $expr, $operation);
	$num[0] = $numbers[0][0];
	$num[1] = $numbers[0][1] ?? 0;

	switch ($operation[0]) {
		case "(":
			return eval_expr(substr($expr, 1, -1));
		case "+":
			return $num[0] + $num[1];
		case "-":
			return $num[0] - $num[1];
		case "/":
			return $num[0] / $num[1];
		case "*":
			return $num[0] * $num[1];
		case "%":
			return $num[0] % $num[1];
	}
}
function eval_expr($expr) {
	global $numreg;
	global $test;
	$match = [];

	while (!is_numeric($expr)) {
		while (preg_match("#\([^()]+\)#", $expr, $match)) {
			$expr = str_replace_once($match[0], solve($match[0]), $expr);
		}
		if (preg_match("#" . $numreg . "[*/%]" . $numreg . "#", $expr, $match)) {
			$expr = str_replace_once($match[0], solve($match[0]), $expr);
			continue;
		}
		if (preg_match("#" . $numreg . "[+-]" . $numreg . "#", $expr, $match)) {
			$expr = str_replace_once($match[0], solve($match[0]), $expr);
			continue;
		}
	}

	return $expr;
}