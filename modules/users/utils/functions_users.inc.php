<?php

function validate_userPHP($value) {
    $filtro = array(
        'email' => array(
            'filter' => FILTER_CALLBACK,
            'options' => 'validatemail'
        ),
        'password' => array(
            'filter' => FILTER_VALIDATE_REGEXP,
            'options' => array('regexp' => '/^.{6,12}$/')
        ),
    );
    $resultado = filter_var_array($value, $filtro);
    $resultado['repeat_password'] = $value['repeat_password'];

    $resultado = validateUsers($resultado);
    return $resultado;
}

function validateUsers($resultado) {
    if (!$resultado['email']) {
        $result['email'] = 'El email debe contener de 5 a 50 caracteres y debe ser un email valido';
        $result['resultado'] = false;

    } elseif (!$resultado['password'] || $resultado['password'] != $resultado['repeat_password']) {
        $result['password'] = 'Password debe tener de 6 a 12 caracteres y las dos contrasenyas deben ser iguales';
        $result['resultado'] = false;

  }else {
        $result['resultado'] = true;
        $result['datos']=$resultado;
    }
    return $result;
}

function get_gravatar($email, $s = 80, $d = 'wavatar', $r = 'g', $img = false, $atts = array()) {
    $email = trim($email);
    $email = strtolower($email);
    $email_hash = md5($email);

    $url = "https://www.gravatar.com/avatar/" . $email_hash;
    $url .= md5(strtolower(trim($email)));
    $url .= "?s=$s&d=$d&r=$r";
    if ($img) {
        $url = '<img src="' . $url . '"';
        foreach ($atts as $key => $val)
            $url .= ' ' . $key . '="' . $val . '"';
        $url .= ' />';
    }
    return $url;
}

function validatemail($email) {
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        if (filter_var($email, FILTER_VALIDATE_REGEXP, array('options' => array('regexp' => '/^.{5,50}$/')))) {
            return $email;
        }
    }
    return false;
}

function sendtoken($arrArgument,$type) {
    $mail = array(
        'type' => $type,
        'token' => $arrArgument['token'],
        'email' => $arrArgument['email']
    );
    set_error_handler('ErrorHandler');
    try {
        enviar_email($mail);
        return true;
    } catch (Exception $e) {
        return false;
    }
    restore_error_handler();
}


function validate_user($value) {
  $error = array();
  $valido = true;
  $filtro = array(
    'name' => array(
      'filter' => FILTER_VALIDATE_REGEXP,
      'options' => array('regexp' => '/^[A-Za-z]{4,10}$/')
    ),

    'surname' => array(
      'filter' => FILTER_VALIDATE_REGEXP,
      'options' => array('regexp' => '/^[A-Za-z]{4,10}$/')
    ),

    'id_document' => array(
      'filter' => FILTER_VALIDATE_REGEXP,
      'options' => array('regexp' => '/^[XYZ]?([0-9]{7,8})([A-Z])$/i')
    ),

    'phone' => array(
      'filter' => FILTER_VALIDATE_REGEXP,
      'options' => array('regexp' => '/^[67][0-9]{8}$/')
    ),

    'password' => array(
      'filter' => FILTER_VALIDATE_REGEXP,
      'options' => array('regexp' => '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/')
    ),

    'repeat_password' => array(
      'filter' => FILTER_VALIDATE_REGEXP,
      'options' => array('regexp' => '/^(?=.*\d)(?=.*[A-Za-z])[0-9A-Za-z!@#$%]{6,12}$/')
    )
  );


  //$resultado = filter_input_array(INPUT_POST, $filtro);
  $resultado = filter_var_array($value, $filtro);


  //no filter
  $resultado['interests'] = $value['interests'];
  $resultado['gender'] = $value['gender'];
  $resultado['pais'] = $value['pais'];
  $resultado['provincia'] = $value['provincia'];
  $resultado['poblacion'] = $value['poblacion'];


  if ($resultado != null && $resultado) {


    if (!$resultado['name']) {
      $error['name'] = 'Name must be 4 to 10 letters';
      $valido = false;
    }

    if (!$resultado['surname']) {
      $error['surname'] = 'Surname must be 4 to 10 letters';
      $valido = false;
    }

    if (!$resultado['id_document']) {
      $error['id_document'] = 'Introduce correctly ID Document';
      $valido = false;
    }

    if (!$resultado['phone']) {
      $error['phone'] = 'Must start with 6 or 7, 9 digits';
      $valido = false;
    }

    if (!$resultado['password']) {
      if(value['password']==""){
        $valido=true;
      }else{
      $error['password'] = '8 digits, upper and low case and a number';
      $valido = false;
      }
    }

    if (!$resultado['repeat_password']) {
      if(value['repeat_password']==""){
        $valido=true;
      }else{
      $error['repeat_password'] = '8 digits, upper and low case and a number';
      $valido = false;
      }
    }

  } else {
    $valido = false;
  };

  return $return = array('resultado' => $valido, 'error' => $error, 'datos' => $resultado);
}
/*
// validate birthday
function validate_datebirthday($birthday, $age = 18, $maxage = 80) {
  if (is_string($birthday)) {
    $birthday = strtotime($birthday);
  }

  // 31536000 is the number of seconds in a 365 days year
  if (time() - $birthday < $age * 31536000 || time() - $birthday > $maxage * 31536000) {
    return false;
  }
  return true;
}*/
