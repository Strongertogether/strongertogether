<?php

class users_bll {
  private $dao;
  private $db;
  static $_instance;
  private function __construct() {
    $this->dao = users_dao::getInstance();
    $this->db = db::getInstance();
  }
  public static function getInstance() {
    if (!(self::$_instance instanceof self))
    self::$_instance = new self();
    return self::$_instance;
  }

  public function create_user_BLL($arrArgument) {
    return $this->dao->create_user_DAO($this->db, $arrArgument);
    }

  public function update_BLL($arrArgument) {
    return $this->dao->update_user_DAO($this->db, $arrArgument);
    }

  public function obtain_paises_BLL($url) {
    return $this->dao->obtain_paises_DAO($url);
  }

  public function obtain_provincias_BLL() {
    return $this->dao->obtain_provincias_DAO();
  }

  public function obtain_poblaciones_BLL($arrArgument) {
    return $this->dao->obtain_poblaciones_DAO($arrArgument);
  }

  public function list_users_BLL() {
    return $this->dao->list_users_DAO($this->db);
  }

  public function details_users_BLL($id) {
    return $this->dao->details_users_DAO($this->db,$id);
  }
/*
 *  LOGIN
 */
 public function count_BLL($arrArgument) {
    return $this->dao->count_DAO($this->db, $arrArgument);
}
public function select_BLL($arrArgument) {
    return $this->dao->select_DAO($this->db, $arrArgument);
}
}
