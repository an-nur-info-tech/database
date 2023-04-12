<?php

require_once "Database.php";

$db = new Database();
echo $db->isConnected() ? "DB Connected" . PHP_EOL : "DB Not Connected" . PHP_EOL;

if( !$db->isConnected() ){
	echo $db->getDBError();
	die("Unable to connect to DB");
}

$db->query("SELECT * FROM tbl_test");
var_dump( $db->getRecords() );
echo "Rows: " . $db->rowCount();
var_dump( $db->getRecord() );

$db->query("SELECT * FROM tbl_test where id = :id");
$db->bind(':id', 2);
var_dump( $db->getRecord() );
