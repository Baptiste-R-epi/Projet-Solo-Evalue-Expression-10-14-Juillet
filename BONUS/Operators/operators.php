<?php
require "operator.class.php";

$operators = [
	new operator("-", "n#n", "left", 0, function ($n1, $n2) {
		return $n1 - $n2;
	}),

	new operator("+", "n#n", "left", 0, function ($n1, $n2) {
		return $n1 + $n2;
	}),

	new operator("*", "n#n", "left", 1, function ($n1, $n2) {
		return $n1 * $n2;
	}),

	new operator("/", "n#n", "left", 1, function ($n1, $n2) {
		return $n1 / $n2;
	}),

	new operator("%", "n#n", "left", 1, function ($n1, $n2) {
		return $n1 % $n2;
	}),

	new operator("^", "n#n", "right", 2, function ($n1, $n2) {
		return pow($n1, $n2);
	}),

	new operator("sin", "#n", "left", 4, function ($n1) {
		return sin($n1);
	}),

	new operator("cos", "#n", "left", 4, function ($n1) {
		return cos($n1);
	}),

	new operator("tan", "#n", "left", 4, function ($n1) {
		return tan($n1);
	}),

	new operator("asin", "#n", "left", 4, function ($n1) {
		return asin($n1);
	}),

	new operator("acos", "#n", "left", 4, function ($n1) {
		return acos($n1);
	}),

	new operator("atan", "#n", "left", 4, function ($n1) {
		return atan($n1);
	}),

	new operator("min", "#n,n", "left", 3, function ($n1, $n2) {
		return min($n1, $n2);
	}),

	new operator("max", "#n,n", "left", 3, function ($n1, $n2) {
		return max($n1, $n2);
	}),

	new operator("!", "n#", "left", 3, function ($n1) {
		if ($n1 <= 1)
			return 1;
		$result = 1;
		for ($i = 1; $i <= $n1; $i++) {
			$result *= $i;
		}
		return $result;
	}),

	new operator("e", "#n", "left", 4, function ($n1) {
		return exp($n1);
	}),

	new operator("exemple", "n,n#n,n", "left", 3, function ($n1,$n2,$n3,$n4) {
		return ($n1 + $n2) * ($n3 + $n4);
	}),
];