<?php 
  try {
      $sql = 'SELECT secret_word, name, username, image_filename FROM secret_word, interns_data WHERE username = \'Chibuokem\'';
      $q = $conn->query($sql);
      $q->setFetchMode(PDO::FETCH_ASSOC);
      $data = $q->fetch();
      $secret_word = $data['secret_word'];
  } catch (PDOException $e) {
      throw $e;
  }

  require_once 'answers.php';

  if(isset($_POST['message'])){

    $input = $_POST['message'];

    $result = check_if_training_chibuokem($input);
    if($result == true){
        $result_training = train_chibuokem_bot($input);
        echo $result_training;
    }
    elseif($input =='help'){
        echo chibuokem_bot_help();
    }
    elseif($input == 'version'){
        echo get_chibuokem_bot_version();
    }
     elseif($input == 'aboutbot'){
        echo get_chibuokem_bot_version();
    }
    elseif($input == 'time'){
        echo get_time();
    }
    elseif($input == 'love_quote'){
        echo get_love_quote_chibuokem();
    }
    elseif($input =='inspiring_quote'){
        echo get_inspiring_quote_chibuokem();
    }
    elseif($input =='student_quote'){
        echo get_student_quote_chibuokem();
    }

    elseif($input =='sports_quote'){
        echo get_sports_quote_chibuokem();
    }
    elseif($input =='funny_quote'){
        echo get_funny_quote_chibuokem();
    }
    elseif($input =='weather_condition'){
        echo chibuokem_weather_condition();
    }
    elseif($input =='news'){
        echo get_chibuokem_news();
    }

    else{
        
        $result_answer = check_answer_table_chibuokem($input);

        if($result_answer != false){
            echo $result_answer;
        }
        else{
            echo "Please teach me how to answer this question using the format train question #answer #password";
        }
    }


    die();
  }

?>
    <style type="text/css">
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proximanova-regular-webfont.eot);
            src: url(assets/fonts/proximanova-regular-webfont.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proximanova-regular-webfont.woff2) format("woff2"), url(assets/fonts/proximanova-regular-webfont.woff) format("woff"), url(assets/fonts/proximanova-regular-webfont.ttf) format("truetype"), url(assets/fonts/proximanova-regular-webfont.svg#proxima_novaregular) format("svg");
            font-weight: 400;
            font-style: normal;
            unicode-range: u+000-5ff
        }
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proxima_nova_reg-latin-a.eot);
            src: url(assets/fonts/proxima_nova_reg-latin-a.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proxima_nova_reg-latin-a.woff2) format("woff2"), url(assets/fonts/proxima_nova_reg-latin-a.woff) format("woff"), url(assets/fonts/proxima_nova_reg-latin-a.ttf) format("truetype"), url(assets/fonts/proxima_nova_reg-latin-a.svg#proxima_novaregular) format("svg");
            font-weight: 400;
            font-style: normal;
            unicode-range: u+0100–017f
        }
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proxima_nova_reg-punc.eot);
            src: url(assets/fonts/proxima_nova_reg-punc.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proxima_nova_reg-punc.woff2) format("woff2"), url(assets/fonts/proxima_nova_reg-punc.woff) format("woff"), url(assets/fonts/proxima_nova_reg-punc.ttf) format("truetype"), url(assets/fonts/proxima_nova_reg-punc.svg#proxima_novaregular) format("svg");
            font-weight: 400;
            font-style: normal;
            unicode-range: u+2000–206f
        }
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proximanova-bold-webfont.eot);
            src: url(assets/fonts/proximanova-bold-webfont.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proximanova-bold-webfont.woff2) format("woff2"), url(assets/fonts/proximanova-bold-webfont.woff) format("woff"), url(assets/fonts/proximanova-bold-webfont.ttf) format("truetype"), url(assets/fonts/proximanova-bold-webfont.svg#proxima_novabold) format("svg");
            font-weight: 700;
            font-style: normal;
            unicode-range: u+000-5ff
        }
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proxima_nova_bold-latin-a.eot);
            src: url(assets/fonts/proxima_nova_bold-latin-a.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proxima_nova_bold-latin-a.woff2) format("woff2"), url(assets/fonts/proxima_nova_bold-latin-a.woff) format("woff"), url(assets/fonts/proxima_nova_bold-latin-a.ttf) format("truetype"), url(assets/fonts/proxima_nova_bold-latin-a.svg#proxima_novabold) format("svg");
            font-weight: 700;
            font-style: normal;
            unicode-range: u+0100–017f
        }
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proxima_nova_bold-punc.eot);
            src: url(assets/fonts/proxima_nova_bold-punc.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proxima_nova_bold-punc.woff2) format("woff2"), url(assets/fonts/proxima_nova_bold-punc.woff) format("woff"), url(assets/fonts/proxima_nova_bold-punc.ttf) format("truetype"), url(assets/fonts/proxima_nova_bold-punc.svg#proxima_novabold) format("svg");
            font-weight: 700;
            font-style: normal;
            unicode-range: u+2000–206f
        }
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proximanova-regularit-webfont.eot);
            src: url(assets/fonts/proximanova-regularit-webfont.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proximanova-regularit-webfont.woff2) format("woff2"), url(assets/fonts/proximanova-regularit-webfont.woff) format("woff"), url(assets/fonts/proximanova-regularit-webfont.ttf) format("truetype"), url(assets/fonts/proximanova-regularit-webfont.svg#proxima_novaitalic) format("svg");
            font-weight: 400;
            font-style: italic
        }
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proximanova-boldit-webfont.eot);
            src: url(assets/fonts/proximanova-boldit-webfont.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proximanova-boldit-webfont.woff2) format("woff2"), url(assets/fonts/proximanova-boldit-webfont.woff) format("woff"), url(assets/fonts/proximanova-boldit-webfont.ttf) format("truetype"), url(assets/fonts/proximanova-boldit-webfont.svg#proxima_novabold_italic) format("svg");
            font-weight: 700;
            font-style: italic
        }
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proximanova-light-webfont.eot);
            src: url(assets/fonts/proximanova-light-webfont.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proximanova-light-webfont.woff2) format("woff2"), url(assets/fonts/proximanova-light-webfont.woff) format("woff"), url(assets/fonts/proximanova-light-webfont.ttf) format("truetype"), url(assets/fonts/proximanova-light-webfont.svg#proxima_novalight) format("svg");
            font-weight: 200;
            font-style: normal
        }
        a,
        abbr,
        acronym,
        address,
        applet,
        big,
        blockquote,
        body,
        caption,
        cite,
        code,
        dd,
        del,
        dfn,
        div,
        dl,
        dt,
        em,
        fieldset,
        font,
        form,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        html,
        iframe,
        img,
        ins,
        kbd,
        label,
        legend,
        li,
        object,
        ol,
        p,
        pre,
        q,
        s,
        samp,
        small,
        span,
        strike,
        sub,
        sup,
        table,
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr,
        tt,
        ul,
        var {
            margin: 0;
            padding: 0;
            border: 0;
            font-weight: inherit;
            font-style: inherit;
            font-size: 100%;
            font-family: inherit;
            vertical-align: baseline
        }
        body {
            line-height: 1;
            color: #000
        }
        ol,
        ul {
            list-style: none
        }
        table {
            border-collapse: separate;
            border-spacing: 0
        }
        caption,
        td,
        th {
            text-align: left;
            font-weight: 400
        }
        blockquote:after,
        blockquote:before,
        q:after,
        q:before {
            content: ""
        }
        blockquote,
        q {
            quotes: "" ""
        }
        em {
            font-style: italic
        }
        button {
            margin: 0;
            padding: 0;
            border: none;
            background-color: transparent;
            cursor: pointer;
            overflow: visible
        }
        .row {
            clear: both;
            margin-right: -20px;
            zoom: 1
        }
        .row:after {
            display: block;
            visibility: hidden;
            height: 0;
            clear: both;
            content: "."
        }
        .row .column {
            float: left;
            padding-right: 20px;
            box-sizing: border-box
        }
        .row .column.gutter-left {
            padding-left: 20px
        }
        .row .column.row {
            padding-right: 0;
            margin-right: 0;
            clear: none
        }
        .columns-1>.column {
            width: 100%
        }
        .columns-2>.column {
            width: 50%
        }
        .columns-2>.column.colspan-2 {
            width: 100%
        }
        .columns-3>.column {
            width: 33.3333%
        }
        .columns-3>.column.colspan-2 {
            width: 66.6666%
        }
        .columns-3>.column.colspan-3 {
            width: 100%
        }
        .columns-4>.column {
            width: 25%
        }
        .columns-4>.column.colspan-2 {
            width: 50%
        }
        .columns-4>.column.colspan-3 {
            width: 75%
        }
        .columns-4>.column.colspan-4 {
            width: 100%
        }
        .columns-5>.column {
            width: 20%
        }
        .columns-5>.column.colspan-2 {
            width: 40%
        }
        .columns-5>.column.colspan-3 {
            width: 60%
        }
        .columns-5>.column.colspan-4 {
            width: 80%
        }
        .columns-5>.column.colspan-5 {
            width: 100%
        }
        .columns-6>.column {
            width: 16.6666%
        }
        .columns-6>.column.colspan-2 {
            width: 33.3333%
        }
        .columns-6>.column.colspan-3 {
            width: 50%
        }
        .columns-6>.column.colspan-4 {
            width: 66.6666%
        }
        .columns-6>.column.colspan-5 {
            width: 83.3333%
        }
        .columns-6>.column.colspan-6 {
            width: 100%
        }
        .columns-7>.column {
            width: 14.2857%
        }
        .columns-7>.column.colspan-2 {
            width: 28.5714%
        }
        .columns-7>.column.colspan-3 {
            width: 42.8571%
        }
        .columns-7>.column.colspan-4 {
            width: 57.1428%
        }
        .columns-7>.column.colspan-5 {
            width: 71.4285%
        }
        .columns-7>.column.colspan-6 {
            width: 85.7142%
        }
        .columns-7>.column.colspan-7 {
            width: 100%
        }
        .columns-8>.column {
            width: 12.5%
        }
        .columns-8>.column.colspan-2 {
            width: 25%
        }
        .columns-8>.column.colspan-3 {
            width: 37.5%
        }
        .columns-8>.column.colspan-4 {
            width: 50%
        }
        .columns-8>.column.colspan-5 {
            width: 62.5%
        }
        .columns-8>.column.colspan-6 {
            width: 75%
        }
        .columns-8>.column.colspan-7 {
            width: 87.5%
        }
        .columns-8>.column.colspan-8 {
            width: 100%
        }
        .columns-9>.column {
            width: 11.1111%
        }
        .columns-9>.column.colspan-2 {
            width: 22.2222%
        }
        .columns-9>.column.colspan-3 {
            width: 33.3333%
        }
        .columns-9>.column.colspan-4 {
            width: 44.4444%
        }
        .columns-9>.column.colspan-5 {
            width: 55.5555%
        }
        .columns-9>.column.colspan-6 {
            width: 66.6666%
        }
        .columns-9>.column.colspan-7 {
            width: 77.7777%
        }
        .columns-9>.column.colspan-8 {
            width: 88.8888%
        }
        .columns-9>.column.colspan-9 {
            width: 100%
        }
        .columns-10>.column {
            width: 10%
        }
        .columns-10>.column.colspan-2 {
            width: 20%
        }
        .columns-10>.column.colspan-3 {
            width: 30%
        }
        .columns-10>.column.colspan-4 {
            width: 40%
        }
        .columns-10>.column.colspan-5 {
            width: 50%
        }
        .columns-10>.column.colspan-6 {
            width: 60%
        }
        .columns-10>.column.colspan-7 {
            width: 70%
        }
        .columns-10>.column.colspan-8 {
            width: 80%
        }
        .columns-10>.column.colspan-9 {
            width: 90%
        }
        .columns-10>.column.colspan-10 {
            width: 100%
        }
        .columns-11>.column {
            width: 9.0909%
        }
        .columns-11>.column.colspan-2 {
            width: 18.1818%
        }
        .columns-11>.column.colspan-3 {
            width: 27.2727%
        }
        .columns-11>.column.colspan-4 {
            width: 36.3636%
        }
        .columns-11>.column.colspan-5 {
            width: 45.4545%
        }
        .columns-11>.column.colspan-6 {
            width: 54.5454%
        }
        .columns-11>.column.colspan-7 {
            width: 63.6363%
        }
        .columns-11>.column.colspan-8 {
            width: 72.7272%
        }
        .columns-11>.column.colspan-9 {
            width: 81.8181%
        }
        .columns-11>.column.colspan-10 {
            width: 90.909%
        }
        .columns-11>.column.colspan-11 {
            width: 100%
        }
        .columns-12>.column {
            width: 8.3333%
        }
        .columns-12>.column.colspan-2 {
            width: 16.6666%
        }
        .columns-12>.column.colspan-3 {
            width: 25%
        }
        .columns-12>.column.colspan-4 {
            width: 33.3333%
        }
        .columns-12>.column.colspan-5 {
            width: 41.6666%
        }
        .columns-12>.column.colspan-6 {
            width: 50%
        }
        .columns-12>.column.colspan-7 {
            width: 58.3333%
        }
        .columns-12>.column.colspan-8 {
            width: 66.6666%
        }
        .columns-12>.column.colspan-9 {
            width: 75%
        }
        .columns-12>.column.colspan-10 {
            width: 83.3333%
        }
        .columns-12>.column.colspan-11 {
            width: 91.6666%
        }
        .columns-12>.column.colspan-12 {
            width: 100%
        }
        .row.gutter-10 {
            margin-right: -10px
        }
        .row.gutter-10 .column {
            padding-right: 10px
        }
        .row.gutter-15 {
            margin-right: -15px
        }
        .row.gutter-15 .column {
            padding-right: 15px
        }
        @media only screen and (max-width: 640px) {
            .row {
                margin: 0
            }
            .column {
                width: 100%!important;
                box-sizing: border-box
            }
            .row .column {
                padding-right: 0
            }
        }
        .glyph-addon:before {
            content: "\F196"
        }
        .glyph-address:before {
            content: "\E871"
        }
        .glyph-angle-down:before {
            content: "\E845"
        }
        .glyph-angle-left:before {
            content: "\E846"
        }
        .glyph-angle-right:before {
            content: "\E847"
        }
        .glyph-angle-thin-down:before {
            content: "\E893"
        }
        .glyph-angle-thin-left:before {
            content: "\E894"
        }
        .glyph-angle-thin-right:before {
            content: "\E895"
        }
        .glyph-angle-thin-up:before {
            content: "\E896"
        }
        .glyph-angle-up:before {
            content: "\E848"
        }
        .glyph-arrow-down:before {
            content: "\E84D"
        }
        .glyph-arrow-left:before {
            content: "\E84E"
        }
        .glyph-arrow-right:before {
            content: "\E84F"
        }
        .glyph-arrow-up:before {
            content: "\E850"
        }
        .glyph-article:before {
            content: "\E88F"
        }
        .glyph-attention:before {
            content: "\E863"
        }
        .glyph-award:before {
            content: "\E890"
        }
        .glyph-behance:before {
            content: "\E85F"
        }
        .glyph-behance-circle:before {
            content: "\E808"
        }
        .glyph-bio:before {
            content: "\E800"
        }
        .glyph-bitbucket:before {
            content: "\E860"
        }
        .glyph-block:before {
            content: "\E840"
        }
        .glyph-blogger:before {
            content: "\E89A"
        }
        .glyph-blogger-circle:before {
            content: "\E809"
        }
        .glyph-bold:before {
            content: "\E856"
        }
        .glyph-book:before {
            content: "\E872"
        }
        .glyph-brush:before {
            content: "\E88A"
        }
        .glyph-building:before {
            content: "\E85C"
        }
        .glyph-building-alt:before {
            content: "\E899"
        }
        .glyph-calendar:before {
            content: "\E83C"
        }
        .glyph-camera:before {
            content: "\E830"
        }
        .glyph-charity:before {
            content: "\E855"
        }
        .glyph-chart-bar:before {
            content: "\E8AE"
        }
        .glyph-chat:before {
            content: "\E8AC"
        }
        .glyph-check:before {
            content: "\E86A"
        }
        .glyph-check2:before {
            content: "\E8A7"
        }
        .glyph-chevron-down:before {
            content: "\E84C"
        }
        .glyph-chevron-left:before {
            content: "\E849"
        }
        .glyph-chevron-right:before {
            content: "\E84A"
        }
        .glyph-chevron-up:before {
            content: "\E84B"
        }
        .glyph-clock:before {
            content: "\E874"
        }
        .glyph-close:before {
            content: "\E8A6"
        }
        .glyph-coffee:before {
            content: "\E85A"
        }
        .glyph-cog:before {
            content: "\E888"
        }
        .glyph-commercial-building:before {
            content: "\E898"
        }
        .glyph-contact:before {
            content: "\E892"
        }
        .glyph-create-sig:before {
            content: "\E827"
        }
        .glyph-credit-card:before {
            content: "\E859"
        }
        .glyph-date:before {
            content: "\E829"
        }
        .glyph-design:before {
            content: "\E806"
        }
        .glyph-doc:before {
            content: "\E8A1"
        }
        .glyph-download:before {
            content: "\E835"
        }
        .glyph-download-cloud:before {
            content: "\E836"
        }
        .glyph-dribbble:before {
            content: "\E861"
        }
        .glyph-dribbble-circle:before {
            content: "\E80A"
        }
        .glyph-edit:before {
            content: "\E838"
        }
        .glyph-education:before {
            content: "\E87A"
        }
        .glyph-ellipsis:before {
            content: "\E879"
        }
        .glyph-email:before {
            content: "\E88C"
        }
        .glyph-embed:before {
            content: "\E837"
        }
        .glyph-etsy:before {
            content: "\E804"
        }
        .glyph-etsy-circle:before {
            content: "\E80B"
        }
        .glyph-exchange:before {
            content: "\E889"
        }
        .glyph-eye:before {
            content: "\E887"
        }
        .glyph-eyedropper:before {
            content: "\E88B"
        }
        .glyph-facebook:before {
            content: "\E87E"
        }
        .glyph-facebook-circle:before {
            content: "\E80C"
        }
        .glyph-facebook-squared:before {
            content: "\E87F"
        }
        .glyph-fitbit-circle:before {
            content: "\E80D"
        }
        .glyph-flag:before {
            content: "\E86D"
        }
        .glyph-flickr:before {
            content: "\E87B"
        }
        .glyph-flickr-circle:before {
            content: "\E80E"
        }
        .glyph-food:before {
            content: "\E8A3"
        }
        .glyph-forward:before {
            content: "\E870"
        }
        .glyph-foursquare-circle:before {
            content: "\E80F"
        }
        .glyph-github:before {
            content: "\E862"
        }
        .glyph-github-circle:before {
            content: "\E810"
        }
        .glyph-glass:before {
            content: "\E82B"
        }
        .glyph-globe:before {
            content: "\E8A2"
        }
        .glyph-gmail:before {
            content: "\E89B"
        }
        .glyph-goodreads-circle:before {
            content: "\E825"
        }
        .glyph-google:before {
            content: "\E8AB"
        }
        .glyph-gplus:before {
            content: "\E8AA"
        }
        .glyph-gplus-circle:before {
            content: "\E811"
        }
        .glyph-group:before {
            content: "\E89F"
        }
        .glyph-heart:before {
            content: "\E82C"
        }
        .glyph-hireme:before {
            content: "\E85E"
        }
        .glyph-home:before {
            content: "\E86B"
        }
        .glyph-instagram:before {
            content: "\E883"
        }
        .glyph-instagram-circle:before {
            content: "\E812"
        }
        .glyph-italic:before {
            content: "\E857"
        }
        .glyph-kickstarter:before {
            content: "\E805"
        }
        .glyph-kickstarter-circle:before {
            content: "\E813"
        }
        .glyph-lightbulb:before {
            content: "\E83F"
        }
        .glyph-lightning:before {
            content: "\E897"
        }
        .glyph-link:before {
            content: "\E86C"
        }
        .glyph-linkedin:before {
            content: "\E882"
        }
        .glyph-linkedin-circle:before {
            content: "\E814"
        }
        .glyph-list:before {
            content: "\E877"
        }
        .glyph-location:before {
            content: "\E839"
        }
        .glyph-lock:before {
            content: "\E832"
        }
        .glyph-login:before {
            content: "\E83D"
        }
        .glyph-medium:before {
            content: "\E826"
        }
        .glyph-megaphone:before {
            content: "\E880"
        }
        .glyph-menu:before {
            content: "\E83B"
        }
        .glyph-minus:before {
            content: "\E886"
        }
        .glyph-mobile:before {
            content: "\E878"
        }
        .glyph-music:before {
            content: "\E865"
        }
        .glyph-pencil:before {
            content: "\E891"
        }
        .glyph-person:before {
            content: "\E867"
        }
        .glyph-phone:before {
            content: "\E83A"
        }
        .glyph-photo:before {
            content: "\E82F"
        }
        .glyph-picture:before {
            content: "\E869"
        }
        .glyph-pinterest:before {
            content: "\E881"
        }
        .glyph-pinterest-circle:before {
            content: "\E815"
        }
        .glyph-place:before {
            content: "\E88D"
        }
        .glyph-play:before {
            content: "\E8AF"
        }
        .glyph-plus:before {
            content: "\E885"
        }
        .glyph-podcast:before {
            content: "\E8AD"
        }
        .glyph-portfolio:before {
            content: "\E858"
        }
        .glyph-power:before {
            content: "\E884"
        }
        .glyph-promoted:before {
            content: "\E803"
        }
        .glyph-puzzle:before {
            content: "\E8A8"
        }
        .glyph-px500:before {
            content: "\E802"
        }
        .glyph-px500-circle:before {
            content: "\E807"
        }
        .glyph-quora-circle:before {
            content: "\E816"
        }
        .glyph-reel:before {
            content: "\E82D"
        }
        .glyph-reload:before {
            content: "\E851"
        }
        .glyph-reply:before {
            content: "\E86F"
        }
        .glyph-restaurant:before {
            content: "\E85B"
        }
        .glyph-robot:before {
            content: "\E824"
        }
        .glyph-search:before {
            content: "\E866"
        }
        .glyph-share:before {
            content: "\E88E"
        }
        .glyph-shop:before {
            content: "\E8A4"
        }
        .glyph-shuffle:before {
            content: "\E875"
        }
        .glyph-smile:before {
            content: "\E85D"
        }
        .glyph-smiley:before {
            content: "\E828"
        }
        .glyph-soundcloud-circle:before {
            content: "\E817"
        }
        .glyph-speaker:before {
            content: "\E83E"
        }
        .glyph-spotify-circle:before {
            content: "\E822"
        }
        .glyph-star:before {
            content: "\E8A5"
        }
        .glyph-strava-circle:before {
            content: "\E818"
        }
        .glyph-sun:before {
            content: "\E853"
        }
        .glyph-sunglasses:before {
            content: "\E82A"
        }
        .glyph-tag:before {
            content: "\E833"
        }
        .glyph-tags:before {
            content: "\E834"
        }
        .glyph-target:before {
            content: "\E876"
        }
        .glyph-thumbnails:before {
            content: "\E831"
        }
        .glyph-thumbsup:before {
            content: "\E86E"
        }
        .glyph-tools:before {
            content: "\E873"
        }
        .glyph-triangle-down:before {
            content: "\E841"
        }
        .glyph-triangle-left:before {
            content: "\E843"
        }
        .glyph-triangle-right:before {
            content: "\E844"
        }
        .glyph-triangle-up:before {
            content: "\E842"
        }
        .glyph-trophy:before {
            content: "\E852"
        }
        .glyph-tumblr:before {
            content: "\E89D"
        }
        .glyph-tumblr-circle:before {
            content: "\E819"
        }
        .glyph-tumblr-no-box:before {
            content: "\E89C"
        }
        .glyph-twitter:before {
            content: "\E87D"
        }
        .glyph-twitter-circle:before {
            content: "\E81A"
        }
        .glyph-upload-cloud:before {
            content: "\E8A9"
        }
        .glyph-users:before {
            content: "\E868"
        }
        .glyph-video:before {
            content: "\E82E"
        }
        .glyph-videocam:before {
            content: "\E8A0"
        }
        .glyph-vimeo:before {
            content: "\E87C"
        }
        .glyph-vimeo-circle:before {
            content: "\E81B"
        }
        .glyph-vine-circle:before {
            content: "\E81C"
        }
        .glyph-vk-circle:before {
            content: "\E81D"
        }
        .glyph-weibo-circle:before {
            content: "\E81E"
        }
        .glyph-wikipedia-circle:before {
            content: "\E823"
        }
        .glyph-wordpress:before {
            content: "\E89E"
        }
        .glyph-wordpress-circle:before {
            content: "\E81F"
        }
        .glyph-workout:before {
            content: "\E854"
        }
        .glyph-wow:before {
            content: "\E801"
        }
        .glyph-yelp-circle:before {
            content: "\E820"
        }
        .glyph-youtube:before {
            content: "\E864"
        }
        .glyph-youtube-circle:before {
            content: "\E821"
        }
        .glyph-addon-after:after {
            content: "\F196"
        }
        .glyph-address-after:after {
            content: "\E871"
        }
        .glyph-angle-down-after:after {
            content: "\E845"
        }
        .glyph-angle-left-after:after {
            content: "\E846"
        }
        .glyph-angle-right-after:after {
            content: "\E847"
        }
        .glyph-angle-thin-down-after:after {
            content: "\E893"
        }
        .glyph-angle-thin-left-after:after {
            content: "\E894"
        }
        .glyph-angle-thin-right-after:after {
            content: "\E895"
        }
        .glyph-angle-thin-up-after:after {
            content: "\E896"
        }
        .glyph-angle-up-after:after {
            content: "\E848"
        }
        .glyph-arrow-down-after:after {
            content: "\E84D"
        }
        .glyph-arrow-left-after:after {
            content: "\E84E"
        }
        .glyph-arrow-right-after:after {
            content: "\E84F"
        }
        .glyph-arrow-up-after:after {
            content: "\E850"
        }
        .glyph-article-after:after {
            content: "\E88F"
        }
        .glyph-attention-after:after {
            content: "\E863"
        }
        .glyph-award-after:after {
            content: "\E890"
        }
        .glyph-behance-after:after {
            content: "\E85F"
        }
        .glyph-behance-circle-after:after {
            content: "\E808"
        }
        .glyph-bio-after:after {
            content: "\E800"
        }
        .glyph-bitbucket-after:after {
            content: "\E860"
        }
        .glyph-block-after:after {
            content: "\E840"
        }
        .glyph-blogger-after:after {
            content: "\E89A"
        }
        .glyph-blogger-circle-after:after {
            content: "\E809"
        }
        .glyph-bold-after:after {
            content: "\E856"
        }
        .glyph-book-after:after {
            content: "\E872"
        }
        .glyph-brush-after:after {
            content: "\E88A"
        }
        .glyph-building-after:after {
            content: "\E85C"
        }
        .glyph-building-alt-after:after {
            content: "\E899"
        }
        .glyph-calendar-after:after {
            content: "\E83C"
        }
        .glyph-camera-after:after {
            content: "\E830"
        }
        .glyph-charity-after:after {
            content: "\E855"
        }
        .glyph-chart-bar-after:after {
            content: "\E8AE"
        }
        .glyph-chat-after:after {
            content: "\E8AC"
        }
        .glyph-check-after:after {
            content: "\E86A"
        }
        .glyph-check2-after:after {
            content: "\E8A7"
        }
        .glyph-chevron-down-after:after {
            content: "\E84C"
        }
        .glyph-chevron-left-after:after {
            content: "\E849"
        }
        .glyph-chevron-right-after:after {
            content: "\E84A"
        }
        .glyph-chevron-up-after:after {
            content: "\E84B"
        }
        .glyph-clock-after:after {
            content: "\E874"
        }
        .glyph-close-after:after {
            content: "\E8A6"
        }
        .glyph-coffee-after:after {
            content: "\E85A"
        }
        .glyph-cog-after:after {
            content: "\E888"
        }
        .glyph-commercial-building-after:after {
            content: "\E898"
        }
        .glyph-contact-after:after {
            content: "\E892"
        }
        .glyph-create-sig-after:after {
            content: "\E827"
        }
        .glyph-credit-card-after:after {
            content: "\E859"
        }
        .glyph-date-after:after {
            content: "\E829"
        }
        .glyph-design-after:after {
            content: "\E806"
        }
        .glyph-doc-after:after {
            content: "\E8A1"
        }
        .glyph-download-after:after {
            content: "\E835"
        }
        .glyph-download-cloud-after:after {
            content: "\E836"
        }
        .glyph-dribbble-after:after {
            content: "\E861"
        }
        .glyph-dribbble-circle-after:after {
            content: "\E80A"
        }
        .glyph-edit-after:after {
            content: "\E838"
        }
        .glyph-education-after:after {
            content: "\E87A"
        }
        .glyph-ellipsis-after:after {
            content: "\E879"
        }
        .glyph-email-after:after {
            content: "\E88C"
        }
        .glyph-embed-after:after {
            content: "\E837"
        }
        .glyph-etsy-after:after {
            content: "\E804"
        }
        .glyph-etsy-circle-after:after {
            content: "\E80B"
        }
        .glyph-exchange-after:after {
            content: "\E889"
        }
        .glyph-eye-after:after {
            content: "\E887"
        }
        .glyph-eyedropper-after:after {
            content: "\E88B"
        }
        .glyph-facebook-after:after {
            content: "\E87E"
        }
        .glyph-facebook-circle-after:after {
            content: "\E80C"
        }
        .glyph-facebook-squared-after:after {
            content: "\E87F"
        }
        .glyph-fitbit-circle-after:after {
            content: "\E80D"
        }
        .glyph-flag-after:after {
            content: "\E86D"
        }
        .glyph-flickr-after:after {
            content: "\E87B"
        }
        .glyph-flickr-circle-after:after {
            content: "\E80E"
        }
        .glyph-food-after:after {
            content: "\E8A3"
        }
        .glyph-forward-after:after {
            content: "\E870"
        }
        .glyph-foursquare-circle-after:after {
            content: "\E80F"
        }
        .glyph-github-after:after {
            content: "\E862"
        }
        .glyph-github-circle-after:after {
            content: "\E810"
        }
        .glyph-glass-after:after {
            content: "\E82B"
        }
        .glyph-globe-after:after {
            content: "\E8A2"
        }
        .glyph-gmail-after:after {
            content: "\E89B"
        }
        .glyph-goodreads-circle-after:after {
            content: "\E825"
        }
        .glyph-google-after:after {
            content: "\E8AB"
        }
        .glyph-gplus-after:after {
            content: "\E8AA"
        }
        .glyph-gplus-circle-after:after {
            content: "\E811"
        }
        .glyph-group-after:after {
            content: "\E89F"
        }
        .glyph-heart-after:after {
            content: "\E82C"
        }
        .glyph-hireme-after:after {
            content: "\E85E"
        }
        .glyph-home-after:after {
            content: "\E86B"
        }
        .glyph-instagram-after:after {
            content: "\E883"
        }
        .glyph-instagram-circle-after:after {
            content: "\E812"
        }
        .glyph-italic-after:after {
            content: "\E857"
        }
        .glyph-kickstarter-after:after {
            content: "\E805"
        }
        .glyph-kickstarter-circle-after:after {
            content: "\E813"
        }
        .glyph-lightbulb-after:after {
            content: "\E83F"
        }
        .glyph-lightning-after:after {
            content: "\E897"
        }
        .glyph-link-after:after {
            content: "\E86C"
        }
        .glyph-linkedin-after:after {
            content: "\E882"
        }
        .glyph-linkedin-circle-after:after {
            content: "\E814"
        }
        .glyph-list-after:after {
            content: "\E877"
        }
        .glyph-location-after:after {
            content: "\E839"
        }
        .glyph-lock-after:after {
            content: "\E832"
        }
        .glyph-login-after:after {
            content: "\E83D"
        }
        .glyph-medium-after:after {
            content: "\E826"
        }
        .glyph-megaphone-after:after {
            content: "\E880"
        }
        .glyph-menu-after:after {
            content: "\E83B"
        }
        .glyph-minus-after:after {
            content: "\E886"
        }
        .glyph-mobile-after:after {
            content: "\E878"
        }
        .glyph-music-after:after {
            content: "\E865"
        }
        .glyph-pencil-after:after {
            content: "\E891"
        }
        .glyph-person-after:after {
            content: "\E867"
        }
        .glyph-phone-after:after {
            content: "\E83A"
        }
        .glyph-photo-after:after {
            content: "\E82F"
        }
        .glyph-picture-after:after {
            content: "\E869"
        }
        .glyph-pinterest-after:after {
            content: "\E881"
        }
        .glyph-pinterest-circle-after:after {
            content: "\E815"
        }
        .glyph-place-after:after {
            content: "\E88D"
        }
        .glyph-play-after:after {
            content: "\E8AF"
        }
        .glyph-plus-after:after {
            content: "\E885"
        }
        .glyph-podcast-after:after {
            content: "\E8AD"
        }
        .glyph-portfolio-after:after {
            content: "\E858"
        }
        .glyph-power-after:after {
            content: "\E884"
        }
        .glyph-promoted-after:after {
            content: "\E803"
        }
        .glyph-puzzle-after:after {
            content: "\E8A8"
        }
        .glyph-px500-after:after {
            content: "\E802"
        }
        .glyph-px500-circle-after:after {
            content: "\E807"
        }
        .glyph-quora-circle-after:after {
            content: "\E816"
        }
        .glyph-reel-after:after {
            content: "\E82D"
        }
        .glyph-reload-after:after {
            content: "\E851"
        }
        .glyph-reply-after:after {
            content: "\E86F"
        }
        .glyph-restaurant-after:after {
            content: "\E85B"
        }
        .glyph-robot-after:after {
            content: "\E824"
        }
        .glyph-search-after:after {
            content: "\E866"
        }
        .glyph-share-after:after {
            content: "\E88E"
        }
        .glyph-shop-after:after {
            content: "\E8A4"
        }
        .glyph-shuffle-after:after {
            content: "\E875"
        }
        .glyph-smile-after:after {
            content: "\E85D"
        }
        .glyph-smiley-after:after {
            content: "\E828"
        }
        .glyph-soundcloud-circle-after:after {
            content: "\E817"
        }
        .glyph-speaker-after:after {
            content: "\E83E"
        }
        .glyph-spotify-circle-after:after {
            content: "\E822"
        }
        .glyph-star-after:after {
            content: "\E8A5"
        }
        .glyph-strava-circle-after:after {
            content: "\E818"
        }
        .glyph-sun-after:after {
            content: "\E853"
        }
        .glyph-sunglasses-after:after {
            content: "\E82A"
        }
        .glyph-tag-after:after {
            content: "\E833"
        }
        .glyph-tags-after:after {
            content: "\E834"
        }
        .glyph-target-after:after {
            content: "\E876"
        }
        .glyph-thumbnails-after:after {
            content: "\E831"
        }
        .glyph-thumbsup-after:after {
            content: "\E86E"
        }
        .glyph-tools-after:after {
            content: "\E873"
        }
        .glyph-triangle-down-after:after {
            content: "\E841"
        }
        .glyph-triangle-left-after:after {
            content: "\E843"
        }
        .glyph-triangle-right-after:after {
            content: "\E844"
        }
        .glyph-triangle-up-after:after {
            content: "\E842"
        }
        .glyph-trophy-after:after {
            content: "\E852"
        }
        .glyph-tumblr-after:after {
            content: "\E89D"
        }
        .glyph-tumblr-circle-after:after {
            content: "\E819"
        }
        .glyph-tumblr-no-box-after:after {
            content: "\E89C"
        }
        .glyph-twitter-after:after {
            content: "\E87D"
        }
        .glyph-twitter-circle-after:after {
            content: "\E81A"
        }
        .glyph-upload-cloud-after:after {
            content: "\E8A9"
        }
        .glyph-users-after:after {
            content: "\E868"
        }
        .glyph-video-after:after {
            content: "\E82E"
        }
        .glyph-videocam-after:after {
            content: "\E8A0"
        }
        .glyph-vimeo-after:after {
            content: "\E87C"
        }
        .glyph-vimeo-circle-after:after {
            content: "\E81B"
        }
        .glyph-vine-circle-after:after {
            content: "\E81C"
        }
        .glyph-vk-circle-after:after {
            content: "\E81D"
        }
        .glyph-weibo-circle-after:after {
            content: "\E81E"
        }
        .glyph-wikipedia-circle-after:after {
            content: "\E823"
        }
        .glyph-wordpress-after:after {
            content: "\E89E"
        }
        .glyph-wordpress-circle-after:after {
            content: "\E81F"
        }
        .glyph-workout-after:after {
            content: "\E854"
        }
        .glyph-wow-after:after {
            content: "\E801"
        }
        .glyph-yelp-circle-after:after {
            content: "\E820"
        }
        .glyph-youtube-after:after {
            content: "\E864"
        }
        .glyph-youtube-circle-after:after {
            content: "\E821"
        }
        @font-face {
            font-family: aboutme-glyphs;
            src: url(assets/fonts/aboutme-glyphs.eot);
            src: url(assets/fonts/aboutme-glyphs.eot?#iefix) format("embedded-opentype"), url(assets/fonts/aboutme-glyphs.woff2) format("woff2"), url(assets/fonts/aboutme-glyphs.woff) format("woff"), url(assets/fonts/aboutme-glyphs.ttf) format("truetype"), url(assets/fonts/aboutme-glyphs.svg#aboutme-glyphs) format("svg");
            font-weight: 400;
            font-style: normal
        }
        [class*=" glyph-"],
        [class^=glyph-] {
            position: relative
        }
        .glyph:after,
        .glyph:before,
        [class*=" glyph-"]:after,
        [class*=" glyph-"]:before,
        [class^=glyph-]:after,
        [class^=glyph-]:before {
            font-family: aboutme-glyphs;
            font-style: normal;
            font-weight: 400;
            speak: none;
            display: inline-block;
            text-decoration: inherit;
            text-align: center;
            line-height: 1em;
            font-variant: normal;
            text-transform: none;
            font-size: 120%;
            position: relative;
            top: .05em;
            width: 1em
        }
        [class*=" glyph-"]:before,
        [class^=glyph-]:before {
            margin-right: .4em
        }
        [class*=" glyph-"]:after,
        [class^=glyph-]:after {
            margin-left: .4em
        }
        .glyph-svg svg {
            display: inline-block;
            text-decoration: inherit;
            text-align: center;
            position: relative;
            line-height: 1em;
            width: 1.2em;
            height: 1.2em;
            top: .05em
        }
        .glyph-svg svg path {
            fill: #fff
        }
        .glyph-exclamation:before {
            content: "!";
            font-weight: 700;
            font-family: inherit
        }
        .glyph-question:before {
            content: "?";
            font-family: inherit
        }
        .glyph-center {
            position: relative
        }
        .glyph-center:before {
            position: absolute!important;
            width: 100%;
            height: 100%;
            line-height: inherit;
            margin: 0!important;
            padding: 0!important;
            left: 0;
            top: 0
        }
        .glyph-text:before {
            margin: 0!important
        }
        .glyph-flip:before {
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
            -ms-filter: fliph;
            -webkit-filter: fliph;
            filter: fliph
        }
        .button[class*=" glyph-"]:before,
        .button[class^=glyph-]:before {
            font-size: 96%;
            margin-left: -.2em;
            margin-right: .5em;
            top: 0
        }
        .button[class*=" glyph-"]:after,
        .button[class^=glyph-]:after {
            font-size: 96%;
            margin-right: -.2em;
            margin-left: .5em;
            top: 0
        }
        .button.glyph-twitter:before {
            font-size: 140%;
            top: .15em;
            margin-left: -.3em
        }
        .browser-ie11 .button.glyph-twitter:before {
            font-size: 22px
        }
        .button.glyph-facebook:before {
            font-size: 130%;
            top: .12em;
            margin-left: -.3em;
            margin-right: .3em
        }
        .browser-ie11 .button.glyph-facebook:before {
            font-size: 21px
        }
        .button.glyph-linkedin:before {
            top: .05em
        }
        .button.glyph-instagram:before {
            font-size: 125%;
            top: .1em
        }
        .browser-ie11 .button.glyph-instagram:before {
            font-size: 20px
        }
        .button.glyph-google:before {
            font-size: 100%
        }
        .browser-ie11 .button.glyph-google:before {
            font-size: 16px
        }
        .button.glyph-gplus:before {
            font-size: 90%
        }
        .browser-ie11 .button.glyph-gplus:before {
            font-size: 14px
        }
        .glyph-email:before {
            font-size: 90%;
            top: -.05em
        }
        .browser-ie11 .glyph-email:before {
            font-size: 14px
        }
        .button.glyph-email:before {
            margin-right: .8em
        }
        .button.glyph-share:before {
            font-size: 130%;
            top: 1px
        }
        .browser-ie11 .button.glyph-share:before {
            font-size: 21px
        }
        .button.glyph-angle-left:before,
        .button.glyph-angle-right:before {
            top: 1px;
            font-size: 100%
        }
        .browser-ie11 .button.glyph-angle-left:before,
        .browser-ie11 .button.glyph-angle-right:before {
            font-size: 16px
        }
        .glyph-link:before {
            font-size: 120%
        }
        .browser-ie11 .glyph-link:before {
            font-size: 19px
        }
        .glyph-list:before {
            font-size: 150%;
            top: .12em
        }
        .browser-ie11 .glyph-list:before {
            font-size: 24px
        }
        .glyph-pencil.glyph-center:before {
            font-size: 100%;
            top: .09em
        }
        .browser-ie11 .glyph-pencil.glyph-center:before {
            font-size: 16px
        }
        .glyph-close.glyph-center:before {
            top: .05em;
            font-size: 80%
        }
        .browser-ie11 .glyph-close.glyph-center:before {
            font-size: 13px
        }
        .glyph-minus:before,
        .glyph-plus:before {
            font-size: 100%
        }
        .browser-ie11 .glyph-minus:before,
        .browser-ie11 .glyph-plus:before {
            font-size: 16px
        }
        .glyph-eye:before {
            top: .1em;
            font-size: 135%
        }
        .browser-ie11 .glyph-eye:before {
            font-size: 22px
        }
        .glyph-lightbulb:before {
            top: .1em;
            font-size: 140%
        }
        .browser-ie11 .glyph-lightbulb:before {
            font-size: 22px
        }
        .glyph-px500:before {
            top: .15em;
            font-size: 135%
        }
        .browser-ie11 .glyph-px500:before {
            font-size: 22px
        }
        .glyph-medium-after:after,
        .glyph-medium:before {
            font-size: 90%
        }
        .browser-ie11 .glyph-medium-after:after,
        .browser-ie11 .glyph-medium:before {
            font-size: 14px
        }
        .glyph-etsy-after:after,
        .glyph-etsy:before {
            font-size: 100%
        }
        .browser-ie11 .glyph-etsy-after:after,
        .browser-ie11 .glyph-etsy:before {
            font-size: 16px
        }
        .glyph-dribbble-after:after,
        .glyph-dribbble:before {
            font-size: 135%
        }
        .browser-ie11 .glyph-dribbble-after:after,
        .browser-ie11 .glyph-dribbble:before {
            font-size: 22px
        }
        body {
            font-family: Proxima Nova, Tahoma, Helvetica, Verdana, sans-serif;
            font-size: 14px;
            line-height: 1.3;
            color: #333;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%
        }
        @media only screen and (max-width: 640px) {
            body {
                font-family: Proxima Nova, TrebuchetMS, Droid Sans, sans-serif!important
            }
        }
        a {
            color: #0974b6;
            text-decoration: none
        }
        .no-touchevents a:hover {
            color: #07639c;
            text-decoration: none
        }
        hr {
            background-color: #999;
            border: 0;
            margin: .75em 0;
            height: 1px
        }
        .right {
            float: right
        }
        .left {
            float: left
        }
        .clear {
            clear: both
        }
        .inline {
            display: inline
        }
        .invisible {
            display: none!important
        }
        .clickable {
            cursor: pointer
        }
        * {
            transition: background-color .15s ease-out, color .15s ease-out, border-color .15s ease-out, fill .15s ease-out, box-shadow .15s ease-out
        }
        ul.inline,
        ul.inline>li {
            display: inline-block
        }
        ul.inline>li {
            vertical-align: baseline
        }
        .button.fullwidth,
        .fullwidth,
        input.fullwidth,
        select.fullwidth,
        textarea.fullwidth {
            box-sizing: border-box;
            width: 100%
        }
        div.pane {
            display: none
        }
        div.pane.active {
            display: block
        }
        p {
            margin-bottom: .75em
        }
        p:last-child {
            margin-bottom: 0
        }
        ul.bulleted {
            padding-left: 1.3em;
            list-style-type: disc
        }
        ul.bulleted ul.bulleted {
            list-style-type: circle
        }
        ul.bulleted li {
            margin: .75em 0
        }
        ol.numbered {
            padding-left: 1.3em;
            list-style-type: decimal
        }
        ol.numbered li {
            margin: .75em 0
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: 16px;
            font-weight: 400;
            margin: 0;
            margin-bottom: 10px
        }
        .nowrap {
            white-space: nowrap
        }
        .text.small {
            font-size: 12px!important
        }
        .text.italic {
            font-style: italic
        }
        .text.bold {
            font-weight: 700
        }
        .text.capitalize {
            text-transform: capitalize
        }
        .text.underline {
            text-decoration: underline
        }
        .text.white {
            color: #fff
        }
        .text.black {
            color: #000
        }
        .text.gray {
            color: #999
        }
        .text.yellow {
            color: #fc3
        }
        .no-touchevents a.text.yellow:hover {
            color: #ffe7a2
        }
        .text.orange {
            color: #e37f1c
        }
        .text.link {
            color: #00a98f;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }
        .no-touchevents .text.link:hover {
            color: #00dcba
        }
        .text.ellipsis {
            overflow: hidden;
            text-overflow: ellipsis
        }
        .text.break-all {
            word-break: break-all
        }
        input[type=search] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none
        }
        input[type=search]::-webkit-search-cancel-button {
            z-index: 1
        }
        input[type=email],
        input[type=password],
        input[type=search],
        input[type=tel],
        input[type=text],
        input[type=url] {
            display: block;
            margin: 0;
            margin-bottom: 5px;
            background-color: #fff;
            box-shadow: inset 0 10px 5px -10px #ddd;
            font-size: 16px;
            line-height: 1.5;
            font-family: inherit;
            padding: 4px;
            border: 1px solid #ccc;
            border-radius: 3px;
            z-index: inherit
        }
        input[type=email]:focus,
        input[type=password]:focus,
        input[type=search]:focus,
        input[type=tel]:focus,
        input[type=text]:focus,
        input[type=url]:focus {
            z-index: 1;
            outline-width: 3px;
            outline-style: solid;
            outline-color: rgba(0, 169, 143, .3);
            outline-offset: 1px
        }
        input[type=email].input,
        input[type=password].input,
        input[type=search].input,
        input[type=tel].input,
        input[type=text].input,
        input[type=url].input {
            font-size: 13px;
            line-height: 30px;
            height: 30px;
            padding: 0 6px;
            box-sizing: border-box
        }
        input[type=email].input.large,
        input[type=password].input.large,
        input[type=search].input.large,
        input[type=tel].input.large,
        input[type=text].input.large,
        input[type=url].input.large {
            font-size: 16px;
            line-height: 40px;
            height: 40px;
            padding: 0 10px
        }
        input[type=email].input.xlarge,
        input[type=password].input.xlarge,
        input[type=search].input.xlarge,
        input[type=tel].input.xlarge,
        input[type=text].input.xlarge,
        input[type=url].input.xlarge {
            font-size: 18px;
            line-height: 50px;
            height: 50px;
            padding: 0 15px
        }
        input[type=email].input.inline,
        input[type=password].input.inline,
        input[type=search].input.inline,
        input[type=tel].input.inline,
        input[type=text].input.inline,
        input[type=url].input.inline {
            display: inline-block;
            margin-right: 3px;
            vertical-align: top
        }
        input[type=email].input.uppercase,
        input[type=password].input.uppercase,
        input[type=search].input.uppercase,
        input[type=tel].input.uppercase,
        input[type=text].input.uppercase,
        input[type=url].input.uppercase {
            text-transform: uppercase
        }
        input[type=email].input.uppercase::-webkit-input-placeholder,
        input[type=password].input.uppercase::-webkit-input-placeholder,
        input[type=search].input.uppercase::-webkit-input-placeholder,
        input[type=tel].input.uppercase::-webkit-input-placeholder,
        input[type=text].input.uppercase::-webkit-input-placeholder,
        input[type=url].input.uppercase::-webkit-input-placeholder {
            text-transform: none
        }
        input[type=email].input.uppercase:-ms-input-placeholder,
        input[type=password].input.uppercase:-ms-input-placeholder,
        input[type=search].input.uppercase:-ms-input-placeholder,
        input[type=tel].input.uppercase:-ms-input-placeholder,
        input[type=text].input.uppercase:-ms-input-placeholder,
        input[type=url].input.uppercase:-ms-input-placeholder {
            text-transform: none
        }
        input[type=email].input.uppercase::placeholder,
        input[type=password].input.uppercase::placeholder,
        input[type=search].input.uppercase::placeholder,
        input[type=tel].input.uppercase::placeholder,
        input[type=text].input.uppercase::placeholder,
        input[type=url].input.uppercase::placeholder {
            text-transform: none
        }
        textarea {
            display: block;
            font-size: 16px;
            line-height: 1.3;
            font-family: inherit;
            padding: 4px;
            margin: 0;
            margin-bottom: 5px;
            box-shadow: inset 0 10px 5px -10px #ddd;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 3px;
            resize: vertical
        }
        textarea.input {
            font-size: 13px;
            padding: 6px;
            z-index: inherit
        }
        textarea.input:focus {
            z-index: 1;
            outline-width: 3px;
            outline-style: solid;
            outline-color: rgba(0, 169, 143, .3);
            outline-offset: 1px
        }
        textarea.input.large {
            font-size: 16px;
            padding: 10px
        }
        input.hint,
        textarea.hint {
            color: #999
        }
        select {
            line-height: 24px;
            font-size: 12px;
            border: 1px solid #ccc;
            border-radius: 3px
        }
        label,
        select {
            margin-bottom: 5px
        }
        label {
            display: block;
            font-size: 14px;
            z-index: inherit
        }
        label:focus {
            z-index: 1;
            outline-width: 3px;
            outline-style: solid;
            outline-color: rgba(0, 169, 143, .3);
            outline-offset: 1px
        }
        label.label {
            font-weight: 700
        }
        label.inline {
            display: inline-block;
            margin-right: 10px
        }
        fieldset {
            margin-bottom: 15px
        }
        fieldset.last,
        fieldset:last-child {
            margin-bottom: 0
        }
        input[type=file] {
            height: 100%
        }
        label.error {
            color: red;
            font-weight: 700;
            margin-top: 10px
        }
        label.error.glyph-attention:before {
            margin-right: 5px
        }
        label.confirmation {
            margin-top: 10px;
            color: #00a98f
        }
        label.confirmation.glyph-check:before {
            margin-right: 2px;
            font-size: 130%
        }
        input.input.underline,
        textarea.input.underline {
            box-shadow: none;
            outline: none;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
            border-color: transparent;
            border-bottom-color: #ccc;
            resize: none
        }
        input.input.underline:focus,
        textarea.input.underline:focus {
            background-color: #f8f8f8;
            border-bottom-color: #00a98f
        }
        .element-error input.underline,
        .element-error input.underline:focus {
            border-bottom-color: #c66
        }
        .buttonfield .input.underline.large+.button.small {
            border-radius: 5px;
            margin-top: 6px
        }
        fieldset.glyphinput:before {
            position: absolute;
            margin: 0;
            left: 5px;
            top: 0;
            line-height: 40px;
            font-size: 140%;
            color: #999
        }
        fieldset.glyphinput.seafoam:before {
            color: #2eb897
        }
        fieldset.glyphinput input.input {
            padding-left: 2em
        }
        .buttonfield {
            position: relative
        }
        .buttonfield input.input {
            width: 100%
        }
        .buttonfield .button {
            position: absolute;
            top: 0;
            right: 0;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0
        }
        .buttonfield .button.light {
            border-top: none;
            border-right: none;
            border-bottom: none;
            top: 1px;
            right: 1px
        }
        .buttonfield.copyfield .button {
            display: none
        }
        html.flash .buttonfield.copyfield .button {
            display: inherit
        }
        .select.input,
        select.input {
            -webkit-appearance: none;
            -moz-appearance: none;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, .2);
            height: 30px;
            margin: 0;
            padding: 0;
            background: transparent none no-repeat;
            box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .05), inset 0 0 0 1px hsla(0, 0%, 100%, .3), inset 0 -60px 40px -40px rgba(0, 0, 0, .05);
            cursor: pointer;
            color: #333;
            font-family: inherit;
            font-size: 13px;
            line-height: 28px;
            display: inline-block;
            padding-left: 10px;
            padding-right: 40px;
            z-index: inherit
        }
        .select.input:focus,
        select.input:focus {
            z-index: 1;
            outline-width: 3px;
            outline-style: solid;
            outline-color: rgba(0, 169, 143, .3);
            outline-offset: 1px
        }
        .select.input.inline,
        select.input.inline {
            vertical-align: top;
            margin-right: 3px;
            padding-left: 7px
        }
        .select.input.large,
        select.input.large {
            font-size: 16px;
            height: 40px;
            line-height: 38px;
            padding-left: 10px
        }
        .select.input[multiple] {
            box-sizing: border-box;
            position: relative;
            z-index: 1000;
            counter-reset: selected;
            padding-right: 30px
        }
        .select.input[multiple]>span:after {
            height: 28px;
            line-height: 28px;
            min-width: 20px;
            border-left: 1px solid rgba(0, 0, 0, .1);
            text-align: center;
            display: inline-block;
            margin-left: 5px;
            content: counter(selected)
        }
        .select.input[multiple] * {
            line-height: 1
        }
        .select.input[multiple] .options {
            background-color: hsla(0, 0%, 100%, .85);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            top: 0;
            left: -10px;
            position: absolute;
            margin-left: -9999px;
            padding: 5px 0;
            z-index: 1;
            min-width: 120%
        }
        .select.input[multiple] .options input {
            display: block;
            position: absolute;
            margin-left: -9999px
        }
        .select.input[multiple] .options label {
            text-align: left;
            padding: 3px 20px;
            margin: 0
        }
        .select.input[multiple] .options input+label:hover {
            color: #fff;
            background-color: #2883f0;
            cursor: pointer
        }
        .select.input[multiple] .options input:checked+label {
            color: #fff;
            background-color: #555;
            counter-increment: selected
        }
        .select.input[multiple]:not([disabled]) .options:hover,
        .select.input[multiple]:not([disabled]):active .options {
            margin-left: 0
        }
        @media screen and (min-width: 0) {
            .select.input,
            select.input {
                border-radius: 3px;
                background-image: url(assets/fonts/Jq6MeXH8uU+Tfm6vdvse3u3eudL2hKx5S0yHdq7ORVBI5rHSPI0Ldy4MPCgoKCgoK+hN0E2AAlRpVSfyaTcsAAAAASUVORK5CYII=);
                background-position: 100%
            }
            .select.input.dark,
            select.input.dark {
                background-image: url(assets/fonts/PmQ6+rEAAACPSURBVHja7NZRCoAgDAbgLTpF5/CAO6Beo2tYQoX4IM5cBf2DIfrgh3OITERLjHGlB2OiFwIoUKBAgQIFCtQIZeYrQwiSz81P6r2XfDQvbwn1wNMdsBdmzb+3dnf7Ht/u3nlEeY8Qk5M650SzPqy8JaAFz0iNRC1ZK3XrHilV3YsHHyhQoECBAgX6E3QTYADlyW09Tlxg5gAAAABJRU5ErkJggg==)
            }
        }
        .select.input:-moz-focusring,
        select.input:-moz-focusring {
            color: transparent;
            text-shadow: 0 0 0 #000
        }
        @media (-ms-high-contrast: none),
        screen and (-ms-high-contrast: active) {
            .select.input::-ms-expand,
            select.input::-ms-expand {
                display: none
            }
        }
        @media only screen and (-webkit-min-device-pixel-ratio: 1.25),
        only screen and (-webkit-min-device-pixel-ratio: 120),
        only screen and (min-resolution: 120dppx) {
            .select.input,
            select.input {
                background-image: url(assets/fonts/NDQvPP60NAs3G/W0Kzc/9bQPPkcZdA8+Lx37k9Ovyv2yLhf+5JCQgKGvG8aTBqHpCWibryqMpIrWv1stR6dKkvDEdcnjlpl6JeCQgKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCrpG2wUYANg8IXKvJCa2AAAAAElFTkSuQmCC);
                background-size: 29px 50px
            }
            .select.input.dark,
            select.input.dark {
                background-image: url(assets/fonts/PgQ/SAUAAADkSURBVHja7NjbCYMwGAZQKZ2ia2TBf0Cdyb70SShWau4nEERNhEPUfMmyrutr3/dl9PpYJimgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKAFyzPHQ7dtO2sSn/q1pJS6H9E4HId8dePkfAhoXLzeJTT+vN8FNG5u1yQ0MrdvAhqF+1WBRuX+ZQJD6TlSBAQV6qt8o9HDiDb31zWPSkayrtXLVOvRqXYYjriieThLYPhhB6946Jd1QUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFB7y9vAQYARKnEOzhJepsAAAAASUVORK5CYII=)
            }
        }
        input.input[type=radio] {
            display: none
        }
        input.input[type=radio]+label {
            position: relative;
            padding-left: 1.8em;
            text-align: left;
            display: block;
            margin-bottom: .5em;
            font-size: 16px;
            cursor: pointer;
            z-index: inherit
        }
        input.input[type=radio]+label:focus {
            z-index: 1;
            outline-width: 3px;
            outline-style: solid;
            outline-color: rgba(0, 169, 143, .3);
            outline-offset: 1px
        }
        input.input.large[type=radio]+label {
            font-size: 18px
        }
        input.input[type=radio]+label:before {
            content: "";
            position: absolute;
            left: 0;
            top: .025em;
            width: 1em;
            height: 1em;
            border-radius: 50%;
            border: .125em solid rgba(0, 0, 0, .3);
            box-shadow: inset 0 0 0 .4em #fff;
            background-color: #fff;
            transition: all .15s ease-out
        }
        input.input[type=radio]:checked+label:before {
            border: .125em solid #29a387;
            background-color: #2eb897;
            box-shadow: inset 0 0 0 .225em #fff
        }
        .element.type-checkbox input[type=checkbox],
        input[type=checkbox].input {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            display: inline-block;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border-radius: 3px;
            border: 2px solid #999;
            text-align: center;
            vertical-align: middle;
            width: 20px;
            height: 20px;
            z-index: inherit;
            margin: 0;
            margin-right: 7px
        }
        .element.type-checkbox input[type=checkbox]:focus,
        input[type=checkbox].input:focus {
            z-index: 1;
            outline-width: 3px;
            outline-style: solid;
            outline-color: rgba(0, 169, 143, .3);
            outline-offset: 1px
        }
        .element.type-checkbox input[type=checkbox]:checked,
        input[type=checkbox].input:checked {
            background-color: #00a98f;
            border-color: #00a98f;
            position: relative
        }
        .element.type-checkbox input[type=checkbox]:checked:before,
        input[type=checkbox].input:checked:before {
            position: absolute;
            left: 0;
            top: 0;
            width: 16px;
            height: 16px;
            line-height: 16px;
            font-size: 16px;
            text-align: center;
            display: block;
            font-family: aboutme-glyphs;
            content: "\E86A";
            color: #fff
        }
        .element.type-checkbox label.label,
        input[type=checkbox].input+label {
            display: inline-block;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            cursor: pointer
        }
        [role=group] {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            margin-bottom: 15px
        }
        [role=group] [role=group-item] {
            width: calc(50% - 10px)
        }
        .button {
            display: inline-block;
            text-align: center;
            border-radius: 5px;
            font-size: 14px;
            line-height: 28px;
            padding: 0 15px;
            background-color: #fff;
            color: #444;
            cursor: pointer;
            box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .05), inset 0 0 0 100px rgba(0, 0, 0, .02);
            border: 1px solid rgba(0, 0, 0, .15);
            box-sizing: border-box;
            white-space: nowrap;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }
        .button:focus {
            outline-color: rgba(0, 169, 143, .4)
        }
        .no-touchevents .button:not([disabled]):hover {
            color: #444;
            box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .05)
        }
        .button:active:not([disabled]),
        .no-touchevents .button:active:not([disabled]) {
            transition: box-shadow .1s ease-out;
            box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .05), inset 0 0 0 1px hsla(0, 0%, 100%, .5), inset 0 40px 40px -40px rgba(0, 0, 0, .1)
        }
        button.button {
            font-family: inherit
        }
        button.button::-moz-focus-inner {
            border: 0;
            padding: 0
        }
        a.button {
            text-decoration: none!important
        }
        .button.xlarge {
            font-size: 18px;
            line-height: 48px;
            padding: 0 30px;
            font-weight: 100
        }
        .button.large {
            font-size: 16px;
            line-height: 38px;
            padding: 0 20px
        }
        .button.small {
            font-size: 12px;
            line-height: 24px;
            padding: 0 12px
        }
        .button.xsmall {
            font-size: 10px;
            line-height: 18px;
            padding: 0 9px
        }
        .button.light.white {
            background-color: #fff
        }
        .button.light.grey {
            background-color: #eee
        }
        .button.light.seafoam {
            background-color: #fff;
            border: 1px solid #66ccb4;
            color: #40bfa2
        }
        .button.dark {
            color: #fff;
            background-color: #777
        }
        .button.dark.transparent {
            background-color: rgba(0, 0, 0, .2)
        }
        .no-touchevents .button.dark:not([disabled]):hover {
            color: #fff
        }
        .button.dark.grey {
            background-color: #777
        }
        .button.dark.blue {
            background-color: #0077b3
        }
        .button.dark.red {
            background-color: #c00
        }
        .button.dark.orange {
            background-color: #fbb829
        }
        .button.dark.seafoam {
            background-color: #2eb897;
            border-color: rgba(0, 0, 0, .1)
        }
        .no-touchevents .button.dark.seafoam:not([disabled]):hover {
            border-color: transparent
        }
        .menu-content .button.light.white {
            background-color: #f8f8f8
        }
        .no-touchevents .menu-content .button.light.white:not([disabled]):hover {
            background-color: #fff
        }
        .menu-content .button.light.grey {
            background-color: #e7e7e7
        }
        .no-touchevents .menu-content .button.light.grey:not([disabled]):hover {
            background-color: #eee
        }
        .button.dark.outlined,
        .button.light.outlined,
        .button.outlined {
            background-color: transparent;
            box-shadow: none;
            transition: border-color .1s ease-out, background-color .1s ease-out
        }
        .button.light.outlined {
            color: #fff;
            border-color: hsla(0, 0%, 100%, .7)
        }
        .no-touchevents .button.light.outlined:not([disabled]):hover {
            box-shadow: none;
            border-color: #fff;
            background-color: hsla(0, 0%, 100%, .1)
        }
        .button.dark.outlined {
            color: #555;
            border-color: #888
        }
        .no-touchevents .button.dark.outlined:not([disabled]):hover {
            color: #333;
            border-color: #999;
            box-shadow: none;
            background-color: rgba(30, 30, 30, .1)
        }
        .button.transparent {
            border-color: transparent;
            box-shadow: none;
            color: #999
        }
        .no-touchevents .button.transparent:hover {
            background-color: #eee;
            color: #666
        }
        .button.dark.branded.facebook {
            background-color: #3b5998
        }
        .button.dark.branded.google {
            background-color: #4285f4
        }
        .button.dark.branded.gplus {
            background-color: #c63d2d
        }
        .button.dark.branded.twitter {
            background-color: #2ca9e1
        }
        .button.dark.branded.linkedin {
            background-color: #4875b4
        }
        .button.dark.branded.instagram {
            background-color: #517fa4
        }
        .button.dark.branded.tumblr {
            background-color: #456f99
        }
        .button.dark.branded.pinterest {
            background-color: #bd081c
        }
        .button.dark {
            box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .05), inset 0 0 0 100px rgba(0, 0, 0, .1);
            border: 1px solid rgba(0, 0, 0, .1)
        }
        .no-touchevents .button.dark:not([disabled]):hover {
            box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .05)
        }
        .button.dark:active:not([disabled]),
        .no-touchevents .button.dark:active:not([disabled]) {
            box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .05), inset 0 0 0 100px rgba(0, 0, 0, .3)
        }
        .button[disabled] {
            opacity: .4;
            transition: box-shadow 0ms;
            box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .1);
            cursor: default
        }
        .button.dark[disabled] {
            opacity: .2
        }
        .button.light.seafoam[disabled] {
            opacity: .5;
            border: 1px solid rgba(102, 204, 180, .7)
        }
        .button.dark.seafoam[disabled] {
            opacity: .4
        }
        .button .hover-text {
            display: none
        }
        .button.button-hover.button-hovered .hover-text,
        .no-touchevents .button.button-hover:hover .hover-text {
            display: inline
        }
        .button.button-hover.button-hovered .default-text,
        .no-touchevents .button.button-hover:hover .default-text {
            display: none
        }
        .buttons {
            line-height: 30px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start
        }
        .buttons.large {
            line-height: 40px
        }
        .buttons.small {
            line-height: 25px
        }
        .buttons .button {
            margin-right: 15px;
            margin-bottom: 10px
        }
        .buttons .button.small {
            margin-right: 8px
        }
        .buttons .button:last-child {
            margin-right: 0
        }
        .buttons.last .button,
        .buttons:last-child .button {
            margin-bottom: 0
        }
        .buttons.center {
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center
        }
        .buttons.center .button {
            margin: 0 8px 10px
        }
        .buttonbar {
            zoom: 1;
            clear: left
        }
        .buttonbar:after {
            display: block;
            visibility: hidden;
            height: 0;
            clear: both;
            content: "."
        }
        .buttonbar>.button {
            float: left;
            margin-right: -1px;
            position: relative;
            border-radius: 0;
            white-space: nowrap
        }
        .no-touchevents .buttonbar>.button:hover {
            z-index: 1
        }
        .buttonbar>.button.active,
        .no-touchevents .buttonbar>.button.active:hover {
            background-color: #d5e6ef;
            z-index: 2;
            border-color: #a5b6c0;
            border-color: rgba(0, 0, 0, .15);
            box-shadow: none;
            cursor: default
        }
        .buttonbar>.button.first,
        .buttonbar>.button:first-child {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px
        }
        .buttonbar .button.last,
        .buttonbar>.button:last-child {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            margin-right: 0
        }
        .buttonbar .buttonbar {
            clear: none;
            float: left
        }
        .buttonbar .buttonbar .button.last,
        .buttonbar .buttonbar>.button.first,
        .buttonbar .buttonbar>.button:first-child,
        .buttonbar .buttonbar>.button:last-child {
            border-radius: 0
        }
        .button .loading-text,
        .button.loading .default-text {
            display: none
        }
        .button.loading .loading-text {
            display: inline-block;
            position: relative;
            padding-left: calc(1em + 5px)
        }
        .button.loading .loading-text:before {
            content: "";
            display: block;
            position: absolute;
            left: -.4em;
            top: 50%;
            margin-top: -.65em;
            width: 1.2em;
            height: 1.2em;
            -webkit-animation: fullrotation 1s infinite linear;
            animation: fullrotation 1s infinite linear;
            border-left: .2em solid rgba(0, 0, 0, .3);
            border-right: .2em solid rgba(0, 0, 0, .6);
            border-bottom: .2em solid rgba(0, 0, 0, .6);
            border-top: .2em solid rgba(0, 0, 0, .6);
            box-sizing: border-box;
            border-radius: 50%;
            margin-right: 1em
        }
        .button.light.seafoam.loading .loading-text:before {
            border-left: .2em solid rgba(102, 204, 180, .3);
            border-right: .2em solid rgba(102, 204, 180, .6);
            border-bottom: .2em solid rgba(102, 204, 180, .6);
            border-top: .2em solid rgba(102, 204, 180, .6)
        }
        @-webkit-keyframes fullrotation {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }
            to {
                -webkit-transform: rotate(1turn);
                transform: rotate(1turn)
            }
        }
        @keyframes fullrotation {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }
            to {
                -webkit-transform: rotate(1turn);
                transform: rotate(1turn)
            }
        }
        .button.dark.loading .loading-text:before {
            border-left: .2em solid hsla(0, 0%, 100%, .3);
            border-right: .2em solid hsla(0, 0%, 100%, .8);
            border-bottom: .2em solid hsla(0, 0%, 100%, .8);
            border-top: .2em solid hsla(0, 0%, 100%, .8)
        }
        .page-container {
            width: 100%;
            height: 100%;
            overflow: visible
        }
        .page-content {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column
        }
        .page-content.has-footer {
            min-height: 100vh
        }
        main {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            -ms-flex-negative: 0;
            flex-shrink: 0
        }
        footer {
            -webkit-box-flex: 0;
            -ms-flex-positive: 0;
            flex-grow: 0;
            -ms-flex-negative: 1;
            flex-shrink: 1
        }
        .structure {
            max-width: 1260px;
            margin-left: auto;
            margin-right: auto;
            box-sizing: border-box;
            padding-left: 5vw;
            padding-right: 5vw
        }
        body {
            background-color: #333
        }
        .nav-frame {
            top: 0;
            left: 0;
            width: 100%;
            position: absolute;
            overflow: hidden;
            z-index: 10;
            height: 50px;
            border: none;
            outline: none;
            background: none
        }
        .profile-scope-1zgKV main {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            -webkit-box-align: stretch;
            -ms-flex-align: stretch;
            align-items: stretch
        }
        .profile-scope-1zgKV .profile-column {
            width: 100%;
            position: relative;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            -ms-flex-negative: 1;
            flex-shrink: 1
        }
        .panel-right .profile-scope-1zgKV .profile-column {
            overflow-y: auto;
            height: 100vh
        }
        .profile-scope-1zgKV .hide-scrollbar {
            -ms-overflow-style: none
        }
        .profile-scope-1zgKV .hide-scrollbar::-webkit-scrollbar {
            display: none
        }
        @media only screen and (max-width: 720px) {
            .profile-scope-1zgKV main {
                position: relative;
                overflow-x: hidden
            }
        }
        .unsupported {
            width: 100%;
            position: fixed;
            top: 50px;
            left: 0;
            background-color: rgba(40, 40, 40, .7);
            color: #fff;
            font-size: 16px;
            line-height: 1.5;
            text-align: center;
            box-sizing: border-box;
            padding: 10px 10%;
            z-index: 1000
        }
        .unsupported.iframe {
            background-color: rgba(40, 40, 40, .9);
            top: 0;
            padding-top: 20%;
            height: 100%
        }
        nav.topnav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 311;
            -webkit-transform: translateZ(0);
            box-sizing: border-box;
            height: 50px;
            line-height: 50px;
            background-color: transparent;
            transition: background-color .5s ease-out;
            padding: 0 15px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between
        }
        nav.topnav.scrolled {
            background-color: hsla(0, 0%, 100%, .95);
            color: #888
        }
        nav.topnav .signup-button {
            transition: opacity .1s ease-out
        }
        nav.topnav .logo-container {
            height: 50px
        }
        nav.topnav .logo,
        nav.topnav .logo-container {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center
        }
        nav.topnav .logo {
            border-radius: 5px;
            box-sizing: border-box;
            padding: 0 7px;
            width: 90px;
            height: 28px
        }
        nav.topnav .logo svg {
            width: 100%;
            height: auto
        }
        nav.topnav.scrolled .logo svg path,
        nav.topnav.seafoam .logo svg path {
            fill: #2eb897
        }
        nav.topnav>ul {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap
        }
        nav.topnav>ul>li+li {
            margin-left: 15px
        }
        nav.topnav>ul.applinks {
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start
        }
        nav.topnav>ul.userlinks {
            -webkit-box-align: end;
            -ms-flex-align: end;
            align-items: flex-end
        }
        nav.topnav .button {
            border-color: hsla(0, 0%, 100%, .5);
            color: #fff;
            margin: 0
        }
        .no-touchevents nav.topnav .button:hover {
            color: #fff;
            background-color: hsla(0, 0%, 100%, .1)
        }
        .no-touchevents .panel-right-edit nav.topnav .button:hover {
            color: #fff
        }
        nav.topnav .button.viewer-button {
            transition: color .2s ease-out, border-color .2s ease-out, background-color .15s ease-out
        }
        nav.topnav.scrolled .button,
        nav.topnav.seafoam .button {
            border-color: rgba(0, 0, 0, .3);
            color: #666
        }
        nav.topnav.scrolled .button:hover,
        nav.topnav.seafoam .button:hover {
            color: #666;
            background-color: rgba(0, 0, 0, .05)
        }
        nav.topnav .upgrade-button {
            transition: opacity .3s ease-out;
            opacity: 1
        }
        .panel-right-edit nav.topnav .upgrade-button {
            opacity: 0
        }
        .color-light nav.topnav:not(.template-large):not(.scrolled) .logo svg path {
            fill: #333
        }
        body:not(.panel-right-edit) .color-light nav.topnav:not(.template-large):not(.scrolled) .button {
            color: #333;
            border-color: #333
        }
        .no-touchevents body:not(.panel-right-edit) .color-light nav.topnav:not(.template-large):not(.scrolled) .button:hover {
            background-color: rgba(0, 0, 0, .05)
        }
        @media only screen and (max-width: 640px) {
            nav.topnav {
                padding: 0 10px
            }
            nav.topnav>ul>li+li {
                margin-left: 10px
            }
            nav.topnav .is-mobile {
                display: inherit
            }
            nav.topnav .not-mobile {
                display: none
            }
        }
        @media only screen and (min-width: 641px) {
            nav.topnav .is-mobile {
                display: none
            }
            nav.topnav .not-mobile {
                display: inherit
            }
        }
        @media only screen and (max-width: 800px) {
            body:not(.panel-right-edit) nav.topnav.template-large:not(.scrolled) .logo {
                background-color: rgba(0, 0, 0, .2)
            }
        }
        @media only screen and (min-width: 801px) {
            nav.topnav.template-large:not(.scrolled) .logo {
                background-color: rgba(0, 0, 0, .2)
            }
            .no-touchevents nav.topnav.template-large:not(.scrolled) a.logo:hover {
                background-color: rgba(0, 0, 0, .5)
            }
        }
        @media only screen and (max-width: 800px) {
            body:not(.panel-right-edit) nav.topnav.template-large:not(.scrolled) .button {
                background-color: rgba(0, 0, 0, .2)
            }
            .no-touchevents body:not(.panel-right-edit) nav.topnav.template-large:not(.scrolled) .button:hover {
                background-color: rgba(0, 0, 0, .5)
            }
        }
        @media only screen and (min-width: 801px) {
            body:not(.panel-right-edit) nav.topnav.template-large .button {
                border-color: rgba(0, 0, 0, .3);
                color: #666
            }
            .no-touchevents body:not(.panel-right-edit) nav.topnav.template-large .button:hover {
                color: #666;
                background-color: rgba(0, 0, 0, .05)
            }
        }
        .profile.profile_view-scope-1Shwh {
            line-height: 1.4;
            padding: 10px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            box-sizing: border-box;
            min-width: 320px;
            position: relative;
            padding-top: 50px;
            padding-bottom: 50px
        }
        .has-spooky:not(.is-mapped) .profile.profile_view-scope-1Shwh:not(.nested) {
            padding-top: 95px;
            padding-bottom: 95px
        }
        .profile.profile_view-scope-1Shwh.nested {
            overflow: hidden
        }
        .profile.profile_view-scope-1Shwh.preview {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            pointer-events: none
        }
        .profile.profile_view-scope-1Shwh:not(.nested) {
            min-height: 100vh
        }
        .profile.profile_view-scope-1Shwh .profile-content {
            box-sizing: border-box;
            color: #333;
            z-index: 1
        }
        .profile.profile_view-scope-1Shwh .profile-content .head {
            box-sizing: border-box
        }
        .profile.profile_view-scope-1Shwh .profile-content .body {
            box-sizing: border-box;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            padding: 20px
        }
        .profile.profile_view-scope-1Shwh .profile-content section+section:not(:empty) {
            margin-top: 20px
        }
        .profile.profile_view-scope-1Shwh .profile-content .name-headline section+section:not(:empty) {
            margin-top: 5px
        }
        .profile.profile_view-scope-1Shwh .profile-content .image {
            background-color: #eee
        }
        .profile.profile_view-scope-1Shwh .profile-content .name {
            font-size: 20px;
            line-height: 1.2;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 700;
            margin: 0;
            color: #333
        }
        .profile.profile_view-scope-1Shwh .profile-content .headline {
            font-size: 16px;
            line-height: 1.2;
            font-weight: 700;
            margin: 0
        }
        .profile.profile_view-scope-1Shwh .profile-content .headline .role {
            display: inline-block;
            text-transform: capitalize
        }
        .profile.profile_view-scope-1Shwh .profile-content .portfolio {
            max-width: 400px;
            width: 100%;
            margin: 0 auto
        }
        .profile.profile_view-scope-1Shwh .profile-content .portfolio ul {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center
        }
        .profile.profile_view-scope-1Shwh .profile-content .portfolio ul .portfolio-item {
            display: block;
            opacity: .9;
            background-size: cover;
            background-position: 50%;
            background-repeat: no-repeat;
            width: 17.6%;
            max-width: 72px
        }
        .profile.profile_view-scope-1Shwh .profile-content .portfolio ul .portfolio-item+.portfolio-item {
            margin-left: 3%
        }
        .profile.profile_view-scope-1Shwh .profile-content .portfolio ul .portfolio-item:before {
            display: block;
            content: "";
            padding-bottom: 100%
        }
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content .portfolio ul .portfolio-item:hover {
            cursor: pointer;
            opacity: 1
        }
        .profile.profile_view-scope-1Shwh .profile-content .portfolio ul.list-3 .portfolio-item {
            width: 31.3333%;
            max-width: inherit
        }
        .profile.profile_view-scope-1Shwh .profile-content .portfolio ul.list-4 .portfolio-item {
            width: 22.75%;
            max-width: inherit
        }
        .profile.profile_view-scope-1Shwh .profile-content .video {
            max-width: 400px;
            width: 100%;
            margin: 0 auto
        }
        .profile.profile_view-scope-1Shwh .profile-content .video .video-wrapper:not(.facebook) {
            position: relative;
            height: 0;
            padding-bottom: 56.25%;
            overflow: hidden;
            background-color: #f8f8f8
        }
        .profile.profile_view-scope-1Shwh .profile-content .video .video-wrapper:not(.facebook) iframe {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0
        }
        .profile.profile_view-scope-1Shwh .profile-content .video .video-wrapper.facebook {
            background-color: #f8f8f8;
            min-height: 225px;
            overflow: hidden
        }
        @media only screen and (max-width: 430px) {
            .profile.profile_view-scope-1Shwh .profile-content .video .video-wrapper.facebook {
                background-color: transparent;
                min-height: 146px
            }
        }
        .profile.profile_view-scope-1Shwh .profile-content .spotlight {
            max-width: 400px;
            width: 100%;
            margin: 0 auto
        }
        .profile.profile_view-scope-1Shwh .profile-content .spotlight .button {
            min-width: 100%
        }
        .profile.profile_view-scope-1Shwh .profile-content .spotlight .button.large {
            font-size: 15px
        }
        .profile.profile_view-scope-1Shwh .profile-content .spotlight .button.dark,
        .profile.profile_view-scope-1Shwh .profile-content .spotlight .button.light {
            transition: all .15s ease-out;
            box-shadow: inset 0 0 0 100px hsla(0, 0%, 100%, 0)
        }
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content .spotlight .button.dark:hover,
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content .spotlight .button.light:hover {
            box-shadow: inset 0 0 0 100px hsla(0, 0%, 100%, .2)
        }
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content .spotlight .button.light:hover {
            border-color: rgba(0, 0, 0, .23)
        }
        .profile.profile_view-scope-1Shwh .profile-content .bio {
            font-size: 16px;
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
            text-align: left;
            word-wrap: break-word
        }
        .profile.profile_view-scope-1Shwh .profile-content .bio.short-bio {
            text-align: center
        }
        .profile.profile_view-scope-1Shwh .profile-content .bio a {
            color: #333;
            position: relative;
            text-decoration: underline
        }
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content .bio a:hover {
            color: #888
        }
        @media only screen and (max-width: 430px) {
            .profile.profile_view-scope-1Shwh .profile-content .bio {
                max-width: 100%
            }
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.inline {
            padding: 0;
            margin: 0;
            list-style: none;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li.interest {
            padding: 0;
            margin: 5px;
            color: #777
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li.contact-me,
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li a.social-link {
            padding: 0;
            margin: 10px;
            width: 36px;
            height: 36px;
            font-size: 30px;
            line-height: 36px;
            cursor: pointer;
            display: block;
            -webkit-font-smoothing: antialiased;
            color: rgba(54, 71, 78, .7)
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li.contact-me svg,
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li a.social-link svg {
            fill: rgba(54, 71, 78, .7);
            height: 100%;
            width: 100%
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li.contact-me.contact-me,
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li a.social-link.contact-me {
            color: rgba(54, 71, 78, .7);
            border: 2px solid #727e83;
            border-radius: 18px;
            font-size: 20px;
            box-sizing: border-box;
            text-align: center
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li.contact-me.contact-me svg,
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li a.social-link.contact-me svg {
            width: 20px;
            height: auto
        }
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content ul.inline li.contact-me:hover,
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content ul.inline li a.social-link:hover {
            color: #36474e;
            border-color: #36474e
        }
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content ul.inline li.contact-me:hover svg,
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content ul.inline li a.social-link:hover svg {
            fill: #36474e
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.meta-sections {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            max-width: 400px;
            margin: 0 auto;
            font-size: 14px
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.meta-sections .meta-section:nth-last-child(n+2),
        .profile.profile_view-scope-1Shwh .profile-content ul.meta-sections .meta-section:nth-last-child(n+2)~.meta-section {
            width: 50%;
            box-sizing: border-box;
            padding: 0 5px
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.meta-sections .meta-header {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase
        }
        .profile.profile_view-scope-1Shwh.small.nested {
            padding-top: 25px;
            padding-bottom: 25px
        }
        .profile.profile_view-scope-1Shwh.small .profile-content {
            width: 620px;
            max-width: calc(100vw - 10px);
            text-align: center;
            background-color: #fff;
            border-radius: 4px;
            margin-top: 60px
        }
        .profile.profile_view-scope-1Shwh.small .head .image {
            box-shadow: inset 0 0 10px 0 rgba(0, 0, 0, .2), 0 0 2px 0 rgba(0, 0, 0, .1);
            border-radius: 50%;
            margin: 0 auto;
            margin-top: -60px;
            margin-bottom: 20px;
            width: 120px;
            height: 120px
        }
        .profile.profile_view-scope-1Shwh.small .name-headline {
            padding-left: 20px;
            padding-right: 20px
        }
        .profile.profile_view-scope-1Shwh.medium.nested {
            padding-top: 10px;
            padding-bottom: 10px
        }
        .profile.profile_view-scope-1Shwh.medium .profile-content {
            width: 620px;
            max-width: calc(100vw - 10px);
            text-align: center
        }
        .profile.profile_view-scope-1Shwh.medium .head {
            overflow: hidden;
            position: relative;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px
        }
        .profile.profile_view-scope-1Shwh.medium .head .image {
            background-color: hsla(0, 0%, 100%, .1);
            box-shadow: inset 0 -130px 200px -50px rgba(0, 0, 0, .5)
        }
        .profile.profile_view-scope-1Shwh.medium .head .name-headline {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            position: absolute;
            box-sizing: border-box;
            padding: 20px;
            bottom: 0;
            left: 0;
            width: 100%;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, .7)
        }
        .profile.profile_view-scope-1Shwh.medium .head .name-headline .headline,
        .profile.profile_view-scope-1Shwh.medium .head .name-headline .name {
            color: #fff
        }
        .profile.profile_view-scope-1Shwh.medium .body {
            background-color: #fff;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px
        }
        .profile.profile_view-scope-1Shwh.large {
            padding: 0;
            background-color: #fff
        }
        .has-spooky:not(.is-mapped) .profile.profile_view-scope-1Shwh.large:not(.nested) {
            padding-top: 70px;
            padding-bottom: 70px
        }
        @media (max-width: 800px) {
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) {
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-box-pack: start;
                -ms-flex-pack: start;
                justify-content: flex-start
            }
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) .profile-content {
                width: 100%;
                text-align: center
            }
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) .head {
                position: relative;
                max-height: 80vh;
                overflow: hidden
            }
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) .head .image {
                box-shadow: inset 0 -130px 200px -50px rgba(0, 0, 0, .5);
                box-sizing: border-box
            }
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) .head .name-headline {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-box-pack: end;
                -ms-flex-pack: end;
                justify-content: flex-end;
                position: absolute;
                box-sizing: border-box;
                padding: 20px;
                bottom: 0;
                left: 0;
                width: 100%;
                text-shadow: 1px 1px 1px rgba(0, 0, 0, .7)
            }
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) .head .name-headline .headline,
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) .head .name-headline .name {
                color: #fff
            }
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) .body {
                padding-top: 0;
                padding-bottom: 50px
            }
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) .body .name-headline {
                display: none
            }
        }
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start
        }
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] .profile-content {
            width: 100%;
            text-align: center
        }
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] .head {
            position: relative;
            max-height: 80vh;
            overflow: hidden
        }
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] .head .image {
            box-shadow: inset 0 -130px 200px -50px rgba(0, 0, 0, .5);
            box-sizing: border-box
        }
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] .head .name-headline {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            position: absolute;
            box-sizing: border-box;
            padding: 20px;
            bottom: 0;
            left: 0;
            width: 100%;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, .7)
        }
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] .head .name-headline .headline,
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] .head .name-headline .name {
            color: #fff
        }
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] .body {
            padding-top: 0;
            padding-bottom: 50px
        }
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] .body .name-headline {
            display: none
        }
        @media (min-width: 801px) {
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]),
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-direction: row;
                flex-direction: row;
                -webkit-box-align: stretch;
                -ms-flex-align: stretch;
                align-items: stretch
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content {
                width: 100%;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: nowrap;
                flex-wrap: nowrap
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .head {
                width: 66.6667%;
                -webkit-box-flex: 1;
                -ms-flex-positive: 1;
                flex-grow: 1;
                -ms-flex-negative: 1;
                flex-shrink: 1
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .head .image {
                background-color: #eee;
                position: fixed;
                width: inherit;
                min-height: 100%;
                padding-bottom: 0!important
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .head .name-headline {
                display: none
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .body {
                width: 33.3333%;
                box-sizing: border-box;
                -webkit-box-flex: 1;
                -ms-flex-positive: 1;
                flex-grow: 1;
                -ms-flex-negative: 1;
                flex-shrink: 1;
                text-align: left;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                padding: 100px 60px
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .headline .location,
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .headline .roles {
                white-space: normal
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .portfolio {
                margin-left: 0;
                margin-right: 0
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .portfolio ul {
                -webkit-box-pack: start;
                -ms-flex-pack: start;
                justify-content: flex-start
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .portfolio ul .portfolio-item {
                margin-left: 0;
                margin-right: 3%
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .portfolio ul .portfolio-item:last-child {
                margin-right: 0
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .bio,
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .spotlight,
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .video {
                margin-left: 0;
                margin-right: 0
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .bio.short-bio {
                text-align: left
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content ul.inline {
                -webkit-box-pack: start;
                -ms-flex-pack: start;
                justify-content: flex-start
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content ul.inline li.interest {
                margin-left: 0;
                margin-right: 10px
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content ul.inline li.contact-me,
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content ul.inline li a.social-link {
                margin-left: 0;
                margin-right: 20px
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content ul.meta-sections {
                -webkit-box-pack: start;
                -ms-flex-pack: start;
                justify-content: flex-start;
                max-width: inherit;
                margin: 0
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content ul.meta-sections .meta-section:nth-last-child(n+2),
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content ul.meta-sections .meta-section:nth-last-child(n+2)~.meta-section {
                padding: 0;
                width: 50%
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content ul.meta-sections .meta-section:nth-last-child(n+2)~.meta-section {
                margin-left: 40px
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]).nested .profile-content .head .image {
                min-height: 0;
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0
            }
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"],
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-box-align: stretch;
            -ms-flex-align: stretch;
            align-items: stretch
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content {
            width: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .head {
            width: 66.6667%;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            -ms-flex-negative: 1;
            flex-shrink: 1
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .head .image {
            background-color: #eee;
            position: fixed;
            width: inherit;
            min-height: 100%;
            padding-bottom: 0!important
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .head .name-headline {
            display: none
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .body {
            width: 33.3333%;
            box-sizing: border-box;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            -ms-flex-negative: 1;
            flex-shrink: 1;
            text-align: left;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            padding: 100px 60px
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .headline .location,
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .headline .roles {
            white-space: normal
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .portfolio {
            margin-left: 0;
            margin-right: 0
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .portfolio ul {
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .portfolio ul .portfolio-item {
            margin-left: 0;
            margin-right: 3%
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .portfolio ul .portfolio-item:last-child {
            margin-right: 0
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .bio,
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .spotlight,
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .video {
            margin-left: 0;
            margin-right: 0
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .bio.short-bio {
            text-align: left
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content ul.inline {
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content ul.inline li.interest {
            margin-left: 0;
            margin-right: 10px
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content ul.inline li.contact-me,
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content ul.inline li a.social-link {
            margin-left: 0;
            margin-right: 20px
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content ul.meta-sections {
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            max-width: inherit;
            margin: 0
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content ul.meta-sections .meta-section:nth-last-child(n+2),
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content ul.meta-sections .meta-section:nth-last-child(n+2)~.meta-section {
            padding: 0;
            width: 50%
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content ul.meta-sections .meta-section:nth-last-child(n+2)~.meta-section {
            margin-left: 40px
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"].nested .profile-content .head .image {
            min-height: 0;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0
        }
        .viewer_panel-scope-258yz {
            transition: width .25s ease-in-out;
            width: 0;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            z-index: 1;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            -webkit-box-pack: stretch;
            -ms-flex-pack: stretch;
            justify-content: stretch;
            box-sizing: border-box;
            padding-top: 50px
        }
        .panel-right .viewer_panel-scope-258yz {
            width: 400px;
            box-shadow: -1px 0 0 0 rgba(0, 0, 0, .05)
        }
        @media only screen and (max-width: 720px) {
            .viewer_panel-scope-258yz {
                width: 100vw;
                height: 100vh;
                position: absolute;
                left: 100%;
                top: 0;
                z-index: 100;
                transition: left .25s ease-in-out
            }
            .panel-right .viewer_panel-scope-258yz {
                left: 0;
                width: 100vw
            }
        }
        .viewer_panel-scope-258yz .drilldown {
            width: 100%;
            min-width: 400px
        }
        @media only screen and (max-width: 720px) {
            .viewer_panel-scope-258yz .drilldown {
                min-width: 100vw
            }
        }
        @media only screen and (max-width: 640px) {
            .viewer_panel-scope-258yz .drilldown {
                min-width: 320px
            }
        }
        .has-spooky .viewer_panel-scope-258yz {
            padding-top: 70px
        }
        .viewer_panel-scope-258yz .browser-ios-safari {
            max-height: calc(100vh - 69px - 50px)
        }
        .has-spooky .viewer_panel-scope-258yz .browser-ios-safari {
            max-height: calc(100vh - 69px - 70px)
        }
        body:not(.has-spooky) .viewer_panel-scope-258yz {
            background-color: #333
        }
    </style>
    <style type="text/css" id="s1565-0">
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proximanova-regular-webfont.eot);
            src: url(assets/fonts/proximanova-regular-webfont.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proximanova-regular-webfont.woff2) format("woff2"), url(assets/fonts/proximanova-regular-webfont.woff) format("woff"), url(assets/fonts/proximanova-regular-webfont.ttf) format("truetype"), url(assets/fonts/proximanova-regular-webfont.svg#proxima_novaregular) format("svg");
            font-weight: 400;
            font-style: normal;
            unicode-range: u+000-5ff
        }
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proxima_nova_reg-latin-a.eot);
            src: url(assets/fonts/proxima_nova_reg-latin-a.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proxima_nova_reg-latin-a.woff2) format("woff2"), url(assets/fonts/proxima_nova_reg-latin-a.woff) format("woff"), url(assets/fonts/proxima_nova_reg-latin-a.ttf) format("truetype"), url(assets/fonts/proxima_nova_reg-latin-a.svg#proxima_novaregular) format("svg");
            font-weight: 400;
            font-style: normal;
            unicode-range: u+0100–017f
        }
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proxima_nova_reg-punc.eot);
            src: url(assets/fonts/proxima_nova_reg-punc.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proxima_nova_reg-punc.woff2) format("woff2"), url(assets/fonts/proxima_nova_reg-punc.woff) format("woff"), url(assets/fonts/proxima_nova_reg-punc.ttf) format("truetype"), url(assets/fonts/proxima_nova_reg-punc.svg#proxima_novaregular) format("svg");
            font-weight: 400;
            font-style: normal;
            unicode-range: u+2000–206f
        }
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proximanova-bold-webfont.eot);
            src: url(assets/fonts/proximanova-bold-webfont.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proximanova-bold-webfont.woff2) format("woff2"), url(assets/fonts/proximanova-bold-webfont.woff) format("woff"), url(assets/fonts/proximanova-bold-webfont.ttf) format("truetype"), url(assets/fonts/proximanova-bold-webfont.svg#proxima_novabold) format("svg");
            font-weight: 700;
            font-style: normal;
            unicode-range: u+000-5ff
        }
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proxima_nova_bold-latin-a.eot);
            src: url(assets/fonts/proxima_nova_bold-latin-a.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proxima_nova_bold-latin-a.woff2) format("woff2"), url(assets/fonts/proxima_nova_bold-latin-a.woff) format("woff"), url(assets/fonts/proxima_nova_bold-latin-a.ttf) format("truetype"), url(assets/fonts/proxima_nova_bold-latin-a.svg#proxima_novabold) format("svg");
            font-weight: 700;
            font-style: normal;
            unicode-range: u+0100–017f
        }
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proxima_nova_bold-punc.eot);
            src: url(assets/fonts/proxima_nova_bold-punc.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proxima_nova_bold-punc.woff2) format("woff2"), url(assets/fonts/proxima_nova_bold-punc.woff) format("woff"), url(assets/fonts/proxima_nova_bold-punc.ttf) format("truetype"), url(assets/fonts/proxima_nova_bold-punc.svg#proxima_novabold) format("svg");
            font-weight: 700;
            font-style: normal;
            unicode-range: u+2000–206f
        }
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proximanova-regularit-webfont.eot);
            src: url(assets/fonts/proximanova-regularit-webfont.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proximanova-regularit-webfont.woff2) format("woff2"), url(assets/fonts/proximanova-regularit-webfont.woff) format("woff"), url(assets/fonts/proximanova-regularit-webfont.ttf) format("truetype"), url(assets/fonts/proximanova-regularit-webfont.svg#proxima_novaitalic) format("svg");
            font-weight: 400;
            font-style: italic
        }
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proximanova-boldit-webfont.eot);
            src: url(assets/fonts/proximanova-boldit-webfont.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proximanova-boldit-webfont.woff2) format("woff2"), url(assets/fonts/proximanova-boldit-webfont.woff) format("woff"), url(assets/fonts/proximanova-boldit-webfont.ttf) format("truetype"), url(assets/fonts/proximanova-boldit-webfont.svg#proxima_novabold_italic) format("svg");
            font-weight: 700;
            font-style: italic
        }
        @font-face {
            font-family: Proxima Nova;
            src: url(assets/fonts/proximanova-light-webfont.eot);
            src: url(assets/fonts/proximanova-light-webfont.eot?#iefix) format("embedded-opentype"), url(assets/fonts/proximanova-light-webfont.woff2) format("woff2"), url(assets/fonts/proximanova-light-webfont.woff) format("woff"), url(assets/fonts/proximanova-light-webfont.ttf) format("truetype"), url(assets/fonts/proximanova-light-webfont.svg#proxima_novalight) format("svg");
            font-weight: 200;
            font-style: normal
        }
    </style>
    <style type="text/css" id="s1569-1">
        a,
        abbr,
        acronym,
        address,
        applet,
        big,
        blockquote,
        body,
        caption,
        cite,
        code,
        dd,
        del,
        dfn,
        div,
        dl,
        dt,
        em,
        fieldset,
        font,
        form,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        html,
        iframe,
        img,
        ins,
        kbd,
        label,
        legend,
        li,
        object,
        ol,
        p,
        pre,
        q,
        s,
        samp,
        small,
        span,
        strike,
        sub,
        sup,
        table,
        tbody,
        td,
        tfoot,
        th,
        thead,
        tr,
        tt,
        ul,
        var {
            margin: 0;
            padding: 0;
            border: 0;
            font-weight: inherit;
            font-style: inherit;
            font-size: 100%;
            font-family: inherit;
            vertical-align: baseline
        }
        body {
            line-height: 1;
            color: #000
        }
        ol,
        ul {
            list-style: none
        }
        table {
            border-collapse: separate;
            border-spacing: 0
        }
        caption,
        td,
        th {
            text-align: left;
            font-weight: 400
        }
        blockquote:after,
        blockquote:before,
        q:after,
        q:before {
            content: ""
        }
        blockquote,
        q {
            quotes: "" ""
        }
        em {
            font-style: italic
        }
        button {
            margin: 0;
            padding: 0;
            border: none;
            background-color: transparent;
            cursor: pointer;
            overflow: visible
        }
    </style>
    <style type="text/css" id="s1566-2">
        .row {
            clear: both;
            margin-right: -20px;
            zoom: 1
        }
        .row:after {
            display: block;
            visibility: hidden;
            height: 0;
            clear: both;
            content: "."
        }
        .row .column {
            float: left;
            padding-right: 20px;
            box-sizing: border-box
        }
        .row .column.gutter-left {
            padding-left: 20px
        }
        .row .column.row {
            padding-right: 0;
            margin-right: 0;
            clear: none
        }
        .columns-1>.column {
            width: 100%
        }
        .columns-2>.column {
            width: 50%
        }
        .columns-2>.column.colspan-2 {
            width: 100%
        }
        .columns-3>.column {
            width: 33.3333%
        }
        .columns-3>.column.colspan-2 {
            width: 66.6666%
        }
        .columns-3>.column.colspan-3 {
            width: 100%
        }
        .columns-4>.column {
            width: 25%
        }
        .columns-4>.column.colspan-2 {
            width: 50%
        }
        .columns-4>.column.colspan-3 {
            width: 75%
        }
        .columns-4>.column.colspan-4 {
            width: 100%
        }
        .columns-5>.column {
            width: 20%
        }
        .columns-5>.column.colspan-2 {
            width: 40%
        }
        .columns-5>.column.colspan-3 {
            width: 60%
        }
        .columns-5>.column.colspan-4 {
            width: 80%
        }
        .columns-5>.column.colspan-5 {
            width: 100%
        }
        .columns-6>.column {
            width: 16.6666%
        }
        .columns-6>.column.colspan-2 {
            width: 33.3333%
        }
        .columns-6>.column.colspan-3 {
            width: 50%
        }
        .columns-6>.column.colspan-4 {
            width: 66.6666%
        }
        .columns-6>.column.colspan-5 {
            width: 83.3333%
        }
        .columns-6>.column.colspan-6 {
            width: 100%
        }
        .columns-7>.column {
            width: 14.2857%
        }
        .columns-7>.column.colspan-2 {
            width: 28.5714%
        }
        .columns-7>.column.colspan-3 {
            width: 42.8571%
        }
        .columns-7>.column.colspan-4 {
            width: 57.1428%
        }
        .columns-7>.column.colspan-5 {
            width: 71.4285%
        }
        .columns-7>.column.colspan-6 {
            width: 85.7142%
        }
        .columns-7>.column.colspan-7 {
            width: 100%
        }
        .columns-8>.column {
            width: 12.5%
        }
        .columns-8>.column.colspan-2 {
            width: 25%
        }
        .columns-8>.column.colspan-3 {
            width: 37.5%
        }
        .columns-8>.column.colspan-4 {
            width: 50%
        }
        .columns-8>.column.colspan-5 {
            width: 62.5%
        }
        .columns-8>.column.colspan-6 {
            width: 75%
        }
        .columns-8>.column.colspan-7 {
            width: 87.5%
        }
        .columns-8>.column.colspan-8 {
            width: 100%
        }
        .columns-9>.column {
            width: 11.1111%
        }
        .columns-9>.column.colspan-2 {
            width: 22.2222%
        }
        .columns-9>.column.colspan-3 {
            width: 33.3333%
        }
        .columns-9>.column.colspan-4 {
            width: 44.4444%
        }
        .columns-9>.column.colspan-5 {
            width: 55.5555%
        }
        .columns-9>.column.colspan-6 {
            width: 66.6666%
        }
        .columns-9>.column.colspan-7 {
            width: 77.7777%
        }
        .columns-9>.column.colspan-8 {
            width: 88.8888%
        }
        .columns-9>.column.colspan-9 {
            width: 100%
        }
        .columns-10>.column {
            width: 10%
        }
        .columns-10>.column.colspan-2 {
            width: 20%
        }
        .columns-10>.column.colspan-3 {
            width: 30%
        }
        .columns-10>.column.colspan-4 {
            width: 40%
        }
        .columns-10>.column.colspan-5 {
            width: 50%
        }
        .columns-10>.column.colspan-6 {
            width: 60%
        }
        .columns-10>.column.colspan-7 {
            width: 70%
        }
        .columns-10>.column.colspan-8 {
            width: 80%
        }
        .columns-10>.column.colspan-9 {
            width: 90%
        }
        .columns-10>.column.colspan-10 {
            width: 100%
        }
        .columns-11>.column {
            width: 9.0909%
        }
        .columns-11>.column.colspan-2 {
            width: 18.1818%
        }
        .columns-11>.column.colspan-3 {
            width: 27.2727%
        }
        .columns-11>.column.colspan-4 {
            width: 36.3636%
        }
        .columns-11>.column.colspan-5 {
            width: 45.4545%
        }
        .columns-11>.column.colspan-6 {
            width: 54.5454%
        }
        .columns-11>.column.colspan-7 {
            width: 63.6363%
        }
        .columns-11>.column.colspan-8 {
            width: 72.7272%
        }
        .columns-11>.column.colspan-9 {
            width: 81.8181%
        }
        .columns-11>.column.colspan-10 {
            width: 90.909%
        }
        .columns-11>.column.colspan-11 {
            width: 100%
        }
        .columns-12>.column {
            width: 8.3333%
        }
        .columns-12>.column.colspan-2 {
            width: 16.6666%
        }
        .columns-12>.column.colspan-3 {
            width: 25%
        }
        .columns-12>.column.colspan-4 {
            width: 33.3333%
        }
        .columns-12>.column.colspan-5 {
            width: 41.6666%
        }
        .columns-12>.column.colspan-6 {
            width: 50%
        }
        .columns-12>.column.colspan-7 {
            width: 58.3333%
        }
        .columns-12>.column.colspan-8 {
            width: 66.6666%
        }
        .columns-12>.column.colspan-9 {
            width: 75%
        }
        .columns-12>.column.colspan-10 {
            width: 83.3333%
        }
        .columns-12>.column.colspan-11 {
            width: 91.6666%
        }
        .columns-12>.column.colspan-12 {
            width: 100%
        }
        .row.gutter-10 {
            margin-right: -10px
        }
        .row.gutter-10 .column {
            padding-right: 10px
        }
        .row.gutter-15 {
            margin-right: -15px
        }
        .row.gutter-15 .column {
            padding-right: 15px
        }
        @media only screen and (max-width: 640px) {
            .row {
                margin: 0
            }
            .column {
                width: 100%!important;
                box-sizing: border-box
            }
            .row .column {
                padding-right: 0
            }
        }
    </style>
    <style type="text/css" id="s1466-3">
        .glyph-addon:before {
            content: "\F196"
        }
        .glyph-address:before {
            content: "\E871"
        }
        .glyph-angle-down:before {
            content: "\E845"
        }
        .glyph-angle-left:before {
            content: "\E846"
        }
        .glyph-angle-right:before {
            content: "\E847"
        }
        .glyph-angle-thin-down:before {
            content: "\E893"
        }
        .glyph-angle-thin-left:before {
            content: "\E894"
        }
        .glyph-angle-thin-right:before {
            content: "\E895"
        }
        .glyph-angle-thin-up:before {
            content: "\E896"
        }
        .glyph-angle-up:before {
            content: "\E848"
        }
        .glyph-arrow-down:before {
            content: "\E84D"
        }
        .glyph-arrow-left:before {
            content: "\E84E"
        }
        .glyph-arrow-right:before {
            content: "\E84F"
        }
        .glyph-arrow-up:before {
            content: "\E850"
        }
        .glyph-article:before {
            content: "\E88F"
        }
        .glyph-attention:before {
            content: "\E863"
        }
        .glyph-award:before {
            content: "\E890"
        }
        .glyph-behance:before {
            content: "\E85F"
        }
        .glyph-behance-circle:before {
            content: "\E808"
        }
        .glyph-bio:before {
            content: "\E800"
        }
        .glyph-bitbucket:before {
            content: "\E860"
        }
        .glyph-block:before {
            content: "\E840"
        }
        .glyph-blogger:before {
            content: "\E89A"
        }
        .glyph-blogger-circle:before {
            content: "\E809"
        }
        .glyph-bold:before {
            content: "\E856"
        }
        .glyph-book:before {
            content: "\E872"
        }
        .glyph-brush:before {
            content: "\E88A"
        }
        .glyph-building:before {
            content: "\E85C"
        }
        .glyph-building-alt:before {
            content: "\E899"
        }
        .glyph-calendar:before {
            content: "\E83C"
        }
        .glyph-camera:before {
            content: "\E830"
        }
        .glyph-charity:before {
            content: "\E855"
        }
        .glyph-chart-bar:before {
            content: "\E8AE"
        }
        .glyph-chat:before {
            content: "\E8AC"
        }
        .glyph-check:before {
            content: "\E86A"
        }
        .glyph-check2:before {
            content: "\E8A7"
        }
        .glyph-chevron-down:before {
            content: "\E84C"
        }
        .glyph-chevron-left:before {
            content: "\E849"
        }
        .glyph-chevron-right:before {
            content: "\E84A"
        }
        .glyph-chevron-up:before {
            content: "\E84B"
        }
        .glyph-clock:before {
            content: "\E874"
        }
        .glyph-close:before {
            content: "\E8A6"
        }
        .glyph-coffee:before {
            content: "\E85A"
        }
        .glyph-cog:before {
            content: "\E888"
        }
        .glyph-commercial-building:before {
            content: "\E898"
        }
        .glyph-contact:before {
            content: "\E892"
        }
        .glyph-create-sig:before {
            content: "\E827"
        }
        .glyph-credit-card:before {
            content: "\E859"
        }
        .glyph-date:before {
            content: "\E829"
        }
        .glyph-design:before {
            content: "\E806"
        }
        .glyph-doc:before {
            content: "\E8A1"
        }
        .glyph-download:before {
            content: "\E835"
        }
        .glyph-download-cloud:before {
            content: "\E836"
        }
        .glyph-dribbble:before {
            content: "\E861"
        }
        .glyph-dribbble-circle:before {
            content: "\E80A"
        }
        .glyph-edit:before {
            content: "\E838"
        }
        .glyph-education:before {
            content: "\E87A"
        }
        .glyph-ellipsis:before {
            content: "\E879"
        }
        .glyph-email:before {
            content: "\E88C"
        }
        .glyph-embed:before {
            content: "\E837"
        }
        .glyph-etsy:before {
            content: "\E804"
        }
        .glyph-etsy-circle:before {
            content: "\E80B"
        }
        .glyph-exchange:before {
            content: "\E889"
        }
        .glyph-eye:before {
            content: "\E887"
        }
        .glyph-eyedropper:before {
            content: "\E88B"
        }
        .glyph-facebook:before {
            content: "\E87E"
        }
        .glyph-facebook-circle:before {
            content: "\E80C"
        }
        .glyph-facebook-squared:before {
            content: "\E87F"
        }
        .glyph-fitbit-circle:before {
            content: "\E80D"
        }
        .glyph-flag:before {
            content: "\E86D"
        }
        .glyph-flickr:before {
            content: "\E87B"
        }
        .glyph-flickr-circle:before {
            content: "\E80E"
        }
        .glyph-food:before {
            content: "\E8A3"
        }
        .glyph-forward:before {
            content: "\E870"
        }
        .glyph-foursquare-circle:before {
            content: "\E80F"
        }
        .glyph-github:before {
            content: "\E862"
        }
        .glyph-github-circle:before {
            content: "\E810"
        }
        .glyph-glass:before {
            content: "\E82B"
        }
        .glyph-globe:before {
            content: "\E8A2"
        }
        .glyph-gmail:before {
            content: "\E89B"
        }
        .glyph-goodreads-circle:before {
            content: "\E825"
        }
        .glyph-google:before {
            content: "\E8AB"
        }
        .glyph-gplus:before {
            content: "\E8AA"
        }
        .glyph-gplus-circle:before {
            content: "\E811"
        }
        .glyph-group:before {
            content: "\E89F"
        }
        .glyph-heart:before {
            content: "\E82C"
        }
        .glyph-hireme:before {
            content: "\E85E"
        }
        .glyph-home:before {
            content: "\E86B"
        }
        .glyph-instagram:before {
            content: "\E883"
        }
        .glyph-instagram-circle:before {
            content: "\E812"
        }
        .glyph-italic:before {
            content: "\E857"
        }
        .glyph-kickstarter:before {
            content: "\E805"
        }
        .glyph-kickstarter-circle:before {
            content: "\E813"
        }
        .glyph-lightbulb:before {
            content: "\E83F"
        }
        .glyph-lightning:before {
            content: "\E897"
        }
        .glyph-link:before {
            content: "\E86C"
        }
        .glyph-linkedin:before {
            content: "\E882"
        }
        .glyph-linkedin-circle:before {
            content: "\E814"
        }
        .glyph-list:before {
            content: "\E877"
        }
        .glyph-location:before {
            content: "\E839"
        }
        .glyph-lock:before {
            content: "\E832"
        }
        .glyph-login:before {
            content: "\E83D"
        }
        .glyph-medium:before {
            content: "\E826"
        }
        .glyph-megaphone:before {
            content: "\E880"
        }
        .glyph-menu:before {
            content: "\E83B"
        }
        .glyph-minus:before {
            content: "\E886"
        }
        .glyph-mobile:before {
            content: "\E878"
        }
        .glyph-music:before {
            content: "\E865"
        }
        .glyph-pencil:before {
            content: "\E891"
        }
        .glyph-person:before {
            content: "\E867"
        }
        .glyph-phone:before {
            content: "\E83A"
        }
        .glyph-photo:before {
            content: "\E82F"
        }
        .glyph-picture:before {
            content: "\E869"
        }
        .glyph-pinterest:before {
            content: "\E881"
        }
        .glyph-pinterest-circle:before {
            content: "\E815"
        }
        .glyph-place:before {
            content: "\E88D"
        }
        .glyph-play:before {
            content: "\E8AF"
        }
        .glyph-plus:before {
            content: "\E885"
        }
        .glyph-podcast:before {
            content: "\E8AD"
        }
        .glyph-portfolio:before {
            content: "\E858"
        }
        .glyph-power:before {
            content: "\E884"
        }
        .glyph-promoted:before {
            content: "\E803"
        }
        .glyph-puzzle:before {
            content: "\E8A8"
        }
        .glyph-px500:before {
            content: "\E802"
        }
        .glyph-px500-circle:before {
            content: "\E807"
        }
        .glyph-quora-circle:before {
            content: "\E816"
        }
        .glyph-reel:before {
            content: "\E82D"
        }
        .glyph-reload:before {
            content: "\E851"
        }
        .glyph-reply:before {
            content: "\E86F"
        }
        .glyph-restaurant:before {
            content: "\E85B"
        }
        .glyph-robot:before {
            content: "\E824"
        }
        .glyph-search:before {
            content: "\E866"
        }
        .glyph-share:before {
            content: "\E88E"
        }
        .glyph-shop:before {
            content: "\E8A4"
        }
        .glyph-shuffle:before {
            content: "\E875"
        }
        .glyph-smile:before {
            content: "\E85D"
        }
        .glyph-smiley:before {
            content: "\E828"
        }
        .glyph-soundcloud-circle:before {
            content: "\E817"
        }
        .glyph-speaker:before {
            content: "\E83E"
        }
        .glyph-spotify-circle:before {
            content: "\E822"
        }
        .glyph-star:before {
            content: "\E8A5"
        }
        .glyph-strava-circle:before {
            content: "\E818"
        }
        .glyph-sun:before {
            content: "\E853"
        }
        .glyph-sunglasses:before {
            content: "\E82A"
        }
        .glyph-tag:before {
            content: "\E833"
        }
        .glyph-tags:before {
            content: "\E834"
        }
        .glyph-target:before {
            content: "\E876"
        }
        .glyph-thumbnails:before {
            content: "\E831"
        }
        .glyph-thumbsup:before {
            content: "\E86E"
        }
        .glyph-tools:before {
            content: "\E873"
        }
        .glyph-triangle-down:before {
            content: "\E841"
        }
        .glyph-triangle-left:before {
            content: "\E843"
        }
        .glyph-triangle-right:before {
            content: "\E844"
        }
        .glyph-triangle-up:before {
            content: "\E842"
        }
        .glyph-trophy:before {
            content: "\E852"
        }
        .glyph-tumblr:before {
            content: "\E89D"
        }
        .glyph-tumblr-circle:before {
            content: "\E819"
        }
        .glyph-tumblr-no-box:before {
            content: "\E89C"
        }
        .glyph-twitter:before {
            content: "\E87D"
        }
        .glyph-twitter-circle:before {
            content: "\E81A"
        }
        .glyph-upload-cloud:before {
            content: "\E8A9"
        }
        .glyph-users:before {
            content: "\E868"
        }
        .glyph-video:before {
            content: "\E82E"
        }
        .glyph-videocam:before {
            content: "\E8A0"
        }
        .glyph-vimeo:before {
            content: "\E87C"
        }
        .glyph-vimeo-circle:before {
            content: "\E81B"
        }
        .glyph-vine-circle:before {
            content: "\E81C"
        }
        .glyph-vk-circle:before {
            content: "\E81D"
        }
        .glyph-weibo-circle:before {
            content: "\E81E"
        }
        .glyph-wikipedia-circle:before {
            content: "\E823"
        }
        .glyph-wordpress:before {
            content: "\E89E"
        }
        .glyph-wordpress-circle:before {
            content: "\E81F"
        }
        .glyph-workout:before {
            content: "\E854"
        }
        .glyph-wow:before {
            content: "\E801"
        }
        .glyph-yelp-circle:before {
            content: "\E820"
        }
        .glyph-youtube:before {
            content: "\E864"
        }
        .glyph-youtube-circle:before {
            content: "\E821"
        }
        .glyph-addon-after:after {
            content: "\F196"
        }
        .glyph-address-after:after {
            content: "\E871"
        }
        .glyph-angle-down-after:after {
            content: "\E845"
        }
        .glyph-angle-left-after:after {
            content: "\E846"
        }
        .glyph-angle-right-after:after {
            content: "\E847"
        }
        .glyph-angle-thin-down-after:after {
            content: "\E893"
        }
        .glyph-angle-thin-left-after:after {
            content: "\E894"
        }
        .glyph-angle-thin-right-after:after {
            content: "\E895"
        }
        .glyph-angle-thin-up-after:after {
            content: "\E896"
        }
        .glyph-angle-up-after:after {
            content: "\E848"
        }
        .glyph-arrow-down-after:after {
            content: "\E84D"
        }
        .glyph-arrow-left-after:after {
            content: "\E84E"
        }
        .glyph-arrow-right-after:after {
            content: "\E84F"
        }
        .glyph-arrow-up-after:after {
            content: "\E850"
        }
        .glyph-article-after:after {
            content: "\E88F"
        }
        .glyph-attention-after:after {
            content: "\E863"
        }
        .glyph-award-after:after {
            content: "\E890"
        }
        .glyph-behance-after:after {
            content: "\E85F"
        }
        .glyph-behance-circle-after:after {
            content: "\E808"
        }
        .glyph-bio-after:after {
            content: "\E800"
        }
        .glyph-bitbucket-after:after {
            content: "\E860"
        }
        .glyph-block-after:after {
            content: "\E840"
        }
        .glyph-blogger-after:after {
            content: "\E89A"
        }
        .glyph-blogger-circle-after:after {
            content: "\E809"
        }
        .glyph-bold-after:after {
            content: "\E856"
        }
        .glyph-book-after:after {
            content: "\E872"
        }
        .glyph-brush-after:after {
            content: "\E88A"
        }
        .glyph-building-after:after {
            content: "\E85C"
        }
        .glyph-building-alt-after:after {
            content: "\E899"
        }
        .glyph-calendar-after:after {
            content: "\E83C"
        }
        .glyph-camera-after:after {
            content: "\E830"
        }
        .glyph-charity-after:after {
            content: "\E855"
        }
        .glyph-chart-bar-after:after {
            content: "\E8AE"
        }
        .glyph-chat-after:after {
            content: "\E8AC"
        }
        .glyph-check-after:after {
            content: "\E86A"
        }
        .glyph-check2-after:after {
            content: "\E8A7"
        }
        .glyph-chevron-down-after:after {
            content: "\E84C"
        }
        .glyph-chevron-left-after:after {
            content: "\E849"
        }
        .glyph-chevron-right-after:after {
            content: "\E84A"
        }
        .glyph-chevron-up-after:after {
            content: "\E84B"
        }
        .glyph-clock-after:after {
            content: "\E874"
        }
        .glyph-close-after:after {
            content: "\E8A6"
        }
        .glyph-coffee-after:after {
            content: "\E85A"
        }
        .glyph-cog-after:after {
            content: "\E888"
        }
        .glyph-commercial-building-after:after {
            content: "\E898"
        }
        .glyph-contact-after:after {
            content: "\E892"
        }
        .glyph-create-sig-after:after {
            content: "\E827"
        }
        .glyph-credit-card-after:after {
            content: "\E859"
        }
        .glyph-date-after:after {
            content: "\E829"
        }
        .glyph-design-after:after {
            content: "\E806"
        }
        .glyph-doc-after:after {
            content: "\E8A1"
        }
        .glyph-download-after:after {
            content: "\E835"
        }
        .glyph-download-cloud-after:after {
            content: "\E836"
        }
        .glyph-dribbble-after:after {
            content: "\E861"
        }
        .glyph-dribbble-circle-after:after {
            content: "\E80A"
        }
        .glyph-edit-after:after {
            content: "\E838"
        }
        .glyph-education-after:after {
            content: "\E87A"
        }
        .glyph-ellipsis-after:after {
            content: "\E879"
        }
        .glyph-email-after:after {
            content: "\E88C"
        }
        .glyph-embed-after:after {
            content: "\E837"
        }
        .glyph-etsy-after:after {
            content: "\E804"
        }
        .glyph-etsy-circle-after:after {
            content: "\E80B"
        }
        .glyph-exchange-after:after {
            content: "\E889"
        }
        .glyph-eye-after:after {
            content: "\E887"
        }
        .glyph-eyedropper-after:after {
            content: "\E88B"
        }
        .glyph-facebook-after:after {
            content: "\E87E"
        }
        .glyph-facebook-circle-after:after {
            content: "\E80C"
        }
        .glyph-facebook-squared-after:after {
            content: "\E87F"
        }
        .glyph-fitbit-circle-after:after {
            content: "\E80D"
        }
        .glyph-flag-after:after {
            content: "\E86D"
        }
        .glyph-flickr-after:after {
            content: "\E87B"
        }
        .glyph-flickr-circle-after:after {
            content: "\E80E"
        }
        .glyph-food-after:after {
            content: "\E8A3"
        }
        .glyph-forward-after:after {
            content: "\E870"
        }
        .glyph-foursquare-circle-after:after {
            content: "\E80F"
        }
        .glyph-github-after:after {
            content: "\E862"
        }
        .glyph-github-circle-after:after {
            content: "\E810"
        }
        .glyph-glass-after:after {
            content: "\E82B"
        }
        .glyph-globe-after:after {
            content: "\E8A2"
        }
        .glyph-gmail-after:after {
            content: "\E89B"
        }
        .glyph-goodreads-circle-after:after {
            content: "\E825"
        }
        .glyph-google-after:after {
            content: "\E8AB"
        }
        .glyph-gplus-after:after {
            content: "\E8AA"
        }
        .glyph-gplus-circle-after:after {
            content: "\E811"
        }
        .glyph-group-after:after {
            content: "\E89F"
        }
        .glyph-heart-after:after {
            content: "\E82C"
        }
        .glyph-hireme-after:after {
            content: "\E85E"
        }
        .glyph-home-after:after {
            content: "\E86B"
        }
        .glyph-instagram-after:after {
            content: "\E883"
        }
        .glyph-instagram-circle-after:after {
            content: "\E812"
        }
        .glyph-italic-after:after {
            content: "\E857"
        }
        .glyph-kickstarter-after:after {
            content: "\E805"
        }
        .glyph-kickstarter-circle-after:after {
            content: "\E813"
        }
        .glyph-lightbulb-after:after {
            content: "\E83F"
        }
        .glyph-lightning-after:after {
            content: "\E897"
        }
        .glyph-link-after:after {
            content: "\E86C"
        }
        .glyph-linkedin-after:after {
            content: "\E882"
        }
        .glyph-linkedin-circle-after:after {
            content: "\E814"
        }
        .glyph-list-after:after {
            content: "\E877"
        }
        .glyph-location-after:after {
            content: "\E839"
        }
        .glyph-lock-after:after {
            content: "\E832"
        }
        .glyph-login-after:after {
            content: "\E83D"
        }
        .glyph-medium-after:after {
            content: "\E826"
        }
        .glyph-megaphone-after:after {
            content: "\E880"
        }
        .glyph-menu-after:after {
            content: "\E83B"
        }
        .glyph-minus-after:after {
            content: "\E886"
        }
        .glyph-mobile-after:after {
            content: "\E878"
        }
        .glyph-music-after:after {
            content: "\E865"
        }
        .glyph-pencil-after:after {
            content: "\E891"
        }
        .glyph-person-after:after {
            content: "\E867"
        }
        .glyph-phone-after:after {
            content: "\E83A"
        }
        .glyph-photo-after:after {
            content: "\E82F"
        }
        .glyph-picture-after:after {
            content: "\E869"
        }
        .glyph-pinterest-after:after {
            content: "\E881"
        }
        .glyph-pinterest-circle-after:after {
            content: "\E815"
        }
        .glyph-place-after:after {
            content: "\E88D"
        }
        .glyph-play-after:after {
            content: "\E8AF"
        }
        .glyph-plus-after:after {
            content: "\E885"
        }
        .glyph-podcast-after:after {
            content: "\E8AD"
        }
        .glyph-portfolio-after:after {
            content: "\E858"
        }
        .glyph-power-after:after {
            content: "\E884"
        }
        .glyph-promoted-after:after {
            content: "\E803"
        }
        .glyph-puzzle-after:after {
            content: "\E8A8"
        }
        .glyph-px500-after:after {
            content: "\E802"
        }
        .glyph-px500-circle-after:after {
            content: "\E807"
        }
        .glyph-quora-circle-after:after {
            content: "\E816"
        }
        .glyph-reel-after:after {
            content: "\E82D"
        }
        .glyph-reload-after:after {
            content: "\E851"
        }
        .glyph-reply-after:after {
            content: "\E86F"
        }
        .glyph-restaurant-after:after {
            content: "\E85B"
        }
        .glyph-robot-after:after {
            content: "\E824"
        }
        .glyph-search-after:after {
            content: "\E866"
        }
        .glyph-share-after:after {
            content: "\E88E"
        }
        .glyph-shop-after:after {
            content: "\E8A4"
        }
        .glyph-shuffle-after:after {
            content: "\E875"
        }
        .glyph-smile-after:after {
            content: "\E85D"
        }
        .glyph-smiley-after:after {
            content: "\E828"
        }
        .glyph-soundcloud-circle-after:after {
            content: "\E817"
        }
        .glyph-speaker-after:after {
            content: "\E83E"
        }
        .glyph-spotify-circle-after:after {
            content: "\E822"
        }
        .glyph-star-after:after {
            content: "\E8A5"
        }
        .glyph-strava-circle-after:after {
            content: "\E818"
        }
        .glyph-sun-after:after {
            content: "\E853"
        }
        .glyph-sunglasses-after:after {
            content: "\E82A"
        }
        .glyph-tag-after:after {
            content: "\E833"
        }
        .glyph-tags-after:after {
            content: "\E834"
        }
        .glyph-target-after:after {
            content: "\E876"
        }
        .glyph-thumbnails-after:after {
            content: "\E831"
        }
        .glyph-thumbsup-after:after {
            content: "\E86E"
        }
        .glyph-tools-after:after {
            content: "\E873"
        }
        .glyph-triangle-down-after:after {
            content: "\E841"
        }
        .glyph-triangle-left-after:after {
            content: "\E843"
        }
        .glyph-triangle-right-after:after {
            content: "\E844"
        }
        .glyph-triangle-up-after:after {
            content: "\E842"
        }
        .glyph-trophy-after:after {
            content: "\E852"
        }
        .glyph-tumblr-after:after {
            content: "\E89D"
        }
        .glyph-tumblr-circle-after:after {
            content: "\E819"
        }
        .glyph-tumblr-no-box-after:after {
            content: "\E89C"
        }
        .glyph-twitter-after:after {
            content: "\E87D"
        }
        .glyph-twitter-circle-after:after {
            content: "\E81A"
        }
        .glyph-upload-cloud-after:after {
            content: "\E8A9"
        }
        .glyph-users-after:after {
            content: "\E868"
        }
        .glyph-video-after:after {
            content: "\E82E"
        }
        .glyph-videocam-after:after {
            content: "\E8A0"
        }
        .glyph-vimeo-after:after {
            content: "\E87C"
        }
        .glyph-vimeo-circle-after:after {
            content: "\E81B"
        }
        .glyph-vine-circle-after:after {
            content: "\E81C"
        }
        .glyph-vk-circle-after:after {
            content: "\E81D"
        }
        .glyph-weibo-circle-after:after {
            content: "\E81E"
        }
        .glyph-wikipedia-circle-after:after {
            content: "\E823"
        }
        .glyph-wordpress-after:after {
            content: "\E89E"
        }
        .glyph-wordpress-circle-after:after {
            content: "\E81F"
        }
        .glyph-workout-after:after {
            content: "\E854"
        }
        .glyph-wow-after:after {
            content: "\E801"
        }
        .glyph-yelp-circle-after:after {
            content: "\E820"
        }
        .glyph-youtube-after:after {
            content: "\E864"
        }
        .glyph-youtube-circle-after:after {
            content: "\E821"
        }
        @font-face {
            font-family: aboutme-glyphs;
            src: url(assets/fonts/aboutme-glyphs.eot);
            src: url(assets/fonts/aboutme-glyphs.eot?#iefix) format("embedded-opentype"), url(assets/fonts/aboutme-glyphs.woff2) format("woff2"), url(assets/fonts/aboutme-glyphs.woff) format("woff"), url(assets/fonts/aboutme-glyphs.ttf) format("truetype"), url(assets/fonts/aboutme-glyphs.svg#aboutme-glyphs) format("svg");
            font-weight: 400;
            font-style: normal
        }
        [class*=" glyph-"],
        [class^=glyph-] {
            position: relative
        }
        .glyph:after,
        .glyph:before,
        [class*=" glyph-"]:after,
        [class*=" glyph-"]:before,
        [class^=glyph-]:after,
        [class^=glyph-]:before {
            font-family: aboutme-glyphs;
            font-style: normal;
            font-weight: 400;
            speak: none;
            display: inline-block;
            text-decoration: inherit;
            text-align: center;
            line-height: 1em;
            font-variant: normal;
            text-transform: none;
            font-size: 120%;
            position: relative;
            top: .05em;
            width: 1em
        }
        [class*=" glyph-"]:before,
        [class^=glyph-]:before {
            margin-right: .4em
        }
        [class*=" glyph-"]:after,
        [class^=glyph-]:after {
            margin-left: .4em
        }
        .glyph-svg svg {
            display: inline-block;
            text-decoration: inherit;
            text-align: center;
            position: relative;
            line-height: 1em;
            width: 1.2em;
            height: 1.2em;
            top: .05em
        }
        .glyph-svg svg path {
            fill: #fff
        }
        .glyph-exclamation:before {
            content: "!";
            font-weight: 700;
            font-family: inherit
        }
        .glyph-question:before {
            content: "?";
            font-family: inherit
        }
        .glyph-center {
            position: relative
        }
        .glyph-center:before {
            position: absolute!important;
            width: 100%;
            height: 100%;
            line-height: inherit;
            margin: 0!important;
            padding: 0!important;
            left: 0;
            top: 0
        }
        .glyph-text:before {
            margin: 0!important
        }
        .glyph-flip:before {
            -webkit-transform: scaleX(-1);
            transform: scaleX(-1);
            -ms-filter: fliph;
            -webkit-filter: fliph;
            filter: fliph
        }
        .button[class*=" glyph-"]:before,
        .button[class^=glyph-]:before {
            font-size: 96%;
            margin-left: -.2em;
            margin-right: .5em;
            top: 0
        }
        .button[class*=" glyph-"]:after,
        .button[class^=glyph-]:after {
            font-size: 96%;
            margin-right: -.2em;
            margin-left: .5em;
            top: 0
        }
        .button.glyph-twitter:before {
            font-size: 140%;
            top: .15em;
            margin-left: -.3em
        }
        .browser-ie11 .button.glyph-twitter:before {
            font-size: 22px
        }
        .button.glyph-facebook:before {
            font-size: 130%;
            top: .12em;
            margin-left: -.3em;
            margin-right: .3em
        }
        .browser-ie11 .button.glyph-facebook:before {
            font-size: 21px
        }
        .button.glyph-linkedin:before {
            top: .05em
        }
        .button.glyph-instagram:before {
            font-size: 125%;
            top: .1em
        }
        .browser-ie11 .button.glyph-instagram:before {
            font-size: 20px
        }
        .button.glyph-google:before {
            font-size: 100%
        }
        .browser-ie11 .button.glyph-google:before {
            font-size: 16px
        }
        .button.glyph-gplus:before {
            font-size: 90%
        }
        .browser-ie11 .button.glyph-gplus:before {
            font-size: 14px
        }
        .glyph-email:before {
            font-size: 90%;
            top: -.05em
        }
        .browser-ie11 .glyph-email:before {
            font-size: 14px
        }
        .button.glyph-email:before {
            margin-right: .8em
        }
        .button.glyph-share:before {
            font-size: 130%;
            top: 1px
        }
        .browser-ie11 .button.glyph-share:before {
            font-size: 21px
        }
        .button.glyph-angle-left:before,
        .button.glyph-angle-right:before {
            top: 1px;
            font-size: 100%
        }
        .browser-ie11 .button.glyph-angle-left:before,
        .browser-ie11 .button.glyph-angle-right:before {
            font-size: 16px
        }
        .glyph-link:before {
            font-size: 120%
        }
        .browser-ie11 .glyph-link:before {
            font-size: 19px
        }
        .glyph-list:before {
            font-size: 150%;
            top: .12em
        }
        .browser-ie11 .glyph-list:before {
            font-size: 24px
        }
        .glyph-pencil.glyph-center:before {
            font-size: 100%;
            top: .09em
        }
        .browser-ie11 .glyph-pencil.glyph-center:before {
            font-size: 16px
        }
        .glyph-close.glyph-center:before {
            top: .05em;
            font-size: 80%
        }
        .browser-ie11 .glyph-close.glyph-center:before {
            font-size: 13px
        }
        .glyph-minus:before,
        .glyph-plus:before {
            font-size: 100%
        }
        .browser-ie11 .glyph-minus:before,
        .browser-ie11 .glyph-plus:before {
            font-size: 16px
        }
        .glyph-eye:before {
            top: .1em;
            font-size: 135%
        }
        .browser-ie11 .glyph-eye:before {
            font-size: 22px
        }
        .glyph-lightbulb:before {
            top: .1em;
            font-size: 140%
        }
        .browser-ie11 .glyph-lightbulb:before {
            font-size: 22px
        }
        .glyph-px500:before {
            top: .15em;
            font-size: 135%
        }
        .browser-ie11 .glyph-px500:before {
            font-size: 22px
        }
        .glyph-medium-after:after,
        .glyph-medium:before {
            font-size: 90%
        }
        .browser-ie11 .glyph-medium-after:after,
        .browser-ie11 .glyph-medium:before {
            font-size: 14px
        }
        .glyph-etsy-after:after,
        .glyph-etsy:before {
            font-size: 100%
        }
        .browser-ie11 .glyph-etsy-after:after,
        .browser-ie11 .glyph-etsy:before {
            font-size: 16px
        }
        .glyph-dribbble-after:after,
        .glyph-dribbble:before {
            font-size: 135%
        }
        .browser-ie11 .glyph-dribbble-after:after,
        .browser-ie11 .glyph-dribbble:before {
            font-size: 22px
        }
        body {
            font-family: Proxima Nova, Tahoma, Helvetica, Verdana, sans-serif;
            font-size: 14px;
            line-height: 1.3;
            color: #333;
            -webkit-text-size-adjust: 100%;
            -ms-text-size-adjust: 100%
        }
        @media only screen and (max-width: 640px) {
            body {
                font-family: Proxima Nova, TrebuchetMS, Droid Sans, sans-serif!important
            }
        }
        a {
            color: #0974b6;
            text-decoration: none
        }
        .no-touchevents a:hover {
            color: #07639c;
            text-decoration: none
        }
        hr {
            background-color: #999;
            border: 0;
            margin: .75em 0;
            height: 1px
        }
        .right {
            float: right
        }
        .left {
            float: left
        }
        .clear {
            clear: both
        }
        .inline {
            display: inline
        }
        .invisible {
            display: none!important
        }
        .clickable {
            cursor: pointer
        }
        * {
            transition: background-color .15s ease-out, color .15s ease-out, border-color .15s ease-out, fill .15s ease-out, box-shadow .15s ease-out
        }
        ul.inline,
        ul.inline>li {
            display: inline-block
        }
        ul.inline>li {
            vertical-align: baseline
        }
        .button.fullwidth,
        .fullwidth,
        input.fullwidth,
        select.fullwidth,
        textarea.fullwidth {
            box-sizing: border-box;
            width: 100%
        }
        div.pane {
            display: none
        }
        div.pane.active {
            display: block
        }
        p {
            margin-bottom: .75em
        }
        p:last-child {
            margin-bottom: 0
        }
        ul.bulleted {
            padding-left: 1.3em;
            list-style-type: disc
        }
        ul.bulleted ul.bulleted {
            list-style-type: circle
        }
        ul.bulleted li {
            margin: .75em 0
        }
        ol.numbered {
            padding-left: 1.3em;
            list-style-type: decimal
        }
        ol.numbered li {
            margin: .75em 0
        }
        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-size: 16px;
            font-weight: 400;
            margin: 0;
            margin-bottom: 10px
        }
        .nowrap {
            white-space: nowrap
        }
        .text.small {
            font-size: 12px!important
        }
        .text.italic {
            font-style: italic
        }
        .text.bold {
            font-weight: 700
        }
        .text.capitalize {
            text-transform: capitalize
        }
        .text.underline {
            text-decoration: underline
        }
        .text.white {
            color: #fff
        }
        .text.black {
            color: #000
        }
        .text.gray {
            color: #999
        }
        .text.yellow {
            color: #fc3
        }
        .no-touchevents a.text.yellow:hover {
            color: #ffe7a2
        }
        .text.orange {
            color: #e37f1c
        }
        .text.link {
            color: #00a98f;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }
        .no-touchevents .text.link:hover {
            color: #00dcba
        }
        .text.ellipsis {
            overflow: hidden;
            text-overflow: ellipsis
        }
        .text.break-all {
            word-break: break-all
        }
        input[type=search] {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none
        }
        input[type=search]::-webkit-search-cancel-button {
            z-index: 1
        }
        input[type=email],
        input[type=password],
        input[type=search],
        input[type=tel],
        input[type=text],
        input[type=url] {
            display: block;
            margin: 0;
            margin-bottom: 5px;
            background-color: #fff;
            box-shadow: inset 0 10px 5px -10px #ddd;
            font-size: 16px;
            line-height: 1.5;
            font-family: inherit;
            padding: 4px;
            border: 1px solid #ccc;
            border-radius: 3px;
            z-index: inherit
        }
        input[type=email]:focus,
        input[type=password]:focus,
        input[type=search]:focus,
        input[type=tel]:focus,
        input[type=text]:focus,
        input[type=url]:focus {
            z-index: 1;
            outline-width: 3px;
            outline-style: solid;
            outline-color: rgba(0, 169, 143, .3);
            outline-offset: 1px
        }
        input[type=email].input,
        input[type=password].input,
        input[type=search].input,
        input[type=tel].input,
        input[type=text].input,
        input[type=url].input {
            font-size: 13px;
            line-height: 30px;
            height: 30px;
            padding: 0 6px;
            box-sizing: border-box
        }
        input[type=email].input.large,
        input[type=password].input.large,
        input[type=search].input.large,
        input[type=tel].input.large,
        input[type=text].input.large,
        input[type=url].input.large {
            font-size: 16px;
            line-height: 40px;
            height: 40px;
            padding: 0 10px
        }
        input[type=email].input.xlarge,
        input[type=password].input.xlarge,
        input[type=search].input.xlarge,
        input[type=tel].input.xlarge,
        input[type=text].input.xlarge,
        input[type=url].input.xlarge {
            font-size: 18px;
            line-height: 50px;
            height: 50px;
            padding: 0 15px
        }
        input[type=email].input.inline,
        input[type=password].input.inline,
        input[type=search].input.inline,
        input[type=tel].input.inline,
        input[type=text].input.inline,
        input[type=url].input.inline {
            display: inline-block;
            margin-right: 3px;
            vertical-align: top
        }
        input[type=email].input.uppercase,
        input[type=password].input.uppercase,
        input[type=search].input.uppercase,
        input[type=tel].input.uppercase,
        input[type=text].input.uppercase,
        input[type=url].input.uppercase {
            text-transform: uppercase
        }
        input[type=email].input.uppercase::-webkit-input-placeholder,
        input[type=password].input.uppercase::-webkit-input-placeholder,
        input[type=search].input.uppercase::-webkit-input-placeholder,
        input[type=tel].input.uppercase::-webkit-input-placeholder,
        input[type=text].input.uppercase::-webkit-input-placeholder,
        input[type=url].input.uppercase::-webkit-input-placeholder {
            text-transform: none
        }
        input[type=email].input.uppercase:-ms-input-placeholder,
        input[type=password].input.uppercase:-ms-input-placeholder,
        input[type=search].input.uppercase:-ms-input-placeholder,
        input[type=tel].input.uppercase:-ms-input-placeholder,
        input[type=text].input.uppercase:-ms-input-placeholder,
        input[type=url].input.uppercase:-ms-input-placeholder {
            text-transform: none
        }
        input[type=email].input.uppercase::placeholder,
        input[type=password].input.uppercase::placeholder,
        input[type=search].input.uppercase::placeholder,
        input[type=tel].input.uppercase::placeholder,
        input[type=text].input.uppercase::placeholder,
        input[type=url].input.uppercase::placeholder {
            text-transform: none
        }
        textarea {
            display: block;
            font-size: 16px;
            line-height: 1.3;
            font-family: inherit;
            padding: 4px;
            margin: 0;
            margin-bottom: 5px;
            box-shadow: inset 0 10px 5px -10px #ddd;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 3px;
            resize: vertical
        }
        textarea.input {
            font-size: 13px;
            padding: 6px;
            z-index: inherit
        }
        textarea.input:focus {
            z-index: 1;
            outline-width: 3px;
            outline-style: solid;
            outline-color: rgba(0, 169, 143, .3);
            outline-offset: 1px
        }
        textarea.input.large {
            font-size: 16px;
            padding: 10px
        }
        input.hint,
        textarea.hint {
            color: #999
        }
        select {
            line-height: 24px;
            font-size: 12px;
            border: 1px solid #ccc;
            border-radius: 3px
        }
        label,
        select {
            margin-bottom: 5px
        }
        label {
            display: block;
            font-size: 14px;
            z-index: inherit
        }
        label:focus {
            z-index: 1;
            outline-width: 3px;
            outline-style: solid;
            outline-color: rgba(0, 169, 143, .3);
            outline-offset: 1px
        }
        label.label {
            font-weight: 700
        }
        label.inline {
            display: inline-block;
            margin-right: 10px
        }
        fieldset {
            margin-bottom: 15px
        }
        fieldset.last,
        fieldset:last-child {
            margin-bottom: 0
        }
        input[type=file] {
            height: 100%
        }
        label.error {
            color: red;
            font-weight: 700;
            margin-top: 10px
        }
        label.error.glyph-attention:before {
            margin-right: 5px
        }
        label.confirmation {
            margin-top: 10px;
            color: #00a98f
        }
        label.confirmation.glyph-check:before {
            margin-right: 2px;
            font-size: 130%
        }
        input.input.underline,
        textarea.input.underline {
            box-shadow: none;
            outline: none;
            border-bottom-left-radius: 0;
            border-bottom-right-radius: 0;
            border-color: transparent;
            border-bottom-color: #ccc;
            resize: none
        }
        input.input.underline:focus,
        textarea.input.underline:focus {
            background-color: #f8f8f8;
            border-bottom-color: #00a98f
        }
        .element-error input.underline,
        .element-error input.underline:focus {
            border-bottom-color: #c66
        }
        .buttonfield .input.underline.large+.button.small {
            border-radius: 5px;
            margin-top: 6px
        }
        fieldset.glyphinput:before {
            position: absolute;
            margin: 0;
            left: 5px;
            top: 0;
            line-height: 40px;
            font-size: 140%;
            color: #999
        }
        fieldset.glyphinput.seafoam:before {
            color: #2eb897
        }
        fieldset.glyphinput input.input {
            padding-left: 2em
        }
        .buttonfield {
            position: relative
        }
        .buttonfield input.input {
            width: 100%
        }
        .buttonfield .button {
            position: absolute;
            top: 0;
            right: 0;
            border-top-left-radius: 0;
            border-bottom-left-radius: 0
        }
        .buttonfield .button.light {
            border-top: none;
            border-right: none;
            border-bottom: none;
            top: 1px;
            right: 1px
        }
        .buttonfield.copyfield .button {
            display: none
        }
        html.flash .buttonfield.copyfield .button {
            display: inherit
        }
        .select.input,
        select.input {
            -webkit-appearance: none;
            -moz-appearance: none;
            border: 1px solid #ccc;
            border: 1px solid rgba(0, 0, 0, .2);
            height: 30px;
            margin: 0;
            padding: 0;
            background: transparent none no-repeat;
            box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .05), inset 0 0 0 1px hsla(0, 0%, 100%, .3), inset 0 -60px 40px -40px rgba(0, 0, 0, .05);
            cursor: pointer;
            color: #333;
            font-family: inherit;
            font-size: 13px;
            line-height: 28px;
            display: inline-block;
            padding-left: 10px;
            padding-right: 40px;
            z-index: inherit
        }
        .select.input:focus,
        select.input:focus {
            z-index: 1;
            outline-width: 3px;
            outline-style: solid;
            outline-color: rgba(0, 169, 143, .3);
            outline-offset: 1px
        }
        .select.input.inline,
        select.input.inline {
            vertical-align: top;
            margin-right: 3px;
            padding-left: 7px
        }
        .select.input.large,
        select.input.large {
            font-size: 16px;
            height: 40px;
            line-height: 38px;
            padding-left: 10px
        }
        .select.input[multiple] {
            box-sizing: border-box;
            position: relative;
            z-index: 1000;
            counter-reset: selected;
            padding-right: 30px
        }
        .select.input[multiple]>span:after {
            height: 28px;
            line-height: 28px;
            min-width: 20px;
            border-left: 1px solid rgba(0, 0, 0, .1);
            text-align: center;
            display: inline-block;
            margin-left: 5px;
            content: counter(selected)
        }
        .select.input[multiple] * {
            line-height: 1
        }
        .select.input[multiple] .options {
            background-color: hsla(0, 0%, 100%, .85);
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, .2);
            top: 0;
            left: -10px;
            position: absolute;
            margin-left: -9999px;
            padding: 5px 0;
            z-index: 1;
            min-width: 120%
        }
        .select.input[multiple] .options input {
            display: block;
            position: absolute;
            margin-left: -9999px
        }
        .select.input[multiple] .options label {
            text-align: left;
            padding: 3px 20px;
            margin: 0
        }
        .select.input[multiple] .options input+label:hover {
            color: #fff;
            background-color: #2883f0;
            cursor: pointer
        }
        .select.input[multiple] .options input:checked+label {
            color: #fff;
            background-color: #555;
            counter-increment: selected
        }
        .select.input[multiple]:not([disabled]) .options:hover,
        .select.input[multiple]:not([disabled]):active .options {
            margin-left: 0
        }
        @media screen and (min-width: 0) {
            .select.input,
            select.input {
                border-radius: 3px;
                background-image: url(assets/fonts/Jq6MeXH8uU+Tfm6vdvse3u3eudL2hKx5S0yHdq7ORVBI5rHSPI0Ldy4MPCgoKCgoK+hN0E2AAlRpVSfyaTcsAAAAASUVORK5CYII=);
                background-position: 100%
            }
            .select.input.dark,
            select.input.dark {
                background-image: url(assets/fonts/PmQ6+rEAAACPSURBVHja7NZRCoAgDAbgLTpF5/CAO6Beo2tYQoX4IM5cBf2DIfrgh3OITERLjHGlB2OiFwIoUKBAgQIFCtQIZeYrQwiSz81P6r2XfDQvbwn1wNMdsBdmzb+3dnf7Ht/u3nlEeY8Qk5M650SzPqy8JaAFz0iNRC1ZK3XrHilV3YsHHyhQoECBAgX6E3QTYADlyW09Tlxg5gAAAABJRU5ErkJggg==)
            }
        }
        .select.input:-moz-focusring,
        select.input:-moz-focusring {
            color: transparent;
            text-shadow: 0 0 0 #000
        }
        @media (-ms-high-contrast: none),
        screen and (-ms-high-contrast: active) {
            .select.input::-ms-expand,
            select.input::-ms-expand {
                display: none
            }
        }
        @media only screen and (-webkit-min-device-pixel-ratio: 1.25),
        only screen and (-webkit-min-device-pixel-ratio: 120),
        only screen and (min-resolution: 120dppx) {
            .select.input,
            select.input {
                background-image: url(assets/fonts/NDQvPP60NAs3G/W0Kzc/9bQPPkcZdA8+Lx37k9Ovyv2yLhf+5JCQgKGvG8aTBqHpCWibryqMpIrWv1stR6dKkvDEdcnjlpl6JeCQgKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCrpG2wUYANg8IXKvJCa2AAAAAElFTkSuQmCC);
                background-size: 29px 50px
            }
            .select.input.dark,
            select.input.dark {
                background-image: url(assets/fonts/PgQ/SAUAAADkSURBVHja7NjbCYMwGAZQKZ2ia2TBf0Cdyb70SShWau4nEERNhEPUfMmyrutr3/dl9PpYJimgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKCgoKAFyzPHQ7dtO2sSn/q1pJS6H9E4HId8dePkfAhoXLzeJTT+vN8FNG5u1yQ0MrdvAhqF+1WBRuX+ZQJD6TlSBAQV6qt8o9HDiDb31zWPSkayrtXLVOvRqXYYjriieThLYPhhB6946Jd1QUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFBQUFB7y9vAQYARKnEOzhJepsAAAAASUVORK5CYII=)
            }
        }
        input.input[type=radio] {
            display: none
        }
        input.input[type=radio]+label {
            position: relative;
            padding-left: 1.8em;
            text-align: left;
            display: block;
            margin-bottom: .5em;
            font-size: 16px;
            cursor: pointer;
            z-index: inherit
        }
        input.input[type=radio]+label:focus {
            z-index: 1;
            outline-width: 3px;
            outline-style: solid;
            outline-color: rgba(0, 169, 143, .3);
            outline-offset: 1px
        }
        input.input.large[type=radio]+label {
            font-size: 18px
        }
        input.input[type=radio]+label:before {
            content: "";
            position: absolute;
            left: 0;
            top: .025em;
            width: 1em;
            height: 1em;
            border-radius: 50%;
            border: .125em solid rgba(0, 0, 0, .3);
            box-shadow: inset 0 0 0 .4em #fff;
            background-color: #fff;
            transition: all .15s ease-out
        }
        input.input[type=radio]:checked+label:before {
            border: .125em solid #29a387;
            background-color: #2eb897;
            box-shadow: inset 0 0 0 .225em #fff
        }
        .element.type-checkbox input[type=checkbox],
        input[type=checkbox].input {
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            display: inline-block;
            cursor: pointer;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            border-radius: 3px;
            border: 2px solid #999;
            text-align: center;
            vertical-align: middle;
            width: 20px;
            height: 20px;
            z-index: inherit;
            margin: 0;
            margin-right: 7px
        }
        .element.type-checkbox input[type=checkbox]:focus,
        input[type=checkbox].input:focus {
            z-index: 1;
            outline-width: 3px;
            outline-style: solid;
            outline-color: rgba(0, 169, 143, .3);
            outline-offset: 1px
        }
        .element.type-checkbox input[type=checkbox]:checked,
        input[type=checkbox].input:checked {
            background-color: #00a98f;
            border-color: #00a98f;
            position: relative
        }
        .element.type-checkbox input[type=checkbox]:checked:before,
        input[type=checkbox].input:checked:before {
            position: absolute;
            left: 0;
            top: 0;
            width: 16px;
            height: 16px;
            line-height: 16px;
            font-size: 16px;
            text-align: center;
            display: block;
            font-family: aboutme-glyphs;
            content: "\E86A";
            color: #fff
        }
        .element.type-checkbox label.label,
        input[type=checkbox].input+label {
            display: inline-block;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            cursor: pointer
        }
        [role=group] {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            margin-bottom: 15px
        }
        [role=group] [role=group-item] {
            width: calc(50% - 10px)
        }
        .button {
            display: inline-block;
            text-align: center;
            border-radius: 5px;
            font-size: 14px;
            line-height: 28px;
            padding: 0 15px;
            background-color: #fff;
            color: #444;
            cursor: pointer;
            box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .05), inset 0 0 0 100px rgba(0, 0, 0, .02);
            border: 1px solid rgba(0, 0, 0, .15);
            box-sizing: border-box;
            white-space: nowrap;
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none
        }
        .button:focus {
            outline-color: rgba(0, 169, 143, .4)
        }
        .no-touchevents .button:not([disabled]):hover {
            color: #444;
            box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .05)
        }
        .button:active:not([disabled]),
        .no-touchevents .button:active:not([disabled]) {
            transition: box-shadow .1s ease-out;
            box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .05), inset 0 0 0 1px hsla(0, 0%, 100%, .5), inset 0 40px 40px -40px rgba(0, 0, 0, .1)
        }
        button.button {
            font-family: inherit
        }
        button.button::-moz-focus-inner {
            border: 0;
            padding: 0
        }
        a.button {
            text-decoration: none!important
        }
        .button.xlarge {
            font-size: 18px;
            line-height: 48px;
            padding: 0 30px;
            font-weight: 100
        }
        .button.large {
            font-size: 16px;
            line-height: 38px;
            padding: 0 20px
        }
        .button.small {
            font-size: 12px;
            line-height: 24px;
            padding: 0 12px
        }
        .button.xsmall {
            font-size: 10px;
            line-height: 18px;
            padding: 0 9px
        }
        .button.light.white {
            background-color: #fff
        }
        .button.light.grey {
            background-color: #eee
        }
        .button.light.seafoam {
            background-color: #fff;
            border: 1px solid #66ccb4;
            color: #40bfa2
        }
        .button.dark {
            color: #fff;
            background-color: #777
        }
        .button.dark.transparent {
            background-color: rgba(0, 0, 0, .2)
        }
        .no-touchevents .button.dark:not([disabled]):hover {
            color: #fff
        }
        .button.dark.grey {
            background-color: #777
        }
        .button.dark.blue {
            background-color: #0077b3
        }
        .button.dark.red {
            background-color: #c00
        }
        .button.dark.orange {
            background-color: #fbb829
        }
        .button.dark.seafoam {
            background-color: #2eb897;
            border-color: rgba(0, 0, 0, .1)
        }
        .no-touchevents .button.dark.seafoam:not([disabled]):hover {
            border-color: transparent
        }
        .menu-content .button.light.white {
            background-color: #f8f8f8
        }
        .no-touchevents .menu-content .button.light.white:not([disabled]):hover {
            background-color: #fff
        }
        .menu-content .button.light.grey {
            background-color: #e7e7e7
        }
        .no-touchevents .menu-content .button.light.grey:not([disabled]):hover {
            background-color: #eee
        }
        .button.dark.outlined,
        .button.light.outlined,
        .button.outlined {
            background-color: transparent;
            box-shadow: none;
            transition: border-color .1s ease-out, background-color .1s ease-out
        }
        .button.light.outlined {
            color: #fff;
            border-color: hsla(0, 0%, 100%, .7)
        }
        .no-touchevents .button.light.outlined:not([disabled]):hover {
            box-shadow: none;
            border-color: #fff;
            background-color: hsla(0, 0%, 100%, .1)
        }
        .button.dark.outlined {
            color: #555;
            border-color: #888
        }
        .no-touchevents .button.dark.outlined:not([disabled]):hover {
            color: #333;
            border-color: #999;
            box-shadow: none;
            background-color: rgba(30, 30, 30, .1)
        }
        .button.transparent {
            border-color: transparent;
            box-shadow: none;
            color: #999
        }
        .no-touchevents .button.transparent:hover {
            background-color: #eee;
            color: #666
        }
        .button.dark.branded.facebook {
            background-color: #3b5998
        }
        .button.dark.branded.google {
            background-color: #4285f4
        }
        .button.dark.branded.gplus {
            background-color: #c63d2d
        }
        .button.dark.branded.twitter {
            background-color: #2ca9e1
        }
        .button.dark.branded.linkedin {
            background-color: #4875b4
        }
        .button.dark.branded.instagram {
            background-color: #517fa4
        }
        .button.dark.branded.tumblr {
            background-color: #456f99
        }
        .button.dark.branded.pinterest {
            background-color: #bd081c
        }
        .button.dark {
            box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .05), inset 0 0 0 100px rgba(0, 0, 0, .1);
            border: 1px solid rgba(0, 0, 0, .1)
        }
        .no-touchevents .button.dark:not([disabled]):hover {
            box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .05)
        }
        .button.dark:active:not([disabled]),
        .no-touchevents .button.dark:active:not([disabled]) {
            box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .05), inset 0 0 0 100px rgba(0, 0, 0, .3)
        }
        .button[disabled] {
            opacity: .4;
            transition: box-shadow 0ms;
            box-shadow: 0 0 0 1px hsla(0, 0%, 100%, .1);
            cursor: default
        }
        .button.dark[disabled] {
            opacity: .2
        }
        .button.light.seafoam[disabled] {
            opacity: .5;
            border: 1px solid rgba(102, 204, 180, .7)
        }
        .button.dark.seafoam[disabled] {
            opacity: .4
        }
        .button .hover-text {
            display: none
        }
        .button.button-hover.button-hovered .hover-text,
        .no-touchevents .button.button-hover:hover .hover-text {
            display: inline
        }
        .button.button-hover.button-hovered .default-text,
        .no-touchevents .button.button-hover:hover .default-text {
            display: none
        }
        .buttons {
            line-height: 30px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start
        }
        .buttons.large {
            line-height: 40px
        }
        .buttons.small {
            line-height: 25px
        }
        .buttons .button {
            margin-right: 15px;
            margin-bottom: 10px
        }
        .buttons .button.small {
            margin-right: 8px
        }
        .buttons .button:last-child {
            margin-right: 0
        }
        .buttons.last .button,
        .buttons:last-child .button {
            margin-bottom: 0
        }
        .buttons.center {
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center
        }
        .buttons.center .button {
            margin: 0 8px 10px
        }
        .buttonbar {
            zoom: 1;
            clear: left
        }
        .buttonbar:after {
            display: block;
            visibility: hidden;
            height: 0;
            clear: both;
            content: "."
        }
        .buttonbar>.button {
            float: left;
            margin-right: -1px;
            position: relative;
            border-radius: 0;
            white-space: nowrap
        }
        .no-touchevents .buttonbar>.button:hover {
            z-index: 1
        }
        .buttonbar>.button.active,
        .no-touchevents .buttonbar>.button.active:hover {
            background-color: #d5e6ef;
            z-index: 2;
            border-color: #a5b6c0;
            border-color: rgba(0, 0, 0, .15);
            box-shadow: none;
            cursor: default
        }
        .buttonbar>.button.first,
        .buttonbar>.button:first-child {
            border-top-left-radius: 5px;
            border-bottom-left-radius: 5px
        }
        .buttonbar .button.last,
        .buttonbar>.button:last-child {
            border-top-right-radius: 5px;
            border-bottom-right-radius: 5px;
            margin-right: 0
        }
        .buttonbar .buttonbar {
            clear: none;
            float: left
        }
        .buttonbar .buttonbar .button.last,
        .buttonbar .buttonbar>.button.first,
        .buttonbar .buttonbar>.button:first-child,
        .buttonbar .buttonbar>.button:last-child {
            border-radius: 0
        }
        .button .loading-text,
        .button.loading .default-text {
            display: none
        }
        .button.loading .loading-text {
            display: inline-block;
            position: relative;
            padding-left: calc(1em + 5px)
        }
        .button.loading .loading-text:before {
            content: "";
            display: block;
            position: absolute;
            left: -.4em;
            top: 50%;
            margin-top: -.65em;
            width: 1.2em;
            height: 1.2em;
            -webkit-animation: fullrotation 1s infinite linear;
            animation: fullrotation 1s infinite linear;
            border-left: .2em solid rgba(0, 0, 0, .3);
            border-right: .2em solid rgba(0, 0, 0, .6);
            border-bottom: .2em solid rgba(0, 0, 0, .6);
            border-top: .2em solid rgba(0, 0, 0, .6);
            box-sizing: border-box;
            border-radius: 50%;
            margin-right: 1em
        }
        .button.light.seafoam.loading .loading-text:before {
            border-left: .2em solid rgba(102, 204, 180, .3);
            border-right: .2em solid rgba(102, 204, 180, .6);
            border-bottom: .2em solid rgba(102, 204, 180, .6);
            border-top: .2em solid rgba(102, 204, 180, .6)
        }
        @-webkit-keyframes fullrotation {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }
            to {
                -webkit-transform: rotate(1turn);
                transform: rotate(1turn)
            }
        }
        @keyframes fullrotation {
            0% {
                -webkit-transform: rotate(0deg);
                transform: rotate(0deg)
            }
            to {
                -webkit-transform: rotate(1turn);
                transform: rotate(1turn)
            }
        }
        .button.dark.loading .loading-text:before {
            border-left: .2em solid hsla(0, 0%, 100%, .3);
            border-right: .2em solid hsla(0, 0%, 100%, .8);
            border-bottom: .2em solid hsla(0, 0%, 100%, .8);
            border-top: .2em solid hsla(0, 0%, 100%, .8)
        }
        .page-container {
            width: 100%;
            height: 100%;
            overflow: visible
        }
        .page-content {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column
        }
        .page-content.has-footer {
            min-height: 100vh
        }
        main {
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            -ms-flex-negative: 0;
            flex-shrink: 0
        }
        footer {
            -webkit-box-flex: 0;
            -ms-flex-positive: 0;
            flex-grow: 0;
            -ms-flex-negative: 1;
            flex-shrink: 1
        }
        .structure {
            max-width: 1260px;
            margin-left: auto;
            margin-right: auto;
            box-sizing: border-box;
            padding-left: 5vw;
            padding-right: 5vw
        }
    </style>
    <style type="text/css" id="s1546-0">
        body {
            background-color: #333
        }
        .nav-frame {
            top: 0;
            left: 0;
            width: 100%;
            position: absolute;
            overflow: hidden;
            z-index: 10;
            height: 50px;
            border: none;
            outline: none;
            background: none
        }
        .profile-scope-1zgKV main {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            -webkit-box-align: stretch;
            -ms-flex-align: stretch;
            align-items: stretch
        }
        .profile-scope-1zgKV .profile-column {
            width: 100%;
            position: relative;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            -ms-flex-negative: 1;
            flex-shrink: 1
        }
        .panel-right .profile-scope-1zgKV .profile-column {
            overflow-y: auto;
            height: 100vh
        }
        .profile-scope-1zgKV .hide-scrollbar {
            -ms-overflow-style: none
        }
        .profile-scope-1zgKV .hide-scrollbar::-webkit-scrollbar {
            display: none
        }
        @media only screen and (max-width: 720px) {
            .profile-scope-1zgKV main {
                position: relative;
                overflow-x: hidden
            }
        }
    </style>
    <style type="text/css" id="s99-0">
        .unsupported {
            width: 100%;
            position: fixed;
            top: 50px;
            left: 0;
            background-color: rgba(40, 40, 40, .7);
            color: #fff;
            font-size: 16px;
            line-height: 1.5;
            text-align: center;
            box-sizing: border-box;
            padding: 10px 10%;
            z-index: 1000
        }
        .unsupported.iframe {
            background-color: rgba(40, 40, 40, .9);
            top: 0;
            padding-top: 20%;
            height: 100%
        }
    </style>
    <style type="text/css" id="s101-0">
        nav.topnav {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            z-index: 311;
            -webkit-transform: translateZ(0);
            box-sizing: border-box;
            height: 50px;
            line-height: 50px;
            background-color: transparent;
            transition: background-color .5s ease-out;
            padding: 0 15px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between
        }
        nav.topnav.scrolled {
            background-color: hsla(0, 0%, 100%, .95);
            color: #888
        }
        nav.topnav .signup-button {
            transition: opacity .1s ease-out
        }
        nav.topnav .logo-container {
            height: 50px
        }
        nav.topnav .logo,
        nav.topnav .logo-container {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center
        }
        nav.topnav .logo {
            border-radius: 5px;
            box-sizing: border-box;
            padding: 0 7px;
            width: 90px;
            height: 28px
        }
        nav.topnav .logo svg {
            width: 100%;
            height: auto
        }
        nav.topnav.scrolled .logo svg path,
        nav.topnav.seafoam .logo svg path {
            fill: #2eb897
        }
        nav.topnav>ul {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap
        }
        nav.topnav>ul>li+li {
            margin-left: 15px
        }
        nav.topnav>ul.applinks {
            -webkit-box-align: start;
            -ms-flex-align: start;
            align-items: flex-start
        }
        nav.topnav>ul.userlinks {
            -webkit-box-align: end;
            -ms-flex-align: end;
            align-items: flex-end
        }
        nav.topnav .button {
            border-color: hsla(0, 0%, 100%, .5);
            color: #fff;
            margin: 0
        }
        .no-touchevents nav.topnav .button:hover {
            color: #fff;
            background-color: hsla(0, 0%, 100%, .1)
        }
        .no-touchevents .panel-right-edit nav.topnav .button:hover {
            color: #fff
        }
        nav.topnav .button.viewer-button {
            transition: color .2s ease-out, border-color .2s ease-out, background-color .15s ease-out
        }
        nav.topnav.scrolled .button,
        nav.topnav.seafoam .button {
            border-color: rgba(0, 0, 0, .3);
            color: #666
        }
        nav.topnav.scrolled .button:hover,
        nav.topnav.seafoam .button:hover {
            color: #666;
            background-color: rgba(0, 0, 0, .05)
        }
        nav.topnav .upgrade-button {
            transition: opacity .3s ease-out;
            opacity: 1
        }
        .panel-right-edit nav.topnav .upgrade-button {
            opacity: 0
        }
        .color-light nav.topnav:not(.template-large):not(.scrolled) .logo svg path {
            fill: #333
        }
        body:not(.panel-right-edit) .color-light nav.topnav:not(.template-large):not(.scrolled) .button {
            color: #333;
            border-color: #333
        }
        .no-touchevents body:not(.panel-right-edit) .color-light nav.topnav:not(.template-large):not(.scrolled) .button:hover {
            background-color: rgba(0, 0, 0, .05)
        }
        @media only screen and (max-width: 640px) {
            nav.topnav {
                padding: 0 10px
            }
            nav.topnav>ul>li+li {
                margin-left: 10px
            }
            nav.topnav .is-mobile {
                display: inherit
            }
            nav.topnav .not-mobile {
                display: none
            }
        }
        @media only screen and (min-width: 641px) {
            nav.topnav .is-mobile {
                display: none
            }
            nav.topnav .not-mobile {
                display: inherit
            }
        }
        @media only screen and (max-width: 800px) {
            body:not(.panel-right-edit) nav.topnav.template-large:not(.scrolled) .logo {
                background-color: rgba(0, 0, 0, .2)
            }
        }
        @media only screen and (min-width: 801px) {
            nav.topnav.template-large:not(.scrolled) .logo {
                background-color: rgba(0, 0, 0, .2)
            }
            .no-touchevents nav.topnav.template-large:not(.scrolled) a.logo:hover {
                background-color: rgba(0, 0, 0, .5)
            }
        }
        @media only screen and (max-width: 800px) {
            body:not(.panel-right-edit) nav.topnav.template-large:not(.scrolled) .button {
                background-color: rgba(0, 0, 0, .2)
            }
            .no-touchevents body:not(.panel-right-edit) nav.topnav.template-large:not(.scrolled) .button:hover {
                background-color: rgba(0, 0, 0, .5)
            }
        }
        @media only screen and (min-width: 801px) {
            body:not(.panel-right-edit) nav.topnav.template-large .button {
                border-color: rgba(0, 0, 0, .3);
                color: #666
            }
            .no-touchevents body:not(.panel-right-edit) nav.topnav.template-large .button:hover {
                color: #666;
                background-color: rgba(0, 0, 0, .05)
            }
        }
    </style>
    <style type="text/css" id="s676-0">
        .profile.profile_view-scope-1Shwh {
            line-height: 1.4;
            padding: 10px;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-box-align: center;
            -ms-flex-align: center;
            align-items: center;
            box-sizing: border-box;
            min-width: 320px;
            position: relative;
            padding-top: 50px;
            padding-bottom: 50px
        }
        .has-spooky:not(.is-mapped) .profile.profile_view-scope-1Shwh:not(.nested) {
            padding-top: 95px;
            padding-bottom: 95px
        }
        .profile.profile_view-scope-1Shwh.nested {
            overflow: hidden
        }
        .profile.profile_view-scope-1Shwh.preview {
            -webkit-user-select: none;
            -moz-user-select: none;
            -ms-user-select: none;
            user-select: none;
            pointer-events: none
        }
        .profile.profile_view-scope-1Shwh:not(.nested) {
            min-height: 100vh
        }
        .profile.profile_view-scope-1Shwh .profile-content {
            box-sizing: border-box;
            color: #333;
            z-index: 1
        }
        .profile.profile_view-scope-1Shwh .profile-content .head {
            box-sizing: border-box
        }
        .profile.profile_view-scope-1Shwh .profile-content .body {
            box-sizing: border-box;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            padding: 20px
        }
        .profile.profile_view-scope-1Shwh .profile-content section+section:not(:empty) {
            margin-top: 20px
        }
        .profile.profile_view-scope-1Shwh .profile-content .name-headline section+section:not(:empty) {
            margin-top: 5px
        }
        .profile.profile_view-scope-1Shwh .profile-content .image {
            background-color: #eee
        }
        .profile.profile_view-scope-1Shwh .profile-content .name {
            font-size: 20px;
            line-height: 1.2;
            text-transform: uppercase;
            letter-spacing: 2px;
            font-weight: 700;
            margin: 0;
            color: #333
        }
        .profile.profile_view-scope-1Shwh .profile-content .headline {
            font-size: 16px;
            line-height: 1.2;
            font-weight: 700;
            margin: 0
        }
        .profile.profile_view-scope-1Shwh .profile-content .headline .role {
            display: inline-block;
            text-transform: capitalize
        }
        .profile.profile_view-scope-1Shwh .profile-content .portfolio {
            max-width: 400px;
            width: 100%;
            margin: 0 auto
        }
        .profile.profile_view-scope-1Shwh .profile-content .portfolio ul {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center
        }
        .profile.profile_view-scope-1Shwh .profile-content .portfolio ul .portfolio-item {
            display: block;
            opacity: .9;
            background-size: cover;
            background-position: 50%;
            background-repeat: no-repeat;
            width: 17.6%;
            max-width: 72px
        }
        .profile.profile_view-scope-1Shwh .profile-content .portfolio ul .portfolio-item+.portfolio-item {
            margin-left: 3%
        }
        .profile.profile_view-scope-1Shwh .profile-content .portfolio ul .portfolio-item:before {
            display: block;
            content: "";
            padding-bottom: 100%
        }
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content .portfolio ul .portfolio-item:hover {
            cursor: pointer;
            opacity: 1
        }
        .profile.profile_view-scope-1Shwh .profile-content .portfolio ul.list-3 .portfolio-item {
            width: 31.3333%;
            max-width: inherit
        }
        .profile.profile_view-scope-1Shwh .profile-content .portfolio ul.list-4 .portfolio-item {
            width: 22.75%;
            max-width: inherit
        }
        .profile.profile_view-scope-1Shwh .profile-content .video {
            max-width: 400px;
            width: 100%;
            margin: 0 auto
        }
        .profile.profile_view-scope-1Shwh .profile-content .video .video-wrapper:not(.facebook) {
            position: relative;
            height: 0;
            padding-bottom: 56.25%;
            overflow: hidden;
            background-color: #f8f8f8
        }
        .profile.profile_view-scope-1Shwh .profile-content .video .video-wrapper:not(.facebook) iframe {
            position: absolute;
            width: 100%;
            height: 100%;
            left: 0;
            top: 0
        }
        .profile.profile_view-scope-1Shwh .profile-content .video .video-wrapper.facebook {
            background-color: #f8f8f8;
            min-height: 225px;
            overflow: hidden
        }
        @media only screen and (max-width: 430px) {
            .profile.profile_view-scope-1Shwh .profile-content .video .video-wrapper.facebook {
                background-color: transparent;
                min-height: 146px
            }
        }
        .profile.profile_view-scope-1Shwh .profile-content .spotlight {
            max-width: 400px;
            width: 100%;
            margin: 0 auto
        }
        .profile.profile_view-scope-1Shwh .profile-content .spotlight .button {
            min-width: 100%
        }
        .profile.profile_view-scope-1Shwh .profile-content .spotlight .button.large {
            font-size: 15px
        }
        .profile.profile_view-scope-1Shwh .profile-content .spotlight .button.dark,
        .profile.profile_view-scope-1Shwh .profile-content .spotlight .button.light {
            transition: all .15s ease-out;
            box-shadow: inset 0 0 0 100px hsla(0, 0%, 100%, 0)
        }
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content .spotlight .button.dark:hover,
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content .spotlight .button.light:hover {
            box-shadow: inset 0 0 0 100px hsla(0, 0%, 100%, .2)
        }
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content .spotlight .button.light:hover {
            border-color: rgba(0, 0, 0, .23)
        }
        .profile.profile_view-scope-1Shwh .profile-content .bio {
            font-size: 16px;
            max-width: 400px;
            width: 100%;
            margin: 0 auto;
            text-align: left;
            word-wrap: break-word
        }
        .profile.profile_view-scope-1Shwh .profile-content .bio.short-bio {
            text-align: center
        }
        .profile.profile_view-scope-1Shwh .profile-content .bio a {
            color: #333;
            position: relative;
            text-decoration: underline
        }
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content .bio a:hover {
            color: #888
        }
        @media only screen and (max-width: 430px) {
            .profile.profile_view-scope-1Shwh .profile-content .bio {
                max-width: 100%
            }
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.inline {
            padding: 0;
            margin: 0;
            list-style: none;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li.interest {
            padding: 0;
            margin: 5px;
            color: #777
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li.contact-me,
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li a.social-link {
            padding: 0;
            margin: 10px;
            width: 36px;
            height: 36px;
            font-size: 30px;
            line-height: 36px;
            cursor: pointer;
            display: block;
            -webkit-font-smoothing: antialiased;
            color: rgba(54, 71, 78, .7)
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li.contact-me svg,
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li a.social-link svg {
            fill: rgba(54, 71, 78, .7);
            height: 100%;
            width: 100%
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li.contact-me.contact-me,
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li a.social-link.contact-me {
            color: rgba(54, 71, 78, .7);
            border: 2px solid #727e83;
            border-radius: 18px;
            font-size: 20px;
            box-sizing: border-box;
            text-align: center
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li.contact-me.contact-me svg,
        .profile.profile_view-scope-1Shwh .profile-content ul.inline li a.social-link.contact-me svg {
            width: 20px;
            height: auto
        }
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content ul.inline li.contact-me:hover,
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content ul.inline li a.social-link:hover {
            color: #36474e;
            border-color: #36474e
        }
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content ul.inline li.contact-me:hover svg,
        .no-touchevents .profile.profile_view-scope-1Shwh .profile-content ul.inline li a.social-link:hover svg {
            fill: #36474e
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.meta-sections {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            max-width: 400px;
            margin: 0 auto;
            font-size: 14px
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.meta-sections .meta-section:nth-last-child(n+2),
        .profile.profile_view-scope-1Shwh .profile-content ul.meta-sections .meta-section:nth-last-child(n+2)~.meta-section {
            width: 50%;
            box-sizing: border-box;
            padding: 0 5px
        }
        .profile.profile_view-scope-1Shwh .profile-content ul.meta-sections .meta-header {
            font-size: 12px;
            font-weight: 700;
            text-transform: uppercase
        }
        .profile.profile_view-scope-1Shwh.small.nested {
            padding-top: 25px;
            padding-bottom: 25px
        }
        .profile.profile_view-scope-1Shwh.small .profile-content {
            width: 620px;
            max-width: calc(100vw - 10px);
            text-align: center;
            background-color: #fff;
            border-radius: 4px;
            margin-top: 60px
        }
        .profile.profile_view-scope-1Shwh.small .head .image {
            box-shadow: inset 0 0 10px 0 rgba(0, 0, 0, .2), 0 0 2px 0 rgba(0, 0, 0, .1);
            border-radius: 50%;
            margin: 0 auto;
            margin-top: -60px;
            margin-bottom: 20px;
            width: 120px;
            height: 120px
        }
        .profile.profile_view-scope-1Shwh.small .name-headline {
            padding-left: 20px;
            padding-right: 20px
        }
        .profile.profile_view-scope-1Shwh.medium.nested {
            padding-top: 10px;
            padding-bottom: 10px
        }
        .profile.profile_view-scope-1Shwh.medium .profile-content {
            width: 620px;
            max-width: calc(100vw - 10px);
            text-align: center
        }
        .profile.profile_view-scope-1Shwh.medium .head {
            overflow: hidden;
            position: relative;
            border-top-left-radius: 4px;
            border-top-right-radius: 4px
        }
        .profile.profile_view-scope-1Shwh.medium .head .image {
            background-color: hsla(0, 0%, 100%, .1);
            box-shadow: inset 0 -130px 200px -50px rgba(0, 0, 0, .5)
        }
        .profile.profile_view-scope-1Shwh.medium .head .name-headline {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            position: absolute;
            box-sizing: border-box;
            padding: 20px;
            bottom: 0;
            left: 0;
            width: 100%;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, .7)
        }
        .profile.profile_view-scope-1Shwh.medium .head .name-headline .headline,
        .profile.profile_view-scope-1Shwh.medium .head .name-headline .name {
            color: #fff
        }
        .profile.profile_view-scope-1Shwh.medium .body {
            background-color: #fff;
            border-bottom-left-radius: 4px;
            border-bottom-right-radius: 4px
        }
        .profile.profile_view-scope-1Shwh.large {
            padding: 0;
            background-color: #fff
        }
        .has-spooky:not(.is-mapped) .profile.profile_view-scope-1Shwh.large:not(.nested) {
            padding-top: 70px;
            padding-bottom: 70px
        }
        @media (max-width: 800px) {
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) {
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-box-pack: start;
                -ms-flex-pack: start;
                justify-content: flex-start
            }
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) .profile-content {
                width: 100%;
                text-align: center
            }
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) .head {
                position: relative;
                max-height: 80vh;
                overflow: hidden
            }
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) .head .image {
                box-shadow: inset 0 -130px 200px -50px rgba(0, 0, 0, .5);
                box-sizing: border-box
            }
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) .head .name-headline {
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-direction: column;
                flex-direction: column;
                -webkit-box-pack: end;
                -ms-flex-pack: end;
                justify-content: flex-end;
                position: absolute;
                box-sizing: border-box;
                padding: 20px;
                bottom: 0;
                left: 0;
                width: 100%;
                text-shadow: 1px 1px 1px rgba(0, 0, 0, .7)
            }
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) .head .name-headline .headline,
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) .head .name-headline .name {
                color: #fff
            }
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) .body {
                padding-top: 0;
                padding-bottom: 50px
            }
            .profile.profile_view-scope-1Shwh.large:not([min-width="801px"]) .body .name-headline {
                display: none
            }
        }
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] {
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start
        }
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] .profile-content {
            width: 100%;
            text-align: center
        }
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] .head {
            position: relative;
            max-height: 80vh;
            overflow: hidden
        }
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] .head .image {
            box-shadow: inset 0 -130px 200px -50px rgba(0, 0, 0, .5);
            box-sizing: border-box
        }
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] .head .name-headline {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: vertical;
            -webkit-box-direction: normal;
            -ms-flex-direction: column;
            flex-direction: column;
            -webkit-box-pack: end;
            -ms-flex-pack: end;
            justify-content: flex-end;
            position: absolute;
            box-sizing: border-box;
            padding: 20px;
            bottom: 0;
            left: 0;
            width: 100%;
            text-shadow: 1px 1px 1px rgba(0, 0, 0, .7)
        }
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] .head .name-headline .headline,
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] .head .name-headline .name {
            color: #fff
        }
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] .body {
            padding-top: 0;
            padding-bottom: 50px
        }
        .profile.profile_view-scope-1Shwh.large[max-width="800px"] .body .name-headline {
            display: none
        }
        @media (min-width: 801px) {
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]),
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-direction: row;
                flex-direction: row;
                -webkit-box-align: stretch;
                -ms-flex-align: stretch;
                align-items: stretch
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content {
                width: 100%;
                display: -webkit-box;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-wrap: nowrap;
                flex-wrap: nowrap
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .head {
                width: 66.6667%;
                -webkit-box-flex: 1;
                -ms-flex-positive: 1;
                flex-grow: 1;
                -ms-flex-negative: 1;
                flex-shrink: 1
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .head .image {
                background-color: #eee;
                position: fixed;
                width: inherit;
                min-height: 100%;
                padding-bottom: 0!important
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .head .name-headline {
                display: none
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .body {
                width: 33.3333%;
                box-sizing: border-box;
                -webkit-box-flex: 1;
                -ms-flex-positive: 1;
                flex-grow: 1;
                -ms-flex-negative: 1;
                flex-shrink: 1;
                text-align: left;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center;
                padding: 100px 60px
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .headline .location,
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .headline .roles {
                white-space: normal
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .portfolio {
                margin-left: 0;
                margin-right: 0
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .portfolio ul {
                -webkit-box-pack: start;
                -ms-flex-pack: start;
                justify-content: flex-start
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .portfolio ul .portfolio-item {
                margin-left: 0;
                margin-right: 3%
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .portfolio ul .portfolio-item:last-child {
                margin-right: 0
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .bio,
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .spotlight,
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .video {
                margin-left: 0;
                margin-right: 0
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content .bio.short-bio {
                text-align: left
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content ul.inline {
                -webkit-box-pack: start;
                -ms-flex-pack: start;
                justify-content: flex-start
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content ul.inline li.interest {
                margin-left: 0;
                margin-right: 10px
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content ul.inline li.contact-me,
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content ul.inline li a.social-link {
                margin-left: 0;
                margin-right: 20px
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content ul.meta-sections {
                -webkit-box-pack: start;
                -ms-flex-pack: start;
                justify-content: flex-start;
                max-width: inherit;
                margin: 0
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content ul.meta-sections .meta-section:nth-last-child(n+2),
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content ul.meta-sections .meta-section:nth-last-child(n+2)~.meta-section {
                padding: 0;
                width: 50%
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]) .profile-content ul.meta-sections .meta-section:nth-last-child(n+2)~.meta-section {
                margin-left: 40px
            }
            .profile.profile_view-scope-1Shwh.large:not([max-width="800px"]).nested .profile-content .head .image {
                min-height: 0;
                position: absolute;
                top: 0;
                bottom: 0;
                left: 0;
                right: 0
            }
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"],
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content {
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -webkit-box-align: stretch;
            -ms-flex-align: stretch;
            align-items: stretch
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content {
            width: 100%;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .head {
            width: 66.6667%;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            -ms-flex-negative: 1;
            flex-shrink: 1
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .head .image {
            background-color: #eee;
            position: fixed;
            width: inherit;
            min-height: 100%;
            padding-bottom: 0!important
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .head .name-headline {
            display: none
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .body {
            width: 33.3333%;
            box-sizing: border-box;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            -ms-flex-negative: 1;
            flex-shrink: 1;
            text-align: left;
            -webkit-box-pack: center;
            -ms-flex-pack: center;
            justify-content: center;
            padding: 100px 60px
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .headline .location,
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .headline .roles {
            white-space: normal
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .portfolio {
            margin-left: 0;
            margin-right: 0
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .portfolio ul {
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .portfolio ul .portfolio-item {
            margin-left: 0;
            margin-right: 3%
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .portfolio ul .portfolio-item:last-child {
            margin-right: 0
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .bio,
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .spotlight,
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .video {
            margin-left: 0;
            margin-right: 0
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content .bio.short-bio {
            text-align: left
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content ul.inline {
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content ul.inline li.interest {
            margin-left: 0;
            margin-right: 10px
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content ul.inline li.contact-me,
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content ul.inline li a.social-link {
            margin-left: 0;
            margin-right: 20px
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content ul.meta-sections {
            -webkit-box-pack: start;
            -ms-flex-pack: start;
            justify-content: flex-start;
            max-width: inherit;
            margin: 0
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content ul.meta-sections .meta-section:nth-last-child(n+2),
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content ul.meta-sections .meta-section:nth-last-child(n+2)~.meta-section {
            padding: 0;
            width: 50%
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"] .profile-content ul.meta-sections .meta-section:nth-last-child(n+2)~.meta-section {
            margin-left: 40px
        }
        .profile.profile_view-scope-1Shwh.large[min-width="801px"].nested .profile-content .head .image {
            min-height: 0;
            position: absolute;
            top: 0;
            bottom: 0;
            left: 0;
            right: 0
        }
    </style>
    <style type="text/css" id="s1521-0">
        .viewer_panel-scope-258yz {
            transition: width .25s ease-in-out;
            width: 0;
            -webkit-box-flex: 1;
            -ms-flex-positive: 1;
            flex-grow: 1;
            -ms-flex-negative: 0;
            flex-shrink: 0;
            z-index: 1;
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-direction: row;
            flex-direction: row;
            -ms-flex-wrap: nowrap;
            flex-wrap: nowrap;
            -webkit-box-pack: stretch;
            -ms-flex-pack: stretch;
            justify-content: stretch;
            box-sizing: border-box;
            padding-top: 50px
        }
        .panel-right .viewer_panel-scope-258yz {
            width: 400px;
            box-shadow: -1px 0 0 0 rgba(0, 0, 0, .05)
        }
        @media only screen and (max-width: 720px) {
            .viewer_panel-scope-258yz {
                width: 100vw;
                height: 100vh;
                position: absolute;
                left: 100%;
                top: 0;
                z-index: 100;
                transition: left .25s ease-in-out
            }
            .panel-right .viewer_panel-scope-258yz {
                left: 0;
                width: 100vw
            }
        }
        .viewer_panel-scope-258yz .drilldown {
            width: 100%;
            min-width: 400px
        }
        @media only screen and (max-width: 720px) {
            .viewer_panel-scope-258yz .drilldown {
                min-width: 100vw
            }
        }
        @media only screen and (max-width: 640px) {
            .viewer_panel-scope-258yz .drilldown {
                min-width: 320px
            }
        }
        .has-spooky .viewer_panel-scope-258yz {
            padding-top: 70px
        }
        .viewer_panel-scope-258yz .browser-ios-safari {
            max-height: calc(100vh - 69px - 50px)
        }
        .has-spooky .viewer_panel-scope-258yz .browser-ios-safari {
            max-height: calc(100vh - 69px - 70px)
        }
        body:not(.has-spooky) .viewer_panel-scope-258yz {
            background-color: #333
        }
    </style>
    <style type="text/css" id="s367-0">
        .ledge-scope-3dRRK {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row nowrap;
            flex-flow: row nowrap;
            -webkit-box-pack: justify;
            -ms-flex-pack: justify;
            justify-content: space-between;
            background-color: hsla(0, 0%, 100%, .9);
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, .3);
            position: fixed;
            bottom: 0;
            padding: 0 30px;
            box-sizing: border-box;
            line-height: 60px;
            z-index: 1;
            width: 100%;
            opacity: 0;
            -webkit-transform: translateY(100%);
            transform: translateY(100%);
            transition: all .35s ease-in-out
        }
        .ledge-scope-3dRRK.fade-in {
            transition-duration: .4s;
            -webkit-transform: translateY(0);
            transform: translateY(0);
            opacity: 1
        }
        .ledge-scope-3dRRK.fade-out {
            transition-duration: .25s;
            opacity: 0
        }
        .panel-right .ledge-scope-3dRRK {
            opacity: 0;
            -webkit-transform: translateY(100%);
            transform: translateY(100%)
        }
        .ledge-scope-3dRRK .ledge-content {
            display: -webkit-box;
            display: -ms-flexbox;
            display: flex;
            -webkit-box-orient: horizontal;
            -webkit-box-direction: normal;
            -ms-flex-flow: row wrap;
            flex-flow: row wrap
        }
        .ledge-scope-3dRRK .ledge-content h1 {
            font-size: 16px;
            margin: 0;
            margin-right: 20px;
            color: #333
        }
        .ledge-scope-3dRRK .ledge-content .primary-buttons .button {
            min-width: 100px
        }
        .ledge-scope-3dRRK .ledge-content .primary-buttons .button+.button {
            margin-left: 10px
        }
        .ledge-scope-3dRRK .ledge-close {
            width: 18px;
            font-size: 18px;
            cursor: pointer;
            filter: alpha(opacity=30);
            opacity: .3
        }
        .ledge-scope-3dRRK .ledge-close:hover {
            filter: alpha(opacity=100);
            opacity: 1
        }
        @media only screen and (max-width: 720px) {
            .ledge-scope-3dRRK {
                line-height: inherit;
                padding: 20px;
                padding-top: 12px;
                text-align: center
            }
            .ledge-scope-3dRRK .ledge-content {
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-flow: column nowrap;
                flex-flow: column nowrap;
                -webkit-box-flex: 1;
                -ms-flex: 1 0;
                flex: 1 0
            }
            .ledge-scope-3dRRK .ledge-content h1 {
                margin-bottom: 10px;
                margin-right: 0
            }
            .ledge-scope-3dRRK .ledge-close {
                width: 12px;
                font-size: 12px;
                position: absolute;
                top: 10px;
                right: 10px
            }
        }
        @media only screen and (max-width: 640px) {
            .ledge-scope-3dRRK {
                padding: 10px
            }
            .ledge-scope-3dRRK .ledge-content {
                -webkit-box-orient: horizontal;
                -webkit-box-direction: normal;
                -ms-flex-flow: row nowrap;
                flex-flow: row nowrap;
                -webkit-box-pack: center;
                -ms-flex-pack: center;
                justify-content: center
            }
            .ledge-scope-3dRRK .ledge-content h1 {
                max-width: calc(100vw - 115px);
                font-size: 12px;
                margin-bottom: 0;
                margin-right: 5px;
                -webkit-align-self: center;
                -ms-flex-item-align: center;
                -ms-grid-row-align: center;
                align-self: center;
                white-space: nowrap;
                overflow: hidden;
                text-overflow: ellipsis
            }
            .ledge-scope-3dRRK .ledge-content .primary-buttons .button {
                min-width: 0
            }
            .ledge-scope-3dRRK .ledge-close {
                top: 15px
            }
            .ledge-scope-3dRRK.text-wrap {
                display: block
            }
            .ledge-scope-3dRRK.text-wrap .ledge-content {
                -webkit-box-orient: vertical;
                -webkit-box-direction: normal;
                -ms-flex-flow: column nowrap;
                flex-flow: column nowrap;
                margin: 0
            }
            .ledge-scope-3dRRK.text-wrap .ledge-content h1 {
                width: calc(100vw - 115px);
                margin: 0;
                font-size: 14px;
                white-space: normal;
                overflow: auto;
                text-overflow: inherit
            }
            .ledge-scope-3dRRK.text-wrap .ledge-content .primary-buttons {
                margin-top: 5px
            }
            .ledge-scope-3dRRK.text-wrap .ledge-content .primary-buttons .button.small {
                font-size: 14px;
                line-height: 25px
            }
            .ledge-scope-3dRRK.text-wrap .ledge-close {
                top: 10px
            }
        }

         /* Chat containers */
.container_chat {
    border: 2px solid #dedede;
    background-color: #f1f1f1;
    border-radius: 5px;
    padding: 10px;
    margin: 10px 0;
}

/* Darker chat container */
.darker {
    border-color: #ccc;
    background-color: #ddd;
}

/* Clear floats */
.container_chat::after {
    content: "";
    clear: both;
    display: table;
}

/* Style images */
.container_chat img {
    float: left;
    max-width: 60px;
    width: 100%;
    margin-right: 20px;
    border-radius: 50%;
}

/* Style the right image */
.container_chat img.right {
    float: right;
    margin-left: 20px;
    margin-right:0;
}

/* Style time text */
.time-right {
    float: right;
    color: #aaa;
}

/* Style time text */
.time-left {
    float: left;
    color: #999;
} 

input.textarea {
    position: fixed;
    bottom: 0px;
    left: 0px;
    right: 0px;
    width: 100%;
    height: 50px;
    z-index: 99;
    background: #fafafa;
    border: none;
    outline: none;
    padding-left: 55px;
    padding-right: 55px;
    color: #666;
    font-weight: 400;
}
.emojis {
    position: fixed;
    display: block;
    bottom: 8px;
    left: 7px;
    width: 34px;
    height: 34px;
    background-image: url(https://i.imgur.com/5WUpcPZ.png);
    background-repeat: no-repeat;
    background-size: cover;
    z-index: 100;
    cursor: pointer;
}
.emojis:active {
    opacity: 0.9;
}
    </style>
 <script type="text/javascript" src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.3.1.min.js"></script>




    <div class="page-container">
        <div class="page-content color-dark profile-scope-1zgKV" data-reactroot="">
        	<nav>	</nav>
            <main>
                <div class="profile-column">
                    <div class="profile-container">
                        <div class="profile small profile_view-scope-1Shwh">
                            <style>
                                body {
                                    background-color: #AEAEAE;
                                    background: -webkit-linear-gradient(315deg, #AEAEAE 0%, #AEAEAE 30%, #ffffff 100%) fixed;
                                    background: linear-gradient(135deg, #AEAEAE 0%, #AEAEAE 30%, #ffffff 100%) fixed;
                                }
                            </style>
                            <div class="profile-content">
                                <div class="head">
                                    <div class="image" style="width:120px;height:120px;background-image:url(<?php echo $data['image_filename'] ?>);background-size:cover;border-radius:50%;background-repeat:no-repeat;background-position:center center"></div>
                                    <div class="name-headline">
                                        <section>
                                            <h1 class="name"><?php echo $data['name'] ?></h1>
                                        </section>
                                        <section>			
                                            <h5> FULL STACK WEB DEVELOPER</h5>
											<div class="card-text"><b>Username</b>: <?php echo $data['username'] ?><br/>
                                                <b>Git url</b>: <a href="https://github.com/Chibuokem" target="_blank"><?php echo $data['username'] ?></a>
                                            </div>
                                        </section>
                                    </div>
                                </div>
                                <div class="body">
                                                                     
                                  
                                    <section class="social-links">
                                        <ul class="inline">
                                         
                                            <li><a class="social-link" title="Facebook" href="https://www.facebook.com/chibuokem.ibezim" target="_blank" rel="noopener noreferrer"><span class="SVGInline"><svg class="SVGInline-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><path d="M1000 500c0 233-159 429-375 484v-380h107l18-125h-125v-110c0-36 18-56 55-56h79v-117s-37-8-90-8c-120 0-180 67-180 166v125h-114v125h114v396c-271-6-489-228-489-500 0-276 224-500 500-500s500 224 500 500z"></path></svg></span></a>
                                            </li>
                                            <li><a class="social-link" title="Visit me on Twitter" href="https://twitter.com/CHIBUOKEM" target="_blank" rel="noopener noreferrer"><span class="SVGInline"><svg class="SVGInline-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><path d="M1000 500c0 277-223 500-500 500s-500-223-500-500 223-500 500-500 500 223 500 500zm-125-183c-25 11-53 18-82 22 30-17 51-45 61-79-28 17-57 28-89 35-25-28-62-45-103-45-78 0-141 63-141 142 0 10 1 22 3 32-118-5-223-62-294-149-11 22-18 46-18 72 0 50 24 93 62 118-23 0-45-7-64-18v2c0 69 49 126 114 140-12 3-24 4-37 4-9 0-19-1-27-2 18 57 71 95 132 96-48 38-108 65-176 65-11 0-23-1-33-2 62 40 138 62 217 62 262 0 404-216 404-404v-18c28-19 51-45 71-73z"></path></svg></span></a>
                                            </li>
                                           
                                            <li><a class="social-link" title="Visit me on GitHub" href="https://github.com/Chibuokem" target="_blank" rel="noopener noreferrer"><span class="SVGInline"><svg class="SVGInline-svg" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1000 1000"><path d="M1000 508c0 232-160 429-375 485v-131c0-41-10-98-52-131 134-20 239-99 239-223 0-51-21-102-58-144 11-47 17-105-4-148-53 5-106 32-145 56-33-8-67-14-105-14s-73 6-106 14c-39-24-91-51-144-56-21 43-16 101-5 148-37 42-57 93-57 144 0 124 105 203 239 223-20 15-32 36-40 57-105 2-189-81-190-81-5-4-12-5-16-2-6 3-9 10-7 16 2 5 44 124 201 172v100c-215-56-375-253-375-485 0-275 223-500 500-500 275 0 500 225 500 500z"></path></svg></span></a>
                                            </li>
                                           
                                            </li>
                                            
                                        </ul>
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div></div>
                </div>
            </main>
        </div>
    </div>
    
    <div class="ledge">
        <div class="ledge-scope-3dRRK fade-in">
            <div class="ledge-content">
            </div>
        </div>

        <!--chat starts here -->
            <div class="container" id="chat_div" style="overflow-y: scroll; height:300px;  max-height: 300px;" >
                 
                 <div class="container_chat darker">
                  <img src="https://i.imgur.com/HYcn9xO.png" alt="Avatar" class="right">
                  <p><?php echo greeting_from_chibuokem()." type help and click on the green send button below  to see what i  can do"; ?></p>
                  <span class="time-left"><?php  echo get_time();?></span>
                </div> 

         </div> 

         <div class="row">

         <div class="col-md-12">
                <input class="form-control" type="text" placeholder="Type here!" id="message" />
                 <button type="button" class="btn btn-success btn-lg pull-right" id="send">Send</button>
      </div>
               
        

       </div>      
                 <!--<div class="emojis"></div> -->

        <!--chat ends here -->

        <script type="text/javascript">
            $( document ).ready(function() {
                    
                     $("#send").click(function(e){
                e.preventDefault();

                var chat_message = $("#message").val();
                if(chat_message ==""){
                    alert('Please enter your message');
                }
                else{

                        var dt = new Date();
                var time = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

                var div = "<div class='container_chat'><img src='https://i.imgur.com/DY6gND0.png' alt='Avatar'><p>"+chat_message+"</p><span class='time-right'>"+time+"</span></div>";

               $('#chat_div').append(div);

               $('#chat_div').scrollTop($('#chat_div').scrollTop()+200);

               $("#message").val("");

              data = {message:chat_message};  

             $.ajax('profiles/Chibuokem.php',{
            type : 'post',
            data : data,
            success: function(data){

                  dt = new Date();
                 timee = dt.getHours() + ":" + dt.getMinutes() + ":" + dt.getSeconds();

                var divv = '<div class="container_chat darker"><img src="https://i.imgur.com/HYcn9xO.png" alt="Avatar" class="right"><p>'+data+'</p><span class="time-left">'+timee+'</span></div>'; 

                 $('#chat_div').append(divv);

                 $('#chat_div').scrollTop($('#chat_div').scrollTop()+300);

                    $("#send").html('Sent');
            
            
            },
            error : function(jqXHR,textStatus,errorThrown){
                 if(textStatus ='error'){
                    alert('Network Error request not completed');
                 }
                $("#send").html('Failed');
            },
            beforeSend :function(){

            $("#send").html('Sending..');

            },
        });

                }
                
   
            }); 

            
            });
           
        </script>