<!DOCTYPE html>
<?php
    session_start();
    // session_regenerate_id(true);
    $databasename="accounts";
    $database_connection=mysqli_connect("localhost" , "root" , "" , "accounts");

    if (!$database_connection) {
	    echo ("Failed connection to database: $databasename  ---  ". mysqli_connect_error() );
    }
    // echo "Successfully connected to database: $databasename";
    error_reporting(0);
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>POLITEHNICA forum</title>
    <link rel="stylesheet" href="css/stylesheet.css">
</head>
<body>

        <?php
            if (!isset($_SESSION['id'])){
                header("Location: signin.html");
                exit();
            }
            $username=$_SESSION['username'];
            $faculty=$_SESSION['faculty'];
            $year=$_SESSION['year'];
            session_start();
	        $database_query="SELECT * FROM accounts.users WHERE username='$_POST[username]' AND password='$_POST[password]'";
        	mysqli_query($database_connection, $database_query) or die("Query error to database: $databasename");

	        $query_result=mysqli_query($database_connection, $database_query);
	        while ($line=mysqli_fetch_assoc($query_result)) {
                ?>
                <table border="1">
                    <tr>
                <?php
                echo '<th>' . $line['id'] . '</th><th>' . $line['username'] . '</th><th>' . $line['password'] . '</th><th>' . $line['faculty'] . '</th><th>'  . $line['year'] . '</th>';
                $_SESSION['id']=$line['id'];
                $_SESSION['username']=$line['username'];
                $_SESSION['faculty']=$line['faculty'];
                $_SESSION['year']=$line['year'];
                ?>
                    </tr>
                </table>
                <?php
            }
	        $myDate=date("d-m-y h:i:s");
        ?>
            
        


    <header>
        <div class="logo">
            <a href="https://upb.ro/"><img src="images/upb_logo.png" alt=""></a>
        </div>
        <div class="profile" id="profile">
            <!-- <a href="signin.html"><img src="images/profile_logo.png" al t=""></a> -->
            <img src="images/profile_logo.png" alt="" onclick="openPopup()">
            <table border="1">
                <tr>
                    <?php
                        echo '<th>' . $username . '</th><th>' . $faculty . '</th><th>' . $year . '</th>';
                    ?>
                </tr>
            </table>
        </div>
        <!-- ////////// -->
        <div id="Popup" class="popup">
            <div class="popup-content">
                <span class="close">&times;</span>
                <table border="1">
                    <tr>
                        <?php
                            echo '<th>' . $username . '</th><th>' . $faculty . '</th><th>' . $year . '</th>';
                        ?>
                    </tr>
                </table>
                <button onclick="window.location.href='signin.html'">Sign In</button>
                <button onclick="window.location.href='signup.html'">Sign Up</button>
                <button onclick="window.location.href='logout.php'">Logout</button>
            </div>
        </div>       
        <!-- /////////// -->
        <div class="clear"></div>
    </header>
    <div class="content">
        <div class="chats">
            <ul>
                <div class="main-menu">
                    <li><a href="index.php">Main Menu</a></li>
                </div>
                <li><a href="IE/ie_chat.php">IE</a></li>
                <li><a href="FIIR/fiir_chat.php">FIIR</a></li>
                <li><a href="ICB/icb_chat.php">ICB</a></li>
                <li><a href="EN/en_chat.php">EN</a></li>
                <li><a href="ISB/isb_chat.php">ISB</a></li>
                <li><a href="FILS/fils_chat.php">FILS</a></li>
                <li><a href="ACS/acs_chat.php">ACS</a></li>
                <li><a href="TR/tr_chat.php">TR</a></li>
                <li><a href="FSA/fsa_chat.php">FSA</a></li>
                <li><a href="ETTI/etti_chat.php">ETTI</a></li>
                <li><a href="IA/ia_chat.php">IA</a></li>
                <li><a href="IM/im_chat.php">IM</a></li>
                <li><a href="IMM/imm_chat.php">IMM</a></li>
                <li><a href="SIM/sim_chat.php">SIM</a></li>
                <li><a href="FAIMA/faima_chat.php">FAIMA</a></li>
            </ul>
        </div>
        <div class="home">
            <img src="images/upb_main.png" alt="">
        </div>
    </div>



    <script>
        var popup=document.getElementById("Popup");
        var span=document.getElementsByClassName("close")[0];
        function openPopup(){
            popup.style.display="block";
        }
        function closePopup(){
            popup.style.display="none";
        }
        span.onclick=closePopup;
        window.addEventListener('click',function(event){
            if(event.target==popup){
                closePopup();
            }
        });
    </script>
    

</body>
</html>