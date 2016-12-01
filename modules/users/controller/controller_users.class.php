<?php

class controller_users {

  public function __construct() {
    include (FUNCTIONS_USERS . "functions_users.inc.php");
    include (UTILS . "upload.php");

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
        'password' => $result['datos']['password'],
        'repeat_password' => $result['datos']['repeat_password'],
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
  }

  public function upload(){
    if ((isset($_POST["upload"])) && ($_POST["upload"] == true)) {

      $result_avatar = upload_files();

      $_SESSION['result_avatar'] = $result_avatar;
      exit;
    }
  }

  public function delete(){
    if ((isset($_POST["delete"])) && ($_POST["delete"] == true)) {

      $result = remove_files();

      if ($result === true){
        echo json_encode(array("res" => true));
      }else{
        echo json_encode(array("res" => false));
      }

    }
  }

  public function load_users(){
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
  }


  public function load_pais(){
    if((isset($_POST["pais"])) && ($_POST["pais"] == true)){

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
        echo $json;
        exit;
      }else{
        $json = "error";
        echo $json;
        exit;
      }
    }
  }
  /////////////////////////////////////////////////// load_provincias
  public function load_provincias(){
    if(  (isset($_POST["provincias"])) && ($_POST["provincias"] == true)  ){
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
  public function idPoblac(){
    if(  isset($_POST['idPoblac']) ){
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
