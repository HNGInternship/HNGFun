
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>My Profile</title>
    <link  rel="stylesheet" href="https://static.oracle.com/cdn/jet/v5.0.0/default/css/alta/oj-alta-min.css" type="text/css"/><!-- RequireJS bootstrap file -->

    <style>
     .aboutme{
       width: 500px;
       margin-left: 500px;
       margin-right: auto;
       padding-top: 50px;
       background-color: rgba(136, 7, 7, 0.438);

     }
     .me{
         color: white;
         font-size: 20px;
         font-family: 'Trebuchet MS', 'Lucida Sans Unicode', 'Lucida Grande', 'Lucida Sans', Arial, sans-serif;
         text-align: center;
     }
    </style>
</head>

<body>
    
    <div class="aboutme">
    <body class="demo-disable-bg-image">
    <div id="sampleDemo" style="" class="demo-padding demo-container">
      <div id="componentDemoContent" style="width: 1px; min-width: 100%;">
        
        <div id="animationDemo" style="overflow:hidden">
        
          <oj-label for="effect-select">Select effect</oj-label>
          <oj-select-one id="effect-select" 
                     options='[[effectArray]]'
                     value='{{effect}}'
                     style='max-width:20em'>
          </oj-select-one>
              
          <div>
            <oj-button on-oj-action='[[buttonClick]]'>
                Animate
            </oj-button>
          </div>
        
          <div>
            <div id="animatable" class="container">
              <oj-chart id="pieChart"
                        type='pie' 
                        series='[[dataSeries]]'
                        style-defaults='{"threeDEffect": "on"}'
                        hover-behavior='dim'
                        style='width:100%'>
              </oj-chart>
            </div>
          </div>
        
          <div id="form-container" class="oj-form-layout">
            <div class="oj-form oj-sm-odd-cols-12 oj-md-odd-cols-4 oj-md-labels-inline">  
              <!-- ko ojModule: {name: 'animation/common', 
                                 params: {effectOptions: effectOptions}} -->
              <!-- /ko -->
              <!-- ko ojModule: {name: modulePath, 
                                 params: {effectOptions: effectOptions}} -->
              <!-- /ko -->
            </div>
          </div>
        
        </div>

        
      </div>
    </div>
   <center> <img src="https://res.cloudinary.com/dtafmyxnn/image/upload/v1524231568/Emem.jpg" alt="Emmy" width="300" height="250"/><br />
       <div class="me"><b> I am Ememobong Daniel Bob</b><br /> 
        I am a Nigerian<br />
        I am a graduate of Information Technology/Business Information Systems<br />
        I am an optimist and a go-getter<br />
        I desire to be a web developer<br />
        I desire to be a techpreneur.</div><br /></center>
    </div>
    <script type="text/javascript" src="https://static.oracle.com/cdn/jet/v5.0.0/3rdparty/require/require.js"></script>

<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/default/js"></script>

<script type="text/javascript" src="https://static.oracle.com/cdn/jet/v@version@/3rdparty"></script>

<script type="text/javascript" src="../js/main.js"></script>

</body>
</html>


