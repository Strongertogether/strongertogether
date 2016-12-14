<?php
class specialists_bll {

    private $dao;
    private $db;
    static $_instance;

    private function __construct() {
        $this->dao = specialists_dao::getInstance();
        $this->db = db::getInstance();
    }

    public static function getInstance() {
        if (!(self::$_instance instanceof self))
            self::$_instance = new self();
        return self::$_instance;
    }

    public function details_products_BLL($id) {
        return $this->dao->details_products_DAO($this->db,$id);
    }

    public function select_column_products_BLL($arrArgument){
        return $this->dao->select_column_products_DAO($this->db,$arrArgument);
    }
    public function select_like_products_BLL($arrArgument){
        return $this->dao->select_like_products_DAO($this->db,$arrArgument);
    }
    public function count_like_products_BLL($arrArgument){

        return $this->dao->count_like_products_DAO($this->db,$arrArgument);
    }
    public function select_like_limit_products_BLL($arrArgument){

        return $this->dao->select_like_limit_products_DAO($this->db,$arrArgument);
    }

}
