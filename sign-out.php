<?php
include_once("header.php");
?>

<style>
    body {
        background: url(./images/bg.jpg) no-repeat right;
        background-size: contain;
    }
    h1 {
        font-size: 3em;
    }
    .msg {
        font-size: 25px;
    }
    .navbar {
        background-color: #E5E5E5;
        text-align: center;
    }

    .login {
        margin-left: 6em;
    }

    .sign-out {
        color: #3D3D3D;
        padding-left: 5em;
    }
    
    .btn-primary {
        background-color: #2196F3;
        border-color: #2196F3;
    }
    
    .btn-primary:hover,
    .btn-primary:active,
    .btn-primary:visited,
    .btn-primary:focus {
        background-color: #0475CE !important;
        border: none;
    }

    footer {
        background: #fafafa;
    }

    /* media queries */
    @media (max-width: 599px) { 
        body {
            background-position: top;
            background-size: cover;
        }
        h1 {
            font-size: 1.2em;
            text-align: center;
        } 
        .msg {
            font-size: 0.8em;
            text-align: center;
        }
        .login {
            margin-left: 0; 
        }
        .sign-out {
            padding-left: 0;
        }
    }
</style>

<div id="signout" class="container">
    <div class="row" style="padding:60px 0">    
        <div class="col-md-8 col-sm-12 col-xs-12 sign-out">
            <h1>YOU ARE NOW SIGNED OUT</h1>
            <p class="msg">We hope to see you real soon!</p>
        </div>
    </div>
    <div class="row"  style="padding: 0 0 1em 0">
        <div class="col-md-3 col-xs-3 col-sm-3">
            <a href="login.php">
                <button class="btn btn-primary w-100 rounded py-2 login">Login</button>
            </a>
        </div>
    </div>
</div>

<?php
include_once("footer.php");
?>
