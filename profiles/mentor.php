<?php

    try {
        $sql = 'SELECT * FROM secret_word';
        $q = $conn->query($sql);
        $q->setFetchMode(PDO::FETCH_ASSOC);
        $data = $q->fetch();
    } catch (PDOException $e) {
        throw $e;
    }

    $secret_word = $data['secret_word'];
?>

<h1> Mentors's Testing Autodeploy 1</h1>
