<?php
include_once "Para.php";

$para = new Para();
$para->columns(12);
echo $para->columns();

echo "\n\n********************************************************************\n";
echo "dirname(__FILE__) " . dirname(__FILE__) . "\n";
echo "dirname(dirname(__FILE__)) " . dirname(dirname(__FILE__)) . "\n";
echo "basename(dirname(dirname(__FILE__))) " . basename(dirname(dirname(__FILE__))) . "\n";

?>
