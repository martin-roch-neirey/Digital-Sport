<?php

echo "<br/>Internal Server Error ";

if (get_config('debug') === true && isset($error_message)) {
	echo "<br/><br/>" . $error_message;
}