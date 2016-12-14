<?php
class userDAO {

  static $_instance;

  private function __construct() {

  }

  public static function getInstance() {
    if (!(self::$_instance instanceof self))
    self::$_instance = new self();
    return self::$_instance;
  }


  public function create_user_DAO($db, $arrArgument) {
    $name = $arrArgument['name'];
    $surname = $arrArgument['surname'];
    $id_document = $arrArgument['id_document'];
    $phone = $arrArgument['phone'];
    $email = $arrArgument['email'];
    $password = $arrArgument['password'];
    $repeat_password = $arrArgument['repeat_password'];
    $interests = $arrArgument['interests'];
    $gender = $arrArgument['gender'];
    $date_birthday = $arrArgument['date_birthday'];
    $avatar = $arrArgument['avatar'];
    $pais = $arrArgument['pais'];
    $provincia = $arrArgument['provincia'];
    $poblacion = $arrArgument['poblacion'];



    $internet = 0;
    $art = 0;
    $technology = 0;
    $literature = 0;
    $music = 0;
    $other = 0;


    foreach ($interests as $indice) {
      if ($indice === 'internet')
      $internet = 1;
      if ($indice === 'art')
      $art = 1;
      if ($indice === 'technology')
      $technology = 1;
      if ($indice === 'literature')
      $literature = 1;
      if ($indice === 'music')
      $music = 1;
      if ($indice === 'other')
      $other = 1;
    }


    $male = 0;
    $female = 0;
    $undefined = 0;


    foreach ($gender as $indi) {
      if ($indi === 'male')
      $male = 1;
      if ($indi === 'female')
      $female = 1;
      if ($indi === 'undefined')
      $undefined = 1;
    }


    $sql= "INSERT INTO users (name, surname, id_document, phone, "
    . "email, password, repeat_password, internet, art, technology, literature, "
    . "music, other, male, female, undefined, date_birthday, pais, provincia, poblacion, avatar) "
    . "VALUES ('$name', '$surname', '$id_document', '$phone', '$email', '$password', '$repeat_password', '$internet', '$art', '$technology', '$literature', "
    . "'$music', '$other', '$male', '$female', '$undefined', '$date_birthday', '$pais', '$provincia', '$poblacion', '$avatar')";


    return $db->ejecutar($sql);

  }

  public function obtain_paises_DAO($url) {
    //init_set('display_errors', 1);
    $ch = curl_init();
    curl_setopt ($ch, CURLOPT_URL, $url);
    curl_setopt ($ch, CURLOPT_RETURNTRANSFER, 1);
    //curl_setopt ($ch, CURLOPT_CONNECTTIMEOUT, $timeout);
    $file_contents = curl_exec($ch);
    curl_close($ch);

    return ($file_contents) ? $file_contents : FALSE;
  }

  public function obtain_provincias_DAO() {
    $json = array();
    $tmp = array();

    $provincias = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . "/workspace/resources/provinciasypoblaciones.xml");
    $result = $provincias->xpath("/lista/provincia/nombre | /lista/provincia/@id");
    for ($i=0; $i<count($result); $i+=2) {
      $e=$i+1;
      $provincia=$result[$e];

      $tmp = array(
        'id' => (string) $result[$i], 'nombre' => (string) $provincia
      );
      array_push($json, $tmp);
    }
    return $json;
  }

  public function obtain_poblaciones_DAO($arrArgument) {
    $json = array();
    $tmp = array();

    $filter = (string)$arrArgument;
    $xml = simplexml_load_file($_SERVER['DOCUMENT_ROOT'] . '/workspace/resources/provinciasypoblaciones.xml');
    $result = $xml->xpath("/lista/provincia[@id='$filter']/localidades");

    for ($i=0; $i<count($result[0]); $i++) {
      $tmp = array(
        'poblacion' => (string) $result[0]->localidad[$i]
      );
      array_push($json, $tmp);
    }
    return $json;
  }

  /*
  *  LOGIN
  */

  public function count_DAO($db, $arrArgument) {
    /* $arrArgument is composed by 2 array ("column" and "like"), this iterates
    * the number of positions the array have, this way we get a method that builds a
    * custom sql to select with the needed arguments
    */
    $i = count($arrArgument['column']);

    $sql = "SELECT COUNT(*) as total FROM users WHERE ";

    for ($j = 0; $j < $i; $j++) {
      if ($i > 1 && $j != 0)
      $sql.=" AND ";
      $sql .= $arrArgument['column'][$j] . " like '" . $arrArgument['like'][$j] . "'";
    }

    $stmt = $db->ejecutar($sql);
    return $db->listar($stmt);
  }

  public function select_DAO($db, $arrArgument) {


    $i = count($arrArgument['column']); //email
    $k = count($arrArgument['field']); //password
    $sql1 = "SELECT ";
    $sql2 = " FROM users WHERE ";

    for ($j = 0; $j < $i; $j++) {
      if ($i > 1 && $j != 0)
      $sql.=" AND ";
      $sql .= $arrArgument['column'][$j] . " like '" . $arrArgument['like'][$j] . "'";
    }

    for ($l = 0; $l < $k; $l++) {
      if ($l > 1 && $k != 0)
      $fields.=", ";
      $fields .= $arrArgument['field'][$l];
    }


    $sql = $sql1 . $fields . $sql2 . $sql;

    $stmt = $db->ejecutar($sql);

    return $db->listar($stmt);
  }


}
