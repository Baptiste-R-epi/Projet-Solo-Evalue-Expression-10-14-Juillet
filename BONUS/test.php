<?php
require("./index.php");
$expr = $argv[1];
// $total = 0;
// $min = INF;
// $max = 0;
// for ($i = 0; $i < 1000; $i++) {
	// $start = hrtime(true);
	echo eval_expr($expr);
// 	$end = hrtime(true);
// 	$time = $end - $start;
// 	$total += $time;
// 	$min = min([$min, $time]);
// 	$max = max([$max, $time]);
// }
// $moyen = floor($total / 1000);
// echo "Temps mini  : ", $min, "\n";
// echo "Temps maxi  : ", $max, "\n";
// echo "Temps moyen : ", $moyen, "\n";