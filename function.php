<?php

// for escaping from special html characters
function h($str) {
	return htmlspecialchars($str, ENT_QUOTES, 'UTF-8');
}

// for making RuntimeException
function e($msg, Exception &$previous = null) {
	return new RuntimeException($msg, 0, $previous);
}

// exception to array
function exception_to_array(Exception $e) {
	do {
		$msgs[] = $e->getMessage();
	} while ($e = $e->getPrevious());
	return array_reverse($msgs);
}
