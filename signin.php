<?php
session_start();
$databasename="accounts";
$database_connection=mysqli_connect("localhost" , "root" , "" , "accounts");

if (!$database_connection) {
	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
}
echo "Successfully connected to database: $databasename";
session_regenerate_id(true);

$database_query="SELECT * FROM accounts.users WHERE username='$_POST[username]' AND password='$_POST[password]'";
mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

$query_result=mysqli_query($database_connection, $database_query);
while ($line=mysqli_fetch_assoc($query_result)) {

    echo '<th>' . $line['id'] . '</th><th>' . $line['username'] . '</th><th>' . $line['password'] . '</th><th>' . $line['faculty'] . '</th><th>'  . $line['year'] . '</th>';
    $_SESSION['id']=$line['id'];
    $_SESSION['username']=$line['username'];
    $_SESSION['faculty']=$line['faculty'];
    $_SESSION['year']=$line['year'];
    
}
$myDate=date("d-m-y h:i:s");
        
header("Location: index.php");
exit();
mysqli_close($database_connection);
?>   