<?php
function paint_template_error($message) {
    $log = log::getInstance();
    $log->add_log_general("error paint_template_error", "specialists", "response" . http_response_code()); //$text, $controller, $function
    $log->add_log_specialists("error paint_template_error", "", "specialists", "response" . http_response_code()); //$msg, $username = "", $controller, $function

    print( "<section id='error' class='container'>");
    print('<div id="page">');

    print('<div id="header" class="status' . http_response_code() . '>');

    if (isset($message) && !empty($message)) {
        print( '<h1>ERROR ' . http_response_code() . ' - ' . $message . '</h1>');
    }

    print('</div>');
    print('<div id="content">');
    print('<h2>The following error occurred:</h2>');
    print('<p>The requested URL was not found on this server.</p>');
    print('<P>Please check the URL or contact the webmaster.</p>');
    print('</div>');
    print('<div id="footererr">');
    print('<p>Powered by <a href="http://www.ispconfig.org">ISPConfig</a></p>');
    print('</div>');
    print('</div>');
    print('</section>');

}

function paint_template_products($arrData) {
    print ("<script type='text/javascript' src='". SPECIALISTS_JS_PATH . "modal_specialists.js'></script>");
    print('<section id="services" >');
    print('<div class="container">');
    print('<div class="table-display">');

    if (isset($arrData) && !empty($arrData)) {
        $i = 0;
        foreach ($arrData as $product) {

            print( '<div class="table-row">');
            print('<div class="table-cell">');
            print ('<div class="id_specialist" id="'. $product['id'] .'">');
            print('<div class="pull-left">');
            print('<img src="' . $product['avatar'] . '" class="icon-md" height="80" width="80">');
            print('</div>');
            print('<div class="media-body">');
            print('<h3 class="name_product">' . $product['name'] . '</h3>');
            print('<p>' . $product['city'] . '</p>');
            print('<h5> <strong>Specialty:&nbsp' . $product['specialty'] . '</strong></h5>');
            print('</div>');
            print('</div>');
            print('<br>');
            print('</div>');
            print( '</div>');

        }
    }
    print ("</div>");
    print ("</div>");
    print ("</section>");
}
function paint_template_search($message) {
    $log = log::getInstance();
    $log->add_log_general("error paint_template_search", "specialists", "response " . http_response_code()); //$text, $controller, $function
    print ("<section> \n");
    print ("<div class='container'> \n");
    print ("<div class='row text-center pad-row'> \n");

    print ("<h2>" . $message . "</h2> \n");
    print ("<br><br><br><br> \n");

    print ("</div> \n");
    print ("</div> \n");
    print ("</section> \n");
}
