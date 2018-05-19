<?php
include_once("header.php");
?>
<style>

/* General styles */
main {
    position: relative;
}

header {

    padding-bottom: 0;
}

.hero {
    max-width: 640px;
    margin: 0 auto;

}

/*FAQ styles */

.jumbotron {

    background: #;
    text-align: center;
    color: #3D3D3D;
    border: 0;
    border-radius: 0;
    margin: 0;
    margin-bottom: 0;

}

 .bg-cover {
     background-size: cover;
     color: white;
     background-position: 0px -200px;
     position: relative;
     z-index: -2;
     background-image: url('./img/ask.jpg');
 }

 .overlay {
     background-color: #000;
     opacity: 0.5;
     position: absolute;
     top: 0;
     left: 0;
     bottom: 0;
     right: 0;
     z-index: -1;
 }

.faq-wrapper {
    /* border: 1px solid #4f4f4f; */
    margin: 3em 0 3em;
    padding: 0.8em;
    border-top-right-radius: 5px;
    border-top-left-radius: 5px;
    text-align: right;
    max-width: 1185px;
    background: #f4f4f4;
    border-bottom: 2px solid #0598ec;


}

.wrap {
    background: #fafafa;
    padding-left: 0.56em;
    max-width: 1185px;
}

.answers {
    margin-bottom: 2em;


}

.faq-wrapper h5 {
    text-transform: uppercase;
    padding: 18px;
     text-align: center;
     font-size: 2em;
     font-weight: 700;

}

.faq-h5 {
    text-align: center;
    font-weight: 200;
    padding-bottom: .7em;

}

.btn-q {
    background: #f2f2f2;
    color: #3d3d3d;
    text-align: left;
    border: 0;
    padding-right: 0;
    padding-bottom: 2em;
}



.nav-btn {
    color: red;
    z-index: 1001;
    position: fixed;
    top: 100px;
    left: 0;
    cursor: pointer;
    background: #ffffff;
    padding: 4px 8px;
}

.img-box {
   font-size: 4em;
    text-align: center;
    border: 1px solid #3d3d3d;
    background: #f2f2f2;
    margin-bottom: 5px;
}

.answers card {
    margin-right: 0;
}

.answers .col-sm-2 {
    padding-right: 4px;
    padding-left: 2px;

}

.answers .col {
    padding-left: 0;
}

.answers #accordion .card {
    border: none;
    margin: 0 5px 5px;
}

.answers #accordion .card .row {
    margin-left: 0;
    margin-right: 0;
}

.answers #accordion .card .col {
    padding-right: 7px;
}

.card-header h5.mb-0 {
    max-width: 240px;
}

.answers #accordion .card-header {
    background: #f2f2f2;
    height: 6.1em;
    border: 1px solid #3d3d3d;
    padding-left: .25em;
    border-radius: 0;
}

.answers #accordion .card-body {
    height: 330px;
    font-size: 16px;

}

i.fa.fa-bars {
    color: #3d3d3d !important;
}
.hero input[type="text"]{
    padding: 10px;
    padding-left: 50px;
    margin-left: 10px;
    border: 1px solid #3d3d3d;
}



@media(max-width: 568px) {
    .btn-q {
        padding-left: 0;
        width: 370px;
    }
}


</style>


<header class="jumbotron bg-cover">
<div class="overlay"></div>
<div class="hero">
 <h1>Help Center</h1>
    <p>What Can we help you with ?</p>
</div>
</header>
<main class="">
    <section class="container">
        <div class="faq-wrapper">
            <h5>faq's</h5>
        </div>
        <div class="answers wrap">
            <div class="row">
                <div class="col" id="tab2">
                <div id="accordion">
                  <div class="card">
                    <div class="row">
                    <div class="col-sm-2">
                        <div class="img-top img-box"><i class="fa fa-database"></i></div>
                    </div>
                    <div class="col">
                        <div class="card-header" id="headingOne">

                        <h5 class="mb-0">
                            <button class="btn-q btn" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                             Will I be awarded a certificate after this internship?
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
                    </div>
                  </div><!-- end of Card -->

                  <div class="card">
                  <div class="row">
                      <div class="col-sm-2">
                        <div class="img-top img-box"><i class="fa fa-question"></i></div>
                      </div>
                      <div class="col">
                            <div class="card-header" id="headingTwo">
                                <h5 class="mb-0">
                                    <button class="btn-q btn collapsed" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                    Is this internship program open for only Nigerians?
                                    <i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                                <div class="card-body">
                                    No, no at all. The HNG internship program is open for residents of African countries. We believe by creating an equal opportunity, we not only create human resource value by equipping our interns with the proper technical skills, we also make them employable thereby creating an adequately skilled, qualified workforce in Africa.

                                </div>
                            </div>
                        </div><!-- end of col-->

                      </div>
                  </div><!-- end of card-->

                  <div class="card">
                  <div class="row">
                        <div class="col-sm-2">
                            <div class="img-top img-box"><i class="fa fa-search"></i></div>
                        </div>
                      <div class="col">
                            <div class="card-header" id="headingThree">
                                <h5 class="mb-0">
                                    <button class="btn-q btn collapsed" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                    Do I need any prior programming experience to join?<i class="fa fa-chevron-down" aria-hidden="true"></i>
                                    </button>
                                </h5>
                            </div>
                            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
                                <div class="card-body">
                                    The HNG internship is open for beginners with little or no experience in design, programming or DevOps. Once you are self driven and motivated to learn, you are good to go!
                                </div>
                            </div>
                      </div><!-- end of col -->
                  </div>

                  </div><!-- end of card-->
                  <div class="card">
                    <div class="row">
                        <div class="col-sm-2">
                             <div class="img-top img-box"><i class="fa fa-key"></i></div>
                        </div>
                        <div class="col">
                            <div class="card-header" id="headingfour">
                            <h5 class="mb-0">
                                <button  class="btn-q btn collapsed" data-toggle="collapse" data-target="#collapsefour" aria-expanded="false" aria-controls="collapsefour">
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
                </div>
                </div>
            </div><!-- end of accordion -->
        </div>
    </section>

</main>



<?php
include_once("footer.php");

?>
