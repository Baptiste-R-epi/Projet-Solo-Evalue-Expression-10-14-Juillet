<?php
function str_replace_first($pattern, $replacement, $subject) {
	$pos = strpos($subject, $pattern);
	return $pos !== false ? substr_replace($subject, $replacement, $pos, strlen($pattern)) : false;
}