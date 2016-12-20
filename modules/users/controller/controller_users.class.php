<?php

class controller_users {

  public function __construct() {
    include (FUNCTIONS_USERS . "functions_users.inc.php");
    include (LIBS.'password_compat-master/lib/password.php');
    include (UTILS . "upload.inc.php");

    if(!isset($_SESSION)){
      session_start();
    }
  }

  public function results_users() {
    require_once(VIEW_PATH_INC."header.php");
    require_once(VIEW_PATH_INC."menu.php");

    loadView('modules/users/view/', 'results_users.php');

    require_once(VIEW_PATH_INC."footer.php");
  }

  public function users() {
    require_once(VIEW_PATH_INC."header.php");
    require_once(VIEW_PATH_INC."menu.php");

    loadView('modules/users/view/', 'create_users.php');

    require_once(VIEW_PATH_INC."footer.php");
  }

  //vista sing in
  public function modal() {
    require_once(VIEW_PATH_INC."header.php");
    require_once(VIEW_PATH_INC."menu.php");

    loadView('modules/users/view/', 'modal.php');

    require_once(VIEW_PATH_INC."footer.php");
  }
  //vista sign up
  public function signup() {
    require_once(VIEW_PATH_INC."header.php");
    require_once(VIEW_PATH_INC."menu.php");

    loadView('modules/users/view/', 'signup.php');

    require_once(VIEW_PATH_INC."footer.php");
  }

  //vista restore password
  public function restorepass() {
    require_once(VIEW_PATH_INC."header.php");
    require_once(VIEW_PATH_INC."menu.php");

    loadView('modules/users/view/', 'restorepass.php');

    require_once(VIEW_PATH_INC."footer.php");
  }

  //vista restore password
  public function newpass() {
    if (substr($_GET['param'], 0, 3) == "Cha") {
      require_once(VIEW_PATH_INC."header.php");
      require_once(VIEW_PATH_INC."menu.php");

      loadView('modules/users/view/', 'newpass.php');

      require_once(VIEW_PATH_INC."footer.php");
    } else {
        showErrorPage(1, "", 'HTTP/1.0 503 Service Unavailable', 503);
    }
  }

  //vista profile
  public function profile() {
    require_once(VIEW_PATH_INC."header.php");
    require_once(VIEW_PATH_INC."menu.php");

    loadView('modules/users/view/', 'profile.php');

    require_once(VIEW_PATH_INC."footer.php");
  }
  /*
  SIGN UP
  */

    public function signup_user() {

      $jsondata = array();
      $userJSON = json_decode($_POST['signup_user_json'], true);

      $result = validate_userPHP($userJSON);

      if ($result['resultado']) {
          $avatar = get_gravatar($result['datos']['email'], $s = 400, $d = 'identicon', $r = 'g', $img = false, $atts = array());

          $arrArgument = array(
              'email' => $result['datos']['email'],
              'password' => password_hash($result['datos']['password'], PASSWORD_BCRYPT),
              'repeat_password'=> password_hash($result['datos']['repeat_password'], PASSWORD_BCRYPT),
              'token' => '',
              'activado' => 0,
              'tipo' => "client",
              'avatar' => $avatar

          );
          // Control de registro
          set_error_handler('ErrorHandler');
          try {
              //loadModel
                  $arrValue = loadModel(MODEL_USERS, "users_model", "count", array('column' => array('email'), 'like' => array($arrArgument['email'])));

                  if ($arrValue[0]['total'] == 1) {
                      $arrValue = false;
                      $typeErr = 'Email';
                      $error = "Email already registered";
                  }
          } catch (Exception $e) {
              $arrValue = false;
          }

          restore_error_handler();
          // Fin de control de registro

          if ($arrValue) {
              set_error_handler('ErrorHandler');
              try {
                  //loadModel
                  $arrArgument['token'] = "Ver" . md5(uniqid(rand(), true));
                  $arrValue = loadModel(MODEL_USERS, "users_model", "create_user", $arrArgument);
              } catch (Exception $e) {
                  $arrValue = false;
              }
              restore_error_handler();

              if ($arrValue) {
                  sendtoken($arrArgument,"alta");
                  $url = amigable('?module=main&function=begin&param=reg', true);
                  $jsondata["success"] = true;
                  $jsondata["redirect"] = $url;
                  echo json_encode($jsondata);
                  exit;
              } else {
                  $url = amigable('?module=main&function=begin&param=503', true);
                  $jsondata["success"] = true;
                  $jsondata["redirect"] = $url;
                  echo json_encode($jsondata);
              }
          } else {
              $jsondata["success"] = false;
              $jsondata['typeErr'] = $typeErr;
              $jsondata["error"] = $error;
              echo json_encode($jsondata);
          }
      } else {
          $jsondata["success"] = false;
          $jsondata['datos'] = $result;
          echo json_encode($jsondata);
      }

  }

  public function verify(){
        if (substr($_GET['param'], 0, 3) == 'Ver') {
            $arrArgument = array(
              'column' => array('token'),
              'like' => array($_GET['param']),
              'field' => array('activado'),
              'new' => array('1'),
          );

            set_error_handler('ErrorHandler');
            try {
                $value = loadModel(MODEL_USERS, 'users_model', 'update', $arrArgument);
            } catch (Exception $e) {
                $value = false;
            }
            restore_error_handler();

            if ($value) {
              require_once(VIEW_PATH_INC."header.php");
              require_once(VIEW_PATH_INC."menu.php");

              loadView('modules/main/view/', 'main.html');

              require_once(VIEW_PATH_INC."footer.php");

            } else {
                showErrorPage(1, '', 'HTTP/1.0 503 Service Unavailable', 503);
            }
        }
    }
       ////////////end signup///////////

       ///////restore password/////////
       //Envia un email para cambiar la contraseña
       public function process_restore() {
        $result = array();
        if (isset($_POST['inputEmail'])) {
            $result = validatemail($_POST['inputEmail']);
            if ($result) {
                $column = array(
                    'email'
                );
                $like = array(
                    $_POST['inputEmail']
                );
                $field = array(
                    'token'
                );

                $token = "Cha" . md5(uniqid(rand(), true));
                $new = array(
                    $token
                );

                $arrArgument = array(
                    'column' => $column,
                    'like' => $like,
                    'field' => $field,
                    'new' => $new
                );
                $arrValue = loadModel(MODEL_USERS, "users_model", "count", $arrArgument);
                if ($arrValue[0]['total'] == 1) {
                  set_error_handler('ErrorHandler');
                    $arrValue = loadModel(MODEL_USERS, "users_model", "update", $arrArgument);
                    if ($arrValue) {
                        //////////////// Envio del correo al usuario
                        $arrArgument = array(
                            'token' => $token,
                            'email' => $_POST['inputEmail']
                        );
                        if (sendtoken($arrArgument, "modificacion"))
                            echo "Tu nueva contraseña ha sido enviada al email";
                        else
                            echo "Error en el servidor. Intentelo más tarde";
                    }
                } else {
                    echo "El email introducido no existe ";
                }
            } else {
                echo "El email no es válido";
            }
        }
    }
    //cambiar la contraseña
    function update_pass() {
        $jsondata = array();
        $pass = json_decode($_POST['passw'], true);
        $arrArgument = array(
            'column' => array('token'),
            'like' => array($pass['token']),
            'field' => array('password'),
            'new' => array(password_hash($pass['password'], PASSWORD_BCRYPT))
        );

        set_error_handler('ErrorHandler');
        try {
            $value = loadModel(MODEL_USERS, "users_model", "update", $arrArgument);
        } catch (Exception $e) {
            $value = false;
        }
        restore_error_handler();
        if ($value) {
            $url = amigable('?module=main&function=begin&param=rest', true);
            $jsondata["success"] = true;
            $jsondata["redirect"] = $url;
            echo json_encode($jsondata);
            exit;
        } else {
            $url = amigable('?module=main&function=begin&param=503', true);
            $jsondata["success"] = true;
            $jsondata["redirect"] = $url;
            echo json_encode($jsondata);
            exit;
        }
    }
    ///end restore password/////
/////////PROFILE////////////////

function profile_filler() {

        if (isset($_POST['usuario'])) {
            set_error_handler('ErrorHandler');
            try {
                $arrValue = loadModel(MODEL_USERS, "users_model", "select", array(column => array('email'), like => array($_POST['usuario']), field => array('*')));
            } catch (Exception $e) {
                $arrValue = false;
            }
            restore_error_handler();

            if ($arrValue) {
                $jsondata["success"] = true;
                $jsondata['user'] = $arrValue[0];
                echo json_encode($jsondata);
                exit();
            } else {
                $url = amigable('?module=main', true);
                $jsondata["success"] = false;
                $jsondata['redirect'] = $url;
                echo json_encode($jsondata);
                exit();
            }
        } else {
            $url = amigable('?module=main', true);
            $jsondata["success"] = false;
            $jsondata['redirect'] = $url;
            echo json_encode($jsondata);
            exit();
        }
    }

/////////END PROFILE///////////

function modify() {

      $jsondata = array();
      $userJSON = json_decode($_POST['mod_user_json'], true);
      //$userJSON['repeat_password'] = $userJSON['password'];

      $result = validate_userPHP($userJSON);
      if ($result['resultado']) {
          $arrArgument = array(
            'name' => ucfirst($result['datos']['name']),
            'surname' => ucfirst($result['datos']['surname']),
            'id_document' => $result['datos']['id_document'],
            'phone' => $result['datos']['phone'],
            'email' => $result['datos']['email'],
            'password' => password_hash($result['datos']['password'], PASSWORD_BCRYPT),
            'interests' => $result['datos']['interests'],
            'gender' => $result['datos']['gender'],
            'date_birthday' => $result['datos']['date_birthday'],
            'pais' => $result['datos']['pais'],
            'provincia' => $result['datos']['provincia'],
            'poblacion' => $result['datos']['poblacion'],
            'avatar' => $_SESSION['avatar']['datos'],

          );
          $arrayDatos = array(
              column => array(
                  'email'
              ),
              like => array(
                  $arrArgument['email']
              )
          );
          $j = 0;
          foreach ($arrArgument as $clave => $valor) {
              if ($valor != "") {
                  $arrayDatos['field'][$j] = $clave;
                  $arrayDatos['new'][$j] = $valor;
                  $j++;
              }
          }

          set_error_handler('ErrorHandler');
          try {
              $arrValue = loadModel(MODEL_USERS, "users_model", "update", $arrayDatos);
          } catch (Exception $e) {
              $arrValue = false;
          }
          restore_error_handler();
          if ($arrValue) {
              $url = amigable('?module=users&function=profile&param=done', true);
              $jsondata["success"] = true;
              $jsondata["redirect"] = $url;
              echo json_encode($jsondata);
              exit;
          } else {
              $jsondata["success"] = false;
              $jsondata["redirect"] = $url = amigable('?module=users&function=profile&param=503', true);
              echo json_encode($jsondata);
          }
      } else {
          $jsondata["success"] = false;
          $jsondata['datos'] = $result;
          echo json_encode($jsondata);
      }
  }

/*
 *  LOGIN
 */
 public function login() {
   //$user es un array que conte contrasenya i usuari que li introduim (pass usuario)
    $user = json_decode($_POST['login_json'], true);
    //echo json_encode($_POST['login_json']);
    //exit;
  //un array que du "usuario"
    $column = array(
        'email'
    );
  //conte el nom del usuari que li introduim
    $like = array(
        $user['usuario']
    );
  //array que conte camp usuario, password i el nom usuario que li passem nosaltres
    $arrArgument = array(
        'column' => $column,
        'like' => $like,
        'field' => array('password')
    );
    set_error_handler('ErrorHandler');
    try {
        //loadModel
        $arrValue = loadModel(MODEL_USERS, "users_model", "select", $arrArgument);
        $arrValue = password_verify($user['pass'], $arrValue[0]['password']);

    } catch (Exception $e) {
        $arrValue = "error";
    }
    restore_error_handler();
    if ($arrValue !== "error") {
        if ($arrValue) { //OK

            set_error_handler('ErrorHandler');
            try {
                $arrArgument = array(
                    'column' => array("email", "activado"),
                    'like' => array($user['usuario'], "1")
                );
                $arrValue = loadModel(MODEL_USERS, "users_model", "count", $arrArgument);
                if ($arrValue[0]["total"] == 1) {
                    $arrArgument = array(
                        'column' => array("email"),
                        'like' => array($user['usuario']),
                        'field' => array('*')
                    );
                    $user = loadModel(MODEL_USERS, "users_model", "select", $arrArgument);

                    echo json_encode($user);
                    exit();
                } else {
                    $value = array(
                        "error" => true,
                        "datos" => "El usuario no ha sido activado, revise su correo"
                    );
                    echo json_encode($value);
                    exit();
                }
            } catch (Exception $e) {
                $value = array(
                    "error" => true,
                    "datos" => 503
                );
                echo json_encode($value);
            }
        } else {
            $value = array(
                "error" => true,
                "datos" => "El usuario y la contraseña no coinciden"
            );
            echo json_encode($value);
        }
    } else {
        $value = array(
            "error" => true,
            "datos" => 503
        );
        echo json_encode($value);
    }
}
/*
  public function alta_users_json(){
    if ((isset($_POST['alta_users_json']))) {
      alta_users();
    }
  }

  public function alta_users() {
    $jsondata = array();
    $usersJSON = json_decode($_POST["alta_users_json"], true);
    $result = validate_user($usersJSON);
    if (empty($_SESSION['result_avatar'])) {
      $_SESSION['result_avatar'] = array('resultado' => true, 'error' => "", 'datos' => 'media/default-avatar.png');
    }
    $result_avatar = $_SESSION['result_avatar'];
    if (($result['resultado']) && ($result_avatar['resultado'])) {
      $arrArgument = array(
        'name' => ucfirst($result['datos']['name']),
        'surname' => ucfirst($result['datos']['surname']),
        'id_document' => $result['datos']['id_document'],
        'phone' => $result['datos']['phone'],
        'email' => $result['datos']['email'],
        //'password' => $result['datos']['password'],
        'password' => password_hash($result['datos']['password'], PASSWORD_BCRYPT),
        'repeat_password' => password_hash($result['datos']['repeat_password'], PASSWORD_BCRYPT),
        'interests' => $result['datos']['interests'],
        'gender' => $result['datos']['gender'],
        'date_birthday' => $result['datos']['date_birthday'],
        'pais' => $result['datos']['pais'],
        'provincia' => $result['datos']['provincia'],
        'poblacion' => $result['datos']['poblacion'],
        'avatar' => $result_avatar['datos']
      );
      $arrValue = false;
      $arrValue = loadModel(MODEL_USERS, "users_model", "create_user", $arrArgument);
      if ($arrValue){
        $mensaje = "Su registro se ha efectuado correctamente, para finalizar compruebe que ha recibido un correo de validacion y siga sus instrucciones";
      }else{
        $mensaje = "No se ha podido realizar su alta. Intentelo mas tarde";
      }
      //redirigir a otra p�gina con los datos de $arrArgument y $mensaje
      $_SESSION['user'] = $arrArgument;
      $_SESSION['msje'] = $mensaje;
      $callback="../../users/results_users/";
      $jsondata["success"] = true;
      $jsondata["redirect"] = $callback;
      echo json_encode($jsondata);
      exit;
    } else {
      $jsondata["success"] = false;
      $jsondata["error"] = $result['error'];
      $jsondata["error_avatar"] = $result_avatar['error'];
      $jsondata["success1"] = false;
      if ($result_avatar['resultado']) {
        $jsondata["success1"] = true;
        $jsondata["img_avatar"] = $result_avatar['datos'];
      }
      header('HTTP/1.0 400 Bad error');
      echo json_encode($jsondata);
    }
  }*/

  public function upload(){
      $result_avatar = upload_files();
       $_SESSION['avatar'] = $result_avatar;
  }
  public function delete(){
    $_SESSION['avatar'] = array();
    $result = remove_files();
    if ($result === true) {
        echo json_encode(array("res" => true));
    } else {
        echo json_encode(array("res" => false));
    }
  }

  /*public function load_users(){
    if (isset($_POST["load"]) && $_POST["load"] == true) {
      $jsondata = array();
      if (isset($_SESSION['user'])) {
        $jsondata["user"] = $_SESSION['user'];
      }
      if (isset($_SESSION['msje'])) {
        $jsondata["msje"] = $_SESSION['msje'];
      }
      close_session();
      echo json_encode($jsondata);
      exit;
    }
  }*/

  public function load_pais(){
    if((isset($_GET["param"])) && ($_GET["param"] == true)){
      $json = array();
      $url = 'http://www.oorsprong.org/websamples.countryinfo/CountryInfoService.wso/ListOfCountryNamesByName/JSON';
      function url_exists($url){
        $file_headers = @get_headers($url);
        if(strpos($file_headers[0], "200 OK")==false){
          $exists = false;
        }else{
          $json = loadModel(MODEL_USERS, 'users_model', "obtain_paises", $url);
          $exists = true;
        }
        return $exists;
      }
      if($json){
        if (preg_match('/Error/',$json)) {
          $json = "error";
        }
        echo $json;
        //exit;
      }else{
        $json = "error";
        echo $json;
        exit;
      }
    }
  }
  /////////////////////////////////////////////////// load_provincias
  public function load_provincias(){
    if(  (isset($_GET["param"])) && ($_GET["param"] == true)  ){
      $jsondata = array();
      $json = array();
      $json = loadModel(MODEL_USERS, 'users_model', "obtain_provincias");
      if($json){
        $jsondata["provincias"] = $json;
        echo json_encode($jsondata);
        exit;
      }else{
        $jsondata["provincias"] = "error";
        echo json_encode($jsondata);
        exit;
      }
    }
  }
  /////////////////////////////////////////////////// load_poblaciones
  public function load_poblaciones(){
    if(isset($_POST['idPoblac'])){
      $jsondata = array();
      $json = array();
      $json = loadModel(MODEL_USERS, 'users_model', "obtain_poblaciones", $_POST['idPoblac']);
      if($json){
        $jsondata["poblaciones"] = $json;
        echo json_encode($jsondata);
        exit;
      }else{
        $jsondata["poblaciones"] = "error";
        echo json_encode($jsondata);
        exit;
      }
    }
  }
}
