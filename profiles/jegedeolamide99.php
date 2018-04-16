<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
  <script defer src="https://use.fontawesome.com/releases/v5.0.10/js/all.js" integrity="sha384-slN8GvtUJGnv6ca26v8EzVaR9DC58QEwsIk9q1QXdCU8Yu8ck/tL/5szYlBbqmS+" crossorigin="anonymous"></script>
  <style>
    html{padding:0;margin:0;border:0;}
    body{padding:0;margin:0;border:0;color: #333e51;font-family: 'Montserrat',-apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",sans-serif;background:white;}
    main > div{
      display: block;
      padding: 60px 30px;
    }
    img{
      height: 100px;
      width: 100px;
      border-radius: 50%;
      display: inline-block;
      margin: 0 0 15px;
      cursor: none;
    }
    h1{
      font-size: 24px;
      font-weight: 500;
      line-height: 30px;
      margin: 0 0 20px;
    }
    h1::selection,p::selection{
      background: rgba(22, 132, 137, 0.75);
      color: white;
    }
    p{
      font-size: 18px;
      font-weight: 400;
      line-height: 26px;
      margin: 0 0 30px;
    }
    .profile__pic{
      display: inline-block;
      padding: 0;
      margin: 0;
    }
    .social a{
      text-decoration: none;
      display: inline-block;
      margin-right: 20px;
    }
    .social a path{
      height: 25px;
      width: auto;
      fill: #333e51;
      transition: fill ease .3s
    }
    .social a:hover path,
    .social a:focus path{
      fill: #168489;
    }

    @media (min-width: 567px) {
      .container{
        padding: 80px 60px;
      }
    }
    @media (min-width: 768px) {
      .container{
        max-width: 600px;
        margin: 0 auto;
        padding: 100px 60px;
      }
      img{
        height: 110px;
        width: 110px;
        transition: .3s;
      }
      img:hover{
        filter: brightness(100%) contrast(90%);
      }
    }
  </style>
</head>
<body>
  <main role="main">
    <div class="container">
      <div class="profile__pic">
        <img src="https://res.cloudinary.com/harryola9/image/upload/v1504174813/olamide.jpg" alt="Olamide profile pic"/>
        <h1>Hi there, I'm Jegede Olamide. I'm a Frontend developer and UI designer</h1>
        <p>I love working on projects that require analytical and conceptual thinking. <br>
        Also a lover of aesthetic and minimal designs. <br>
        </p>
        <div class="social">
          <a href="https://github.com/jegedeolamide99" target="_blank" title="Github"><i class="fab fa-github"></i></a>
          <a href="https://codepen.io/jegedeolamide99" target="_blank" title="Codepen"><i class="fab fa-codepen"></i></a>
          <a href="https://www.linkedin.com/in/olamide-jegede-87a293114//" target="_blank" title="LinkedIn"><i class="fab fa-linkedin-in"></i></a>
          <a href="mailto:jegedeolamide99@gmail.com" target="_blank" title="Email"><i class="far fa-envelope"></i></a>
        </div>
      </div>
    </div>
  </main>
</body>
</html>
