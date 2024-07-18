<?php
    session_start();
    $databasename="accounts";
    $database_connection=mysqli_connect("localhost" , "root" , "" , "accounts");

    if (!$database_connection) {
    	echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
    }
    echo "Successfully connected to database: $databasename";
?>

<html>
	<body>
	<p>This is the PHP script that add data to the database</p>
    <?php
        $myDate=date("d-m-y h:i:s");
        $username=$_SESSION['username'];
        $faculty=$_SESSION['faculty'];
        $year=$_SESSION['year'];
        $message=$_POST['message'];
	
        $database_query="INSERT INTO accounts.fils_chat (username,faculty,year,date,message) VALUES ( '$username' , '$faculty' , '$year' , '$myDate' , '$message')";
        mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

	    mysqli_close($database_connection);
    ?>
    </body>
</html>