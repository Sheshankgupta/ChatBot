<?php
    $conn=mysqli_connect('localhost','root','','chatbot');
?>

<html>
    <head>
        <title>ChatBot</title>
        <link rel="icon" href="images/logo1.gif" type="image/icon type">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <style>
            img{
                vertical-align: 0px;
            }
            *{
                margin: 0;
                padding: 0;
            }
            body{
                background-color: rgb(180, 180, 180);
                max-height: 100%;
                max-width: 100%;
                display: flex;
                align-items: center;
            }
            #box{
                background-image: linear-gradient(135deg,  rgb(205, 244, 231),  white 90% 60%,rgb(205, 244, 231));
                height: 600px;
                width: 600px;
                margin: auto;
                align-content: center;
                border: 1px solid grey;
                border-radius: 5px;
            }
            div#header{
                padding: 5px;
                padding-left: 20px;
                height: 70px;
                border-bottom: 1px solid black;
                
            }
            span#head{
                vertical-align: 25px;
                font-size: 22px;
                font-family: Georgia, 'Times New Roman', Times, serif;
                text-align: right;
            }
            button#button{
                margin-left: 100px;
                vertical-align: 30px;
                border-radius: 5px;
                padding: 5px;
                font-size: 15px;
                background-color: transparent;
                font-family: 'Times New Roman', Times, serif;
                transition: all 0.5s ease-in-out;
                width: 150px;
            }
            button#button:hover{
                background-color: black;
                color:white;
                border: 1px solid white;

            }
            button#btn{
                margin-left: 10px;
                vertical-align: 27px;
                border: none;
            }
            span#tagline {
                text-shadow: 1px 1px 1px black;
                font-size: 22px;
                font-family: 'Times New Roman', Times, serif;
                position: relative;
                top: 40%;
                left: 28%;
                transition:visibility 0.3s linear,opacity 0.3s linear;
            }
            div#chat{
                opacity: 0;
                height: 500px;
                width: 97%;
                margin-inline: auto;
                margin-top: -12px;
                background-color: rgb(242, 242, 242);
                transition:visibility 0.3s linear,opacity 0.3s linear;
                border: 1px solid black;
                border-radius: 5px;
            }
            input[type="submit"]{
                margin:5px;
            }
        </style>
        <script>
            if(window.location.href=="http://localhost/chatbot/index.php"){
                window.onload = function(){
                    setTimeout(function(){
                        document.getElementById("button").click();
                    },500);
                };
                console.log('if');
            } else{
                console.log('else');
                window.onload = function(){
                        document.getElementById("button").click();
                };
            }
            function showChat(e){
                // document.getElementById("chat").style.transition="all 1s ease-in-out";
                if(e.innerText=="Start Chatting"){
                    e.innerText="End Chatting";
                    document.getElementById("chat").style.opacity="1";
                    document.getElementById("tagline").style.visibility="hidden";
                    
                } else if(e.innerText="End Chatting"){
                    e.innerText="Start Chatting";
                    document.getElementById("chat").style.opacity="0";
                    document.getElementById("tagline").style.visibility="visible";
                }
            }
            function addquestion(){
                $url=document.getElementById('getquestion').action;
                $url += "?quest="+(document.getElementById("q1").id);
                console.log( $url );
                document.getElementById('getquestion').action=$url;
            }
        </script>
    </head>
    <body>
        <div id="box">
            <div id="header">
                <img src="images/sticker.gif" height="70" alt="" srcset="">
                <span id="head">I'm a Bruno ChatBot</span>
                <button id="button" onclick="showChat(this)">Start Chatting</button>
                <button type="button" id="btn" data-bs-container="body" data-bs-toggle="popover" data-bs-placement="bottom" data-bs-content="Click Start Chatting to Start and End chatting to end it!" data-bs-trigger="hover focus">
                    <i class="bi bi-info-circle"></i>
                </button>
            </div>
            <span id="tagline">Thankyou! For Choosing Us</span>
            <div id="chat">
                    <div id="liveChat">
                        <div style="min-height:300px;border-bottom:1px dashed black; margin-bottom:10px; padding:10px;">
                        <span class="ans">
                            <?php
                                if(isset($_POST['question'])){
                                    $val=$_GET['quest'];
                                    $sql="SELECT answers FROM chat where sno = '$val'";
                                    $query=mysqli_query($conn,$sql);
                                    $result= (mysqli_fetch_array($query));
                                    echo $result[0];
                                  }
                            ?>
                        </span>
                        </div>
                        <div id="quests" style="overflow-y:scroll; height:180px">
                        <span>
                            <form id="getquestion" method="post" action="index.php">
                                <input type="submit" value="Hello" name="question" id="q9" onclick="addquestion(this)">
                                <input type="submit" value="Who are you?" name="question" id="q1" onclick="addquestion(this)">
                                <input type="submit" value="Where is this?" name="question" id="q2" onclick="addquestion(this)">
                                <input type="submit" value="How are you?" name="question" id="q3" onclick="addquestion(this)">
                                <input type="submit" value="What are you doing?" name="question" id="q4" onclick="addquestion(this)">
                                <input type="submit" value="Are you a robot?" name="question" id="q5" onclick="addquestion(this)">
                                <input type="submit" value="Are you real?" name="question" id="q6" onclick="addquestion(this)">
                                <input type="submit" value="Tell me something" name="question" id="q8" onclick="addquestion(this)">
                                <input type="submit" value="Happy birthday!" name="question" id="q10" onclick="addquestion(this)">
                                <input type="submit" value="Do you know a joke?" name="question" id="q11" onclick="addquestion(this)">
                                <input type="submit" value="Tell me a joke" name="question" id="q12" onclick="addquestion(this)">
                                <input type="submit" value="Tell me a more joke" name="question" id="q13" onclick="addquestion(this)">
                                <input type="submit" value="Do you love me?" name="question" id="q14" onclick="addquestion(this)">
                                <input type="submit" value="Do you like people?" name="question" id="q15" onclick="addquestion(this)">
                                <input type="submit" value="You’re cute" name="question" id="q16" onclick="addquestion(this)">
                                <input type="submit" value="You’re smart" name="question" id="q17" onclick="addquestion(this)">
                                <input type="submit" value="!#$#%" name="question" id="q18" onclick="addquestion(this)">
                                <input type="submit" value="In what programming language you are made?" name="question" id="q19" onclick="addquestion(this)">
                                <input type="submit" value="What is Your Favourite Color?" name="question" id="q21" onclick="addquestion(this)">
                                <input type="submit" value="Who created you?" name="question" id="q22" onclick="addquestion(this)">
                                <input type="submit" value="Who is more good me or you?" name="question" id="q23" onclick="addquestion(this)">
                                <input type="submit" value="Bye" name="question" id="q20" onclick="addquestion(this)">
                            </form>
                        </span>
                        </div>
                    </div>
            </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
        <script>
            var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
            var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
                return new bootstrap.Popover(popoverTriggerEl)
            })
            function addquestion(e){
                console.log("hello");
                $url=document.getElementById('getquestion').action;
                console.log( $url );
                $url += "?quest=" +e.id;
                console.log( $url );
                document.getElementById('getquestion').action=$url;
            }
        </script>
    </body>
</html>