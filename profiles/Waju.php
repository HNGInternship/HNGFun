<?php 
  try {
    //QUERY for User Profile, using prepared statement for security
    $sql ='Select * from interns_data where username =:user';
    $stmt = $conn->prepare($sql);
    $stmt->execute(array(
        'user'=> $_GET['id'],
    ));
    $stmt->setFetchMode(PDO::FETCH_ASSOC);
    $intern_data = $stmt->fetch();
  

    //query for the secret word; no need for prepared statement since its all internal
    $sql = "SELECT * FROM secret_word";
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $data = $q->fetch();
// Set the secret word
    $secret_word = $data['secret_word'];


} catch (PDOException $e) {

    throw $e;
}
//CHAT BOT STUFF
    

try {
    $sql ='Select * from chatbot';
    $q = $conn->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
    $questions_and_anwers = $q->fetchAll();

} catch(PDOException $e) {
    throw $e;
}

?>

<style>
    .main-wrapper{
        margin-top: 100px;
        /* opacity:0; */
        /* the animation is bad for the bot using pure php */
        /* animation: fadeIn 3s 1s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; */
    }
    .left-pane {
        margin-right: 40px;
        /* margin-bottom: 50px; */
        height:80vh;
    }
    .img-wrap{
    border: 5px solid white;
    border-radius: 50%;
    overflow: hidden;
    height: 350px;
    width: 350px;
    box-shadow: 0px 5px 20px 5px rgba(0,0,0,0.234);
    }
    img{
        width: 100%;
        height: auto;
        object-fit:cover;
    }
    h4.name{
        margin-top: 30px;
        margin-bottom:2px;
        line-height: 1.5;
        /* opacity:0; */
        /* transform: translateY(30px); */
        /* animation: slideInUp 2s 3s cubic-bezier(0.175, 0.885, 0.32, 1.275) forwards; */
    }
    h4.name span{
        font-size: 20px;
    }
    h4.name span.seperator{
        color: rgba(0,0,0,0.678);
        font-size: 24px;
        font-weight: normal;
    }
    hr{
    border-top: 5px solid rgba(0,0,0,.456);
    }
    h2.heading,
    h4.name span{
        color:#007BFF;
    }
    
    /* Tweak the progressbar component */
    .progress{
        margin-top: 15px;
        height: 30px;
    }
    .progress-bar.bg-info{
        background: rgb(103, 174, 188) !important;
    }
    .progress-bar.bg-success{
        background:  rgb(146, 191, 143) !important;
    }
    .progress-bar.bg-danger{
        background:  rgb(206, 121, 124) !important;
    }
   /* And some magic */
   @keyframes slideInUp {
    from{
        opacity: 0;
        transform: translateY(30px);
    }
    to{
        opacity: 1;
        transform: translateY(0);
    }
}
@keyframes fadeIn {
    from{
        opacity: 0;

    }
    to{
        opacity: 1;
    }
}


    /* Going by mobile first, these get applied at larger screen sizes onlys */
@media (min-width:700px){
    .left-pane{
        height:auto;
    }
    h2.heading{
        color:#007BFF;
        text-align:right;
    }
    .my-skillset{
        margin-top: 35px;
    }
    .right-pane{
        position:relative;
    }
    .right-pane:before{
        display:inline-block;
        content:"";
        background:rgba(0,0,0,0.456);
        width:1px;
        height:70%;
        position: absolute;
        left:-15px;
        top: 15%;
    }
}

</style>


    <!-- bootstrap is mobile first so mf-row must come before flex-column -->
    <div class="d-flex flex-md-row flex-column mb-3 main-wrapper">

        <div class="p-2 left-pane align-self-center flex-grow-0 flex-md-grow-5">
            <div class="img-wrap">
                <img src="<?=$intern_data['image_filename']; ?>" alt="waju">
            </div> 
            <h4 class="name text-center"><?=$intern_data['name']; ?><br>
                <span><?="@".$intern_data['username']; ?><span class="seperator"> | </span>Fullstack Developer</span>
            </h4>
            <ul class="list-inline">
            </ul>
        </div>
        <!-- /.left-pane -->
            
            <hr class="hide-lg">


        <div class="d-flex flex-column p-2 right-pane flex-grow-0 flex-md-grow-7">
            <div class="meet-me">
                <h2 class="heading">Meet Me!</h2>
                
                <p>
                    Hi! I am Olanrewaju, a Fullstack Developer and technology enthusiast. I love clean design and I love beautiful expressive code.                     I build Websites with vanilla PHP( using a custom framework), WordPress and good 'ol Javascript.
                </p>
                <p>
                    As a trained Project Manager I particulary enjoy setting up projects - drawing up plans, wireframes, user stories and the works. 
                </p>
            </div>
            <!-- /.meet-me -->

            <hr class="hide-lg">

            <div class="my-skillset">
                <h2 class="heading">My Skillset</h2>
                
                <div class="progress"  >
                   <span class="skill-logo php"></span> <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                    PHP</div>
                </div>
                 <!-- /.php -->
                
                <div class="progress" >
                    <span class="skill-logo js"></span><div class="progress-bar bg-success " role="progressbar" style="width: 70%" aria-valuenow="70" aria-valuemin="0" aria-valuemax="100">
                     Javascript</div>
                </div>
                <!-- /.JS -->
                
                <div class="progress" >
                    <span class="skill-logo css"></span> <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="80" aria-valuemin="0" aria-valuemax="100">CSS3</div>
                </div>
                <!-- /.css -->
                
                <div class="progress" >
                    <span class="skill-logo vue"></span> <div class="progress-bar bg-danger " role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">VueJs</div>
                </div>
                <!-- /vue -->
                
                <div class="progress" >
                    <span class="skill-logo wp"></span> <div class="progress-bar  bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">WordPress Dev.</div>
                </div>
                <!-- /WordPress Dev-->
                
                <div class="progress" >
                    <span class="skill-logo git"></span> <div class="progress-bar bg-success " role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100">Git</div>
                </div>
                <!-- /git -->

                <div class="progress" >
                    <span class="skill-logo devops"></span> <div class="progress-bar bg-danger" role="progressbar" style="width: 30%" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100">DevOps</div>
                </div>
                <!-- /DevOps -->

            </div>
            <!-- ./my-skillset -->

        </div>
            <!-- /.right-pane -->
    </div>
    <!-- /.main-wrapper -->

    <!-- /my chatbot div -->
    <style>
    /* Move these to the top later */
    .chat-area{
        position:fixed;
        bottom: 0%;
        right: 10%;
        background: white;
        font-size: 14px;
        width:300px;
        height: 350px;
        padding:0;
        box-shadow: 3px -1px 10px 1px rgba(0,0,0,0.345);
    }

    }
    .chat-form{
        position:absolute;
        bottom: 0;
        left:0;
        width:100%;
    }
    .input-field{
        width:75%;
        margin:0;
        outline:none;
        text-indent: 10px;
        height:30px;
    }
    .form-group{
        padding:0;
        margin:0;
    }
    .send-button{
        width:20%;
        margin:0;
        background: #92BF8F;
        padding: 2px 5px;
        font-weight: bold;
        color:rgba(255,255,255,0.789);
    }
    .chat-header{
        background: linear-gradient(96deg, #373A98 0, #226AE6 58%);
        height: 40px;
        padding: 10px 10px 0 10px;
        color: white;
        font-weight: bold;
        font-size:16px;
        display: flex;
        justify-content: space-between;
        align-items:baseline;
    }
    span.status{
        display: inline-block;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background: rgb(124, 191, 116);   
    }
    .chat-list-wrapper{
        position: relative;
        width:100%;
        height:80%;
        padding-bottom: 20px;
        overflow-y:scroll;
        overflow-x:hidden;
    }
    .chat-list{
        list-style:none;
        display:flex;
        flex-direction:column;
        padding:0;
    }
    .chat-list__item{
        padding: 5px;
        width: 70%;
        margin: 5px 0; 
        font-style: italic;
        font-weight: bold;
        color: rgba(255, 255, 255,0.89);
    }
    .chat-list__item--user{
        background:green;
        margin-right: auto;
        border-top-right-radius: 5px;
        border-bottom-right-radius: 5px;
        background: #DBE1E1;
        color: rgba(0,0,0,0.789);
    }
    .chat-list__item--bot{
        background:red;
        margin-left:auto;
        border-top-left-radius: 5px;
        border-bottom-left-radius: 5px;
        text-align: right;
        padding-right: 5px;
        background: #007BFF;
    }
    </style>
    <div class="chat-area">
        <div class="chat-header">
        <span class="bot-name">Andy Bot</span> <span class="status"></span>
        </div>
        <div class="chat-list-wrapper">
            <ul class="chat-list">
                <li class="chat-list__item chat-list__item--bot">Hello</li>
                <li class="chat-list__item chat-list__item--user">Hi</li>
                <li class="chat-list__item chat-list__item--bot">How are you</li>
                <li class="chat-list__item chat-list__item--user">I am fine</li>
                <li class="chat-list__item chat-list__item--bot">Hello</li>
                <li class="chat-list__item chat-list__item--user">Hi</li>
                <li class="chat-list__item chat-list__item--bot">How are you</li>
                <li class="chat-list__item chat-list__item--user">I am fine</li>
                <li class="chat-list__item chat-list__item--bot">Hello</li>
                <li class="chat-list__item chat-list__item--user">Hi</li>
                <li class="chat-list__item chat-list__item--bot">How are you</li>
                <li class="chat-list__item chat-list__item--user">I am fine</li>
                <li class="chat-list__item chat-list__item--bot">Hello</li>
                <li class="chat-list__item chat-list__item--user">Hi</li>
                <li class="chat-list__item chat-list__item--bot">How are you</li>
                <li class="chat-list__item chat-list__item--user">I am fine</li>
                <li class="chat-list__item chat-list__item--bot">Hello</li>
                <li class="chat-list__item chat-list__item--user">Hi</li>
                <li class="chat-list__item chat-list__item--bot">How are you</li>
                <li class="chat-list__item chat-list__item--user">I am fine</li>
            </ul>
        </div>
        <form action="<?php echo $_SERVER['SCRIPT_NAME'] . "?id=" . $_GET['id']; ?>" class="chat-form" id="chatForm" method="POST">
            <div class="form-group">
                <input type="text" name="question" id="questionField" class="input-field">
                <input type="submit" value="Send" class="send-button">
            </div>
        </form>
    </div>
