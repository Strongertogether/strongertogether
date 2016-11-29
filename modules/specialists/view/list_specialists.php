<script type="text/javascript" src="<?php echo SPECIALISTS_JS_LIB_PATH ?>jquery.bootpag.min.js"></script>
<script type="text/javascript" src="<?php echo SPECIALISTS_JS_PATH ?>list_specialists.js" ></script>
<section id='home' class='head-main-img'>
<div class='container'>
           <div class='row text-center pad-row' >
            <div class='col-md-12'>
              <h1> LIST SPECIALISTS </h1>
                </div>
               </div>
            </div>
       </section>
<br/><br/>
       <center>
         <div id='search-box'>
           <form name="search_prod" id="search_prod" class="search_prod">
           <input type="text" value="" placeholder="Search specialists ..." class="input_search" id="keyword" list="datalist">
           <input name="Submit" id="Submit" class="button_search" type="button" value="Search"/>
         </form>
       </div>
     </center>

<div id="results"></div>

<center>
    <div class="pagination"></div>
</center>


<section>
  <section>
      <div class="details" id="specialists">
              <div class="pull-left">
                  <div id="avatar" class="avatardetail"></div>
              </div>
              <div class="media-body">
                  <div id="text-product">
                  <h3 class="media-heading title-product"  id="name"></h3>
                  <p>
                  <div id="surname"></div>
                  </p>
                  <p class="text-limited" id="city" ></p>
                  <br>
                  <h5> <strong  id="specialty"></strong> </h5>
                  </div>

              </div>
      </div><br/><br/>
  </section>
