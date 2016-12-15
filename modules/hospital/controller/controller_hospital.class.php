<?php
class controller_hospital {
    function __construct() {

    }

    function load_map() {
      require_once VIEW_PATH_INC.'header.php';
      require_once VIEW_PATH_INC.'menu.php';
      loadView('modules/hospital/view/', 'hospitals.php');
      require_once VIEW_PATH_INC.'footer.php';

    }

    function maploader() {
        set_error_handler('ErrorHandler');
        try {
            $arrValue = loadModel(MODEL_HOSPITALS, "hospital_model", "select", array('column' => array('false'), 'field' => array('*')));
        } catch (Exception $e) {
            $arrValue = false;
        }
        restore_error_handler();

        if ($arrValue) {
            $arrArguments['hospital'] = $arrValue;
            $arrArguments['success'] = true;
            echo json_encode($arrArguments);
        } else {
            $arrArguments['success'] = false;
            $arrArguments['error'] = 503;
            echo json_encode($arrArguments);
        }
    }
}
