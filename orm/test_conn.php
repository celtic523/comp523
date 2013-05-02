<?php
$mysqli = new mysqli("vm5.cas.unc.edu", "artceltic", "tTr6968@!@", "artceltic");
if(is_null($mysqli)){
	print('fail');
} else{
	print('success');
}
?>
