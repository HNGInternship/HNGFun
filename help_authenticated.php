<?php
include_once("header.php");
?>
<style>
  h2 {
    font-family: 'work sans';
  }

  .jumbotron {
    background: #E4E4E4;
  }

</style>
<main class="container-fluid row px-0 mx-0">
  <section class="col-sm-3">
    Side bar
  </section>
  <section class="col-sm-9 px-0">
    <div class="jumbotron jumbotron-fluid mb-5">
      <div class="mx-auto col-sm-9 col-md-7">
        <h2>Help Center</h2>
        <p class="text-center">What can we help you with?</p>
        <div class="row flex-wrap">
          <div class="col-sm-9">
            <input type="" class="form-control form-control-lg" name="">
          </div>
          
          <div class="col-sm-3">
            <input type="submit" class="btn btn-primary btn-block h-100" name="">
          </div>
        </div>
      </div>
    </div>

    <div class="col-sm-9 mx-auto d-flex justify-content-end align-items-center rounded-top border border-dark my-5">
       <span>FAQs</span>
    </div>
    <div class="col-sm-9 mx-auto d-flex justify-content-end my-5 mx-0 pr-0">
       <div class="col-sm-3 px-0">
         <button class="btn btn-primary btn-block rounded-0">Private Key</button>
         <button class="btn btn-primary btn-block rounded-0">Accolades</button>
       </div>
       
        <div class="accordion col-sm-9 bg-grey mx-0 px-0" id="accordion">
          <div class="card">
            <div class="card-header" id="headingOne">
              <h5 class="mb-0">
                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                  Collapsible Group Item #1
                </button>
              </h5>
            </div>

            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
              <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingTwo">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                  Collapsible Group Item #2
                </button>
              </h5>
            </div>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
              <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>
          <div class="card">
            <div class="card-header" id="headingThree">
              <h5 class="mb-0">
                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                  Collapsible Group Item #3
                </button>
              </h5>
            </div>
            <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordion">
              <div class="card-body">
                Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
              </div>
            </div>
          </div>
        </div>
    </div>

    <h4 class="text-center">We would like to hear from you</h4>
    <div class="col-sm-9 mx-auto row border border-dark">
      <div class="col-sm-9" style="margin: auto;">
        <input type="" class="form-control mb-3" name="" />
       <textarea class="form-control"></textarea>
       <button class="float-right">SEND</button>
      </div>
       
    </div>
  </section>
</main>
<?php
include_once("footer.php");
?>
