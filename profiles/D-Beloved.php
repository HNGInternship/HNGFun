<!DOCTYPE html>
<html lang="en">
<head>
	<link href="https://static.oracle.com/cdn/jet/v4.0.0/default/css/alta/oj-alta-min.css" rel="stylesheet" type="text/css">
	<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css">
	<style type="text/css">
		@import url(https://fonts.googleapis.com/css?family=Oswald:400,300);
		@import url(https://fonts.googleapis.com/css?family=Open+Sans);

		.container{
			width: 100%;
			min-height: 100%
		}
		.body0 {
			height: 100%;
		}
		.img-fluid {
			border-radius: 50%;
			margin: 2em 20em 0em 20em;
		}
		span {
			display: inline-block;
			vertical-align: middle;
			line-height: normal;
		}
		.main {
			position: relative;
			width: 100%;
			max-height: 200px;
			font-family: "Romanesco";
			font-size: 50px;
			text-align: center;
			margin-left: 6em;
		}
		.text {
			background: white;
			-webkit-background-clip: text;
			-webkit-text-fill-color: transparent;
		}
		.caption {
			position: relative;
			height: 50px;
			width: 100%;
			font-family: "Alegreya";
			line-height: normal;
			font-size: 32px;
			text-align: center;
			color: #000830;
			margin-left: 9em;
		}
		.icons {
			position: relative;
			height: 40px;
			width: 100%;
			font-family: "Alegreya";
			line-height: normal;
			font-size: 32px;
			text-align: center;
			color: #000830;
			margin-left: 9em;
		}
		.skills {
			position: relative;
			height: 49.71px;
			width: 100%;
			font-family: "Alegreya";
			line-height: normal;
			font-size: 32px;
			text-align: center;
			color: #000830;
			margin-left: 9em;
			margin-top: 10px;
		}
		body, html {
			margin: 0px;
			background-color: #8E60F1; !important;
			height: 100%;
		}
		.body1 {
			font-family: 'Source Sans Pro', sans-serif;
			font-size: 75%;
			display: flex;
			flex-direction: column;
			max-width: 700px;
			margin: 0 auto;
		}
</style>
</head>
<body>
<?php
    global $conn;
    try {
        $sql2 = 'SELECT * FROM interns_data WHERE username="d-beloved"';
        $q2 = $conn->query($sql2);
        $q2->setFetchMode(PDO::FETCH_ASSOC);
        $user = $q2->fetch();
    } catch (PDOException $e) {
        throw $e;
    }
    ?>

<div class="oj-flex oj-flex-items-pad oj-contrast-marker">
        <div class="oj-sm-6 oj-md-6 oj-flex-item">
            <div class="oj-flex oj-sm-align-items-center oj-sm-margin-2x">
                <div role="img" class="oj-flex-item alignCenter">
                    <oj-avatar role="img" size="[[avatarSize]]" initials='[[initials]]'
                    data-bind="attr:{'aria-label':'Avatar of Moronkeji Ayodeji'}">
                    </oj-avatar>
                    <img class="img-fluid " onerror="this.src='images/default.jpg'" src="https://res.cloudinary.com/dbeloved/image/upload/v1524498118/dee1.jpg" >
                </div>
            </div>
            <div class="body0">
                <div class="main"><span class="text"><?=$user['name'] ?></span></div>
                <div class="caption"><span>Jesus Lover | FullStack Web Developer</span></div>
                <div class="icons"><span>
                        <div class="oj-flex oj-md-align-items-center"><a href="https://github.com/d-beloved">
                            <div class="oj-flex-item oj-flex oj-sm-flex-direction-column oj-sm-align-items-center oj-sm-margin-2x">
                                <img style="width:40px; height: 40px;" src="https://cdn1.iconfinder.com/data/icons/logotypes/32/github-512.png">
                            </div></a>

                            <a href="https://linkedin.com/in/moronkeji-ayodeji">
                                 <div class="oj-flex-item oj-flex oj-sm-flex-direction-column oj-sm-align-items-center oj-sm-margin-2x">
                                    <img style="width:40px; height: 40px;" src="http://icons.iconarchive.com/icons/custom-icon-design/pretty-social-media/256/Linkedin-icon.png">
                                 </div>
                            </a>
                        </div></span>
                </div>
                <div class="skills"><span>Proficiency in Nodejs, Express, React/Redux, PostgreSql</span></div>
            </div>
        </div>
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

</body>

<script type="application/javascript">
$(function() {
    var Accordion = function(el, multiple) {
		this.el = el || {};
		this.multiple = multiple || false;

		// Variables privadas
		var links = this.el.find('.link');
		// Evento
		links.on('click', {el: this.el, multiple: this.multiple}, this.dropdown)
	}

	Accordion.prototype.dropdown = function(e) {
		var $el = e.data.el;
			$this = $(this),
			$next = $this.next();

		$next.slideToggle();
		$this.parent().toggleClass('open');

		if (!e.data.multiple) {
			$el.find('.submenu').not($next).slideUp().parent().removeClass('open');
		};
	}	

	var accordion = new Accordion($('#accordion'), false);
});
</script>

</html>
