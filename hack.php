<?php
$s = "localhost";
$u = "root";
$p = "niggerwut";

$conn = mysql_connect($s, $u, $p);

if (!$conn) {
die('fuck!' . mysql_error());
}
$string = file_get_contents('./disablecommentsdefaultvalue.txt');
mysql_db_query( 'blackhatcomputerscomwordpress' , "update wp_options set option_value=" . $string . "where option_name=disable_comments_options");
echo "done";
?>
