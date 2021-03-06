<?php

class users_model {
    private $bll;
    static $_instance;
    private function __construct() {
        $this->bll = users_bll::getInstance();
    }
    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }
    /*signup */
    public function create_user($arrArgument) {
        return $this->bll->create_user_BLL($arrArgument);
    }

    public function update($arrArgument) {
        return $this->bll->update_BLL($arrArgument);
    }

    public function obtain_paises($url) {
        return $this->bll->obtain_paises_BLL($url);
    }

    public function obtain_provincias() {
        return $this->bll->obtain_provincias_BLL();
    }

    public function obtain_poblaciones($arrArgument) {
        return $this->bll->obtain_poblaciones_BLL($arrArgument);
        }

    public function list_users() {
        return $this->bll->list_users_BLL();
    }
    public function details_users($id) {
        return $this->bll->details_users_BLL($id);
    }
/*
 * LOGIN
 */
    public function count($arrArgument) {
        return $this->bll->count_BLL($arrArgument);
    }
    public function select($arrArgument) {
    return $this->bll->select_BLL($arrArgument);
    }
}
