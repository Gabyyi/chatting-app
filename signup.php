<?php
$databasename="accounts";
$database_connection=mysqli_connect("localhost" , "root" , "" , "accounts");

if (!$database_connection) {
	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
}
echo "Successfully connected to database: $databasename";

$database_query="INSERT INTO accounts.users (id,username,password,faculty,year) VALUES ( NULL , '$_POST[username]' , '$_POST[password]' , '$_POST[faculty]' , '$_POST[year]' )";
mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

$database_query="SELECT * FROM accounts.users";
mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

$query_result=mysqli_query($database_connection, $database_query);
while ($line=mysqli_fetch_assoc($query_result)) {
    echo $line['id'] . ' ' . $line['username'] . ' ' . $line['password'] . ' ' . $line['faculty'] . ' '  . $line['year'] . '<br>';
}
header("Location: signin.html");
mysqli_close($database_connection);
?>
	