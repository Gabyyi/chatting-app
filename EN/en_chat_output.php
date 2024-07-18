<?php
session_start();
$databasename="accounts";
$database_connection=mysqli_connect("localhost" , "root" , "" , "accounts");

if (!$database_connection) {
	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
}
// echo "Successfully connected to database: $databasename";
?>

<html>
	<body>
	<h2>This is the begining of the channel #EN</h2>
    <?php
        $database_query="SELECT * FROM accounts.en_chat";
    	mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

        echo '<br>';
	    $query_result=mysqli_query($database_connection, $database_query);
	    while ($line=mysqli_fetch_assoc($query_result)) {
            echo '<strong>' . $line['username'] . '</strong>' . ' ' . $line['faculty'] . ' '  . $line['year'] . ' ' . $line['date'] . '<br>';
            echo $line['message'] . '<br><br>';
        }
	    mysqli_close($database_connection);
    ?>
    </body>
</html>