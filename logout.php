<?php
    session_start();
    session_unset();
    session_destroy();
    // $_SESSION['id']=$line['id'];
    // $_SESSION['username']=$line['username'];
    // $_SESSION['faculty']=$line['faculty'];
    // $_SESSION['year']=
    header("Location: index.php");
    exit;
?>