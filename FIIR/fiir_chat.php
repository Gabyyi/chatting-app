<!DOCTYPE html>
<?php
    session_start();
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
    <link rel="stylesheet" href="../css/stylesheet.css">
    <script src="fiir_messages.js" defer></script>
</head>
<body>
    
    <?php
        $username=$_SESSION['username'];
        $faculty=$_SESSION['faculty'];
        $year=$_SESSION['year'];
        $myDate=date("d-m-y h:i:s");
	
        mysqli_close($database_connection);
    ?>


    <header>
        <div class="logo">
            <a href="https://upb.ro/"><img src="../images/upb_logo.png" alt=""></a>
        </div>
        <div class="profile" id="profile">
            <!-- <a href="../signin.html"><img src="../images/profile_logo.png" alt=""></a> -->
            <img src="../images/profile_logo.png" alt="" onclick="openPopup()">
            <table border="1">
                <tr>
                    <?php
                        echo '<th>' . $username . '</th><th>' . $faculty . '</th><th>' . $year . '</th>';
                    ?>
                </tr>
            </table>
        </div>
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
                <button onclick="window.location.href='../signin.html'">Sign In</button>
                <button onclick="window.location.href='../signup.html'">Sign Up</button>
                <button onclick="window.location.href='../logout.php'">Logout</button>
            </div>
        </div>
        <div class="clear"></div>
    </header>
    <div class="content">
        <div class="chats">
            <ul>
                <div class="main-menu">
                    <li><a href="../index.php">Main Menu</a></li>
                </div>
                <li><a href="../IE/ie_chat.php">IE</a></li>
                <li><a href="fiir_chat.php">FIIR</a></li>
                <li><a href="../ICB/icb_chat.php">ICB</a></li>
                <li><a href="../EN/en_chat.php">EN</a></li>
                <li><a href="../ISB/isb_chat.php">ISB</a></li>
                <li><a href="../FILS/fils_chat.php">FILS</a></li>
                <li><a href="../ACS/acs_chat.php">ACS</a></li>
                <li><a href="../TR/tr_chat.php">TR</a></li>
                <li><a href="../FSA/fsa_chat.php">FSA</a></li>
                <li><a href="../ETTI/etti_chat.php">ETTI</a></li>
                <li><a href="../IA/ia_chat.php">IA</a></li>
                <li><a href="../IM/im_chat.php">IM</a></li>
                <li><a href="../IMM/imm_chat.php">IMM</a></li>
                <li><a href="../SIM/sim_chat.php">SIM</a></li>
                <li><a href="../FAIMA/faima_chat.php">FAIMA</a></li>
            </ul>
        </div>
        <div id="chat-container" class="chat-container">
            <div id="messages" class="chat-messages">
                
            </div>
            <div class="chat-input">
                <form action="fiir_chat_input.php" method="post" id="messageForm">
                    <input type="text" id="message" placeholder="Type your message...">
                    <button type="submit" id="submit">Send</button>
                </form>
            </div>
        </div>
    </div>
    <script>

        function scrollToBottom(){
            var div=document.getElementById('messages');
            div.scrollTop=div.scrollHeight;
        }

        window.onload=function(){
            setTimeout(scrollToBottom,100);
        };
        
        document.getElementById('messageForm').addEventListener('submit',function(event){
            event.preventDefault();
    
            setTimeout(scrollToBottom,100);
        });

        document.addEventListener("DOMContentLoaded",function(){
            setInterval(fetchMessages,100);

            function fetchMessages(){
                fetch("fiir_chat_output.php")
                .then(response=>response.text())
                .then(data=>{
                document.getElementById("messages").innerHTML=data;
                });
            }
        });  
        
    </script>
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