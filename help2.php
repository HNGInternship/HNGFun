<?php
include_once("header.php");
?>

<style>
    body {
        /* background-color: firebrick; */
        font-family: 'Fruktur';
        background: #ffffff !important;
    }

    .whole-background {
        height: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
    }

    .container-fluid {
        padding: 20px;
        color: #fff;
    }

    .header-font-one {
        font-size: large;
        font-family: "serif";
        color: white;
    }

    .header-font-one h2{
        padding-top: 38px;
        color: #ffffff;
    }

    .form-control {

        border: 1px solid #48BBFC !important;
        color: #48BBFC;
        text-align: center;
        margin: 0 auto;
        padding: .9rem 0;
        font-size: 16px;
    }


    .search-container > form {
        margin-top: 1em;
        margin-bottom: 3em;
    }

    .header-font-two {
        font-size: small;
        font-family: "Apple Color Emoji";
        text-align: center;

    }

    .search-container {
        height: 165px;
        width: 100%;
        justify-content: center;
    }

    input[type="text"]#help-search::-webkit-input-placeholder { /* Chrome */
        color: #48BBFC !important;
    }
    input[type="text"]#help-search:-ms-input-placeholder { /* IE 10+ */
        color: #48BBFC !important;
    }
    input[type="text"]#help-search::-moz-placeholder { /* Firefox 19+ */
        color: #48BBFC !important;
        opacity: 1;
    }
    input[type="text"]#help-search:-moz-placeholder { /* Firefox 4 - 18 */
        color: #48BBFC !important;
        opacity: 1;
    }

    #help-search{
        width: 47%;
    }

    .header-container {
        height: 200px;
        width: 100%;
        background-color: #3fb3fa;
        justify-content: center;
    }

    .faq-container {
        position: relative;
        background: #2196F3;
        padding-left: 2.7em;
        padding-right: 2em;
        margin-bottom: 2em;
    }

    .faq-container .col.text-left > h2 {
        color: #ffffff;
        padding-left: 18px;
    }

    .card {
        background: #2196F3;
        border: none;
        border-radius: 0;

    }

    .card-header{
        background-color: #2196F3;
        color: #ffffff;
        border: none;
    }

    .card-header button {
        color: #ffffff;
        text-transform: none;
    }

    .btn {
        padding: 0;
    }

    i.fa.fa-chevron-down {
        color: #ffffff !important;
        padding-left: 24px;
    }


    .contact-container > h4{
        margin-bottom: 1em;
        color: #2196F3;
        text-align: center;

    }

    .closing {
        display: none;
        transition: transform 80000ms ease-in-out 10ms;
    }

    .collapse.closing {
        translateY: -10%
 transition: transform 80000ms ease-in-out 10ms;
    }


    .faq-container img {

        display: inline-block;
         max-width: 165px;

    }

    button.btn.btn-link {
        font-weight: 300;
        font-size: .9em;

    }

    .form-wrapper {
       display: block;
        max-width: 30em;
        padding: 4em 1.8em 4.2em;
        margin: 0 auto;
        border: 1px solid #48BBFC;
        border-radius: .25em;

    }

    .form-wrapper  label {
        text-align: left;
         color: #5F5F5F;
         font-size: 0.9em;
    }

    .form-wrapper input[type="email"] {
        margin-bottom: 2em;
    }

    .contact-container button.btn.btn-lg {
        margin: 0;
        display: inline-block;
        margin-top: 1.2em;
        color: #ffffff;
        background: #2196F3;
        padding: .35em 1.75em;
        border-radius: .25em;
        font-weight: 300;
        text-align: right !important;
    }


      #help-send {

       text-align: right !important;
       float: right;


  }

  button#help-send:after {

      display: table;
      clear: both;

  }

    @media (max-width: 670px) {
        .faq-container img {
            display: none;
        }
    }

    @media (min-width: 740px) {
        .faq-container img {
            padding-left: 30px;
       max-width: 230px;
        }
    }

</style>
<main>
    <div>	
        <section class="header-container text-center">
            <div class="header-font-one">
                <h2>Help Lab</h2>
                <p>What Can we help you with</p>
            </div>
        </section>

    </div>
    <section class="container-fluid search-container">
          <form action="">
            <input id="help-search" type="text" placeholder="...Search for a problem" class="form-control">
        </form>
    </section>
    <section class="container-fluid faq-container">
        <div class="row">
              <div class="col text-left">
                <h2 class="text-left">FAQ</h2>
                <div id="accordion">
                  <div class="card">
                    <div class="card-header" id="headingOne">
                      <h5 class="mb-0">
                        <button class="btn btn-link" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                          Would I be awarded a certificate after this internship?
                         <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </button>
                      </h5>
                    </div>

                    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                        <div class="card-body">
                            <div id="#collapseOne">
                              We do not currently issue certificates to participants but we hope to do that in the future.

                            </div>
                        </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingTwo">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                          Is this internship program open for only Nigerians?
                         <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </button>
                      </h5>
                    </div>
                    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                      <div class="card-body">
                        No, not at all. The HNG internship program is open for residents of African countries. We believe by creating an equal opportunity, we not only create human resource value by equipping our interns with the proper technical skills, we also make them employable thereby creating an adequately skilled, qualified workforce in Africa.

                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingThree">
                      <h5 class="mb-0">
                        <button class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                          Do I need any prior programming experience to join?<i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </button>
                      </h5>
                    </div>
                    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                      <div class="card-body">
                        The HNG internship is open for beginners with little or no experience in design, programming or DevOps. Once you are self driven and motivated to learn, you are good to go!
                      </div>
                    </div>
                  </div>
                  <div class="card">
                    <div class="card-header" id="headingfour">
                      <h5 class="mb-0">
                        <button  class="btn btn-link collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
                          What are the basic requirements for this program?
                          <i class="fa fa-chevron-down" aria-hidden="true"></i>
                        </button>
                      </h5>
                    </div>
                    <div id="collapsefour" class="collapse" aria-labelledby="headingfour" data-parent="#accordion">
                      <div class="card-body">
                        These are some basic prerequisites for this program: <br><br>1. You are self driven and motivated to learn. Participation in this program requires consistently meeting the deadlines.<br><br>
                                2. You have access to a computer with broadband connection, on which you will install a professional code/text editor.<br><br>
                                3. You are willing to contribute to the success of the program, including collaborating with fellow interns. <br><br>
                        4. You approach problem solving strategically and can clearly communicate your strategy.

                      </div>
                    </div>
                  </div>
                </div>
            </div>
            <div class="col text-right">
                <img src="img/conversation(1).png" alt="speech bubbles">
            </div>
        </div>
    </section>
    <section class="container-fluid  contact-container">
        <h4>We would like to hear from you</h4>
        <div class="form-wrapper">
            <form action="">
                <label class="text-left" for="email">Email address</label>
                <input type="email" name="email" class="form-control">

                <label class="text-left" for="email">Description</label>
                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                <button id="help-send" class="btn btn-lg">send</button>

            </form>
        </div>

    </section>

</main>



<?php
include_once("footer.php");
function custom_scripts() {

       $script = "<script>
       (function(){
           var check = 0;
          //  $('.panel-title').click(function(){

              //  $('.collapse').collapse('toggle');

            })

       })();
        </script>";

        echo $script;
};
?>
