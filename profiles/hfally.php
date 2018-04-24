<?php
try {
    $query = $conn->prepare("SELECT * FROM `secret_word` LIMIT 1");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_ASSOC);
    $data = $query->fetch();
    $secret_word = $data['secret_word'];
} catch (PDOException $e) {
    throw $e;
}

try {
    $query = $conn->prepare("SELECT * FROM `interns_data` WHERE `username`='hfally' LIMIT 1");
    $query->execute();
    $query->setFetchMode(PDO::FETCH_OBJ);
    $user = $query->fetch();

} catch (PDOException $e) {
    throw $e;
}

?>

<style>
    @import "https://cdn.rawgit.com/konpa/devicon/df6431e323547add1b4cf45992913f15286456d3/devicon.min.css";

    .hfally-container {
        margin-bottom: 100px;
        margin-top: 200px;
        position: relative;
    }

    div.hfally-profile {
        width: 100%;
        max-width: 500px;
        background: #fff;
        margin: auto;
        padding-top: 100px;
    }

    div.hfally-avatar {
        background: url(<?php echo $user->image_filename; ?>) center no-repeat;
        background-size: 100% 100%;
        border-radius: 100%;
        width: 200px;
        height: 200px;
        box-shadow: 0 0 10px inset rgba(1,1,1,0.8);
        margin-left: auto;
        margin-right: auto;
        margin-top: -200px;
        right: 0;
        left: 0;
        position: absolute;
    }

    .hfally-skills i {
        font-size: 25pt;
        cursor: pointer;
    }

    .hfally-skills i:hover {
        filter: brightness(150%);
    }
</style>

<main class="hfally-container">
    <div class="hfally-profile">
        <div class="hfally-avatar"></div>
        <br/>
        <ul class="list-group">
            <li class="list-group-item text-center hfally-skills">
                <i class="devicon-php-plain"></i> &nbsp;
                <i class="devicon-laravel-plain-wordmark colored"></i> &nbsp;
                <i class="devicon-javascript-plain"></i> &nbsp;
                <i class="devicon-angularjs-plain colored"></i> &nbsp;
                <i class="devicon-typescript-plain"></i> &nbsp;
                <i class="devicon-html5-plain-wordmark colored"></i> &nbsp;
                <i class="devicon-css3-plain"></i>
            </li>
            <li class="list-group-item">
                <i class="fa fa-user"></i>
                &emsp;
                <strong>
                    <?php echo $user->name; ?>
                </strong>
            </li>
            <li class="list-group-item">
                <i class="fa fa-envelope"></i>
                &emsp;
                <strong>
                    <a href="mailto:tofex4eva@yahoo.com">tofex4eva@yahoo.com</a>
                </strong>
            </li>
            <li class="list-group-item">
                <i class="fa fa-phone-square"></i>
                &emsp;
                <strong>
                    <a href="tel:+2348102610381">(+234) 0810 261 0381
                </strong>
            </li>

            <li class="list-group-item text-center">
                <a target="_blank" href="https://github.com/hfally/"><i class="fa fa-github"></i></a> &emsp;
                <a target="_blank" href="https://gitlab.com/hfally/"><i class="fa fa-gitlab"></i></a> &emsp;
                <a target="_blank" href="https://medium.com/@hfally"><i class="fa fa-medium"></i></a> &emsp;
                <a target="_blank" href="https://ng.linkedin.com/in/jesutofunmi-falade-78a255b">
                    <i class="fa fa-linkedin"></i>
                </a>
            </li>
        </ul>

    </div>
</main>

