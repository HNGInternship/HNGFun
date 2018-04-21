<style>
    .title {
        margin-top: 3em;
        margin-bottom: 2em;
        text-decoration: underline;
        color:blue;
    }

    img {
        border-radius: 200px;
    }

    p {
        font-weight: bold;
        font-size:30px;
        border: 1px solid black;
        padding: 10px;
    }

</style>


<div class="profile">
    <?php
    require 'db.php';



    $result = $conn->query("Select * from secret_word LIMIT 1");
    $result = $result->fetch(PDO::FETCH_OBJ);
    $secret_word = $result->secret_word;

    $result2 = $conn->query("Select * from interns_data where username = 'Lorentzo'");
    $user = $result2->fetch(PDO::FETCH_OBJ);

    try {
        $sql = "SELECT secret_word FROM secret_word";
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
        $secret_word = $data['secret_word'];
    } catch (PDOException $e) {
        throw $e;
    }

    ?>

    <h1 class="title"> My Profile Personal Info</h1>

    <div class="picture">
        <img src="<?php  echo $user->image_filename; ?>" alt="lorentzo picture">
    </div>
    <div class="name">
        <p><?php echo $user->name; ?></p>
    </div>
    <div class="username">
        <p> @<?php echo $user->username; ?></p>
    </div>
    <div class="country">
        <p> Cameroon</p>
    </div>
    <div class="work">
        <p>HNG 4.0 Intern</p>
    </div>
    <div class="tel">
        <p> 237693981232</p>
    </div>
</div>