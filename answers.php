<?php

function getUserAvatar($username)
{
    require 'db.php';

    $sqlForUser = "SELECT * FROM interns_data WHERE interns_data.username = '".$username."' LIMIT 1";

    // this is executing our query
    $qForUser = $conn->query($sqlForUser);

    // this is defining the mode in which we receive results, saying the results should return in an array format (associative array to be precise)
    $qForUser->setFetchMode(PDO::FETCH_ASSOC);

    // this is finally sending the query to the database#9b4247
    $userData = $qForUser->fetch();

    if ($userData === false) {
        return 'No user was found with username '.$username;
    }

    return "Here's how ".$username.' looks: <br /> '."<img className='user-avatar' style='width: 150px; height:150px; border-radius: 0px;' src=".$userData['image_filename'].'>';
}

function getNumberOfGithubRepos($username)
{
    // Get cURL resource
    $curl = curl_init();
    // Set some options - we are passing in a useragent too here
    curl_setopt_array($curl, array(
    CURLOPT_RETURNTRANSFER => 1,
    CURLOPT_URL => 'https://api.github.com/users/'.$username,
    CURLOPT_USERAGENT => 'Hng Internship', ));
    // Send the request & save response to $resp
    $resp = json_decode(curl_exec($curl));
    // Close request to clear up some resources
    curl_close($curl);

    if (property_exists($resp, 'message')) {
        return "I couldn't find a github user with the name ".$username;
    }

    return $username.' has '.$resp->public_repos.' repositories on github. Check them out <a style="color: black; font-weight: bold; font-size: 18px; padding: 0px; text-decoration: none" target="_blank" href="'.$resp->html_url.'?tab=repositories">HERE</a>';
}

function getNeneRaeBotCustomCommands()
{
    return '<small>If you want to know the number of interns at HNG this year, type: <br /><b>"show number of interns" </b><br /><br />'.
    'If you want to see the avatar of a specific intern, type: <br /><b>"show avatar: intern username" </b><br /><br />'.
    'If you want me to show you the number of repositories a github user has, type: <br /><b>"show user repos: github username"</b> </small>';
}

function getNumberOfInterns()
{
    require 'db.php';

    $sqlForUser = 'SELECT COUNT(*) FROM interns_data';

    // this is executing our query
    $qForUser = $conn->query($sqlForUser);

    // this is defining the mode in which we receive results, saying the results should return in an array format (associative array to be precise)
    $qForUser->setFetchMode(PDO::FETCH_ASSOC);

    // this is finally sending the query to the database#9b4247
    $userData = $qForUser->fetch();

    return 'Presently, there are '.$userData['COUNT(*)'].' interns at the amazing hng internship.';
}