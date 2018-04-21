<?php 
try {
    $profile = 'SELECT * FROM interns_data WHERE username="shakirah"';
    $select = 'SELECT * FROM secret_word';

    $query = $conn->query($select);
    $profile_query = $conn->query($profile);

    $query->setFetchMode(PDO::FETCH_ASSOC);
    $profile_query->setFetchMode(PDO::FETCH_ASSOC);

    $get = $query->fetch();
    $user = $profile_query->fetch();
    $secret_word = $get['secret_word'];
  } catch (PDOException $e) {
      throw $e;
  }
 ?>
<!DOCTYPE html>
<html>
<head>
	<title>Personal Page</title>
	<meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">
    <link href="https://fonts.googleapis.com/css?family=Rubik" rel="stylesheet">
    <style>
        body {
            font-family: 'Rubik', sans-serif;
            background: grey;
        }
        #card-div {
            width: 50%;
            margin: 0 auto;
            margin-top: 20px;
            margin-bottom: 20px;
        }
        .img-circle {
            width: 100%;
            height: auto;
            border-radius: 50%;
            border: 3px solid #fff;
        }
        #profilename {
            padding-top: 50px;
        }
        .card-header {
            background: #29294b;
            color: #fff;
        }
        @media screen and (min-width: 800px) and (max-width: 1200px) {
            #img-div {
                padding-top: 15px;
            }
            #profilename {
                padding-top: 25px;
            }
            .card-header {
                padding-bottom: 30px;
            }
        }
        #shakirah {
            text-align: left;
        }
    </style>
</head>
<body>
    <div class="container">
        <div id="card-div">
            <div class="card">
                <div class="card-header">
                    <div class="row">
                        <div class="col-md-6">
                            <div id="img-div">
                                <img src="http://res.cloudinary.com/shakirah/image/upload/v1523834950/shakira.jpg" class="img-circle">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div id="profilename">
                                <h2 id="shakirah">Usman Sakirat Kehinde</h2>
                                <p>@shakirah</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h3>About Me</h3><hr>
                        <p>I am a 500l Computer Science student at Ladoke Akintola UNiversity of Technology(LAUTECH), Ogbomoso, Oyo State, Nigeria. I am a frontend developer. I convert designs to websites and also develop websites from scratch.</p>
                    </div>
                    <div>
                        <h3 class="text-center">Skills</h3><hr>
                        <div>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 80%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">HTML</div>
                            </div>
                        </div><br>
                        <div>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 70%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">CSS</div>
                            </div>
                        </div><br>
                        <div>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 90%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Bootstrap</div>
                            </div>
                        </div><br>
                        <div>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">Javascript</div>
                            </div>
                        </div><br>
                        <div>
                            <div class="progress">
                                <div class="progress-bar bg-success" role="progressbar" style="width: 50%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100">jQuery</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>
</body>
</html>