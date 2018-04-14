<!DOCTYPE html>
<html>
  <head>
    <style>
    /* Desktop */

body {
    position: fixed;
    width: 100%;
    height: 100%;
    background: Blue;
}
/*    Hello World, HNG STAGE 3 */
p {
    position: absolute;
    align-items: center;
    justify-content: center;
    width: 100%;
    height: 100%;
    left: 25%;

    font-family: Roboto Slab;
    font-style: normal;
    font-weight: normal;
    line-height: normal;
    font-size: 50px;

    color: White;
}
/* Rectangle */
box {
    position: absolute;
    align-items: center;
    justify-content: center;
    left: 28%;
    top: 40%;
    font-size: 37px;
    color: white;
    padding: 50px;

    background: Brown;
}
</style>
    <title></title>
    <meta content="">
  </head>
  <body>
  <p>Hello World, HNG STAGE 3 </p>
  <box><?php
echo "Today's Date is " . date("F j, Y, g:i a") . "<br>";
?>
</box>
  </body>
</html>
