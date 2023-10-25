<?php
function str_replace_last($pattern, $replacement, $subject) {
	$pos = strrpos($subject, $pattern);
	return $pos !== false ? substr_replace($subject, $replacement, $pos, strlen($pattern)) : false;
}