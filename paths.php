<?php
//SITE_ROOT
$path=$_SERVER['DOCUMENT_ROOT'].'/Strongertogether/';
define('SITE_ROOT', $path);

//SITE_PATH
define('SITE_PATH','https://'.$_SERVER['HTTP_HOST'].'/Strongertogether/');

//CSS
define('CSS_PATH', SITE_PATH . 'view/css/');


//IMG
define('IMG_PATH', SITE_PATH . 'view/images/');

//JS
define('JS_PATH', SITE_PATH . 'view/js/');

//log
define('LOG_DIR',SITE_ROOT.'classes/log.class.singleton.php');
define('SPECIALISTS_LOG_DIR',SITE_ROOT.'log/specialists/Site_Specialists_errors.log');
define('GENERAL_LOG_DIR',SITE_ROOT.'log/general/Site_General_errors.log');

//production
define('PRODUCTION',true);

//model
define('MODEL_PATH',SITE_ROOT.'model/');
//view
define('VIEW_PATH_INC',SITE_ROOT.'view/inc/');

//img
define('VIEW_PATH_IMG',SITE_ROOT.'view/images/');

define('VIEW_PATH_INC_ERROR',SITE_ROOT.'view/inc/templates_error/');
//modules
define('MODULES_PATH',SITE_ROOT.'modules/');

//resources
define('RESOURCES',SITE_ROOT.'resources/');
//modules
define('MODULES_PATH', SITE_ROOT . 'modules/');
//media
define('MEDIA_PATH',SITE_PATH . 'media/');
define('MEDIA_ROOT', SITE_ROOT . 'media/');
//model
define('MODEL_PATH', SITE_ROOT . 'model/');
//utils
define('UTILS',SITE_ROOT.'utils/');
//libs
define('LIBS',SITE_ROOT.'libs/');
//classes
define('CLASSES',SITE_ROOT.'classes/');
//amigables
define('URL_AMIGABLES', TRUE);

//model specialists
define('FUNCTIONS_SPECIALISTS',SITE_ROOT.'modules/specialists/utils/');
define('MODEL_PATH_SPECIALISTS',SITE_ROOT.'modules/specialists/model/');
define('DAO_SPECIALISTS',SITE_ROOT.'modules/specialists/model/dao/');
define('BLL_SPECIALISTS',SITE_ROOT.'modules/specialists/model/bll/');
define('MODEL_SPECIALISTS',SITE_ROOT.'modules/specialists/model/model/');
define('SPECIALISTS_JS_PATH', SITE_PATH . 'modules/specialists/view/js/');
define('SPECIALISTS_JS_LIB_PATH', SITE_PATH . 'modules/specialists/view/lib/');

//model contact
define('CONTACT_JS_PATH', SITE_PATH . 'modules/contact/view/js/');
define('CONTACT_CSS_PATH', SITE_PATH . 'modules/contact/view/css/');
define('CONTACT_LIB_PATH', SITE_PATH . 'modules/contact/view/lib/');
define('CONTACT_IMG_PATH', SITE_PATH . 'modules/contact/view/img/');
define('CONTACT_VIEW_PATH', 'modules/contact/view/');


//model users
define('FUNCTIONS_USERS',SITE_ROOT.'modules/users/utils/');
define('MODEL_PATH_USERS',SITE_ROOT.'modules/users/model/');
define('DAO_USERS',SITE_ROOT.'modules/users/model/dao/');
define('BLL_USERS',SITE_ROOT.'modules/users/model/bll/');
define('MODEL_USERS',SITE_ROOT.'modules/users/model/model/');
define('USERS_JS_PATH', SITE_PATH . 'modules/users/view/js/');
define('USERS_CSS_PATH', SITE_PATH . 'modules/users/view/css/');

//model hospital
define('HOSPITALS_CSS_PATH', SITE_PATH . '/modules/hospital/view/css/');
define('HOSPITALS_JS_PATH', SITE_PATH . '/modules/hospital/view/js/');
define('MODEL_HOSPITALS', SITE_ROOT . '/modules/hospital/model/model/');
