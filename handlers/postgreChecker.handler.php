<?php

require_once UTILS_PATH . '/envSetter.util.php';

$host = "host.docker.internal";
$port = $databases['pgPort'];
$username = $databases['pgUser'];
$password = $databases['pgPassword'];
$dbname = $databases['pgDB'];

$conn_string = "host=$host port=$port dbname=$dbname user=$username password=$password";

$dbconn = pg_connect($conn_string);

if (!$dbconn) {
    error_log("❌ PostgreSQL connection failed: " . pg_last_error());
    exit();
} else {
    error_log("✔️ PostgreSQL connection succeeded.");
    pg_close($dbconn);
}
//PINALITAN MUNA